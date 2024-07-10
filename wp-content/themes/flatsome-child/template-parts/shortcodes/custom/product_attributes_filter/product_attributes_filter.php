<?php
function filter_attributes_shortcode($atts) {
    $args = shortcode_atts(array(
        'slug' => ''
    ), $atts);

    $queried_object = get_queried_object();
    $slug  = esc_attr($args['slug']);
    // Check if the product ID is valid
    if (!empty($slug)) {
        ob_start();
        $attribute_opts = get_product_attribute_options($slug);
        $html = '';
        $html .= '<div>';
       
        // Loop through variations
        $html .= '<div class="filter_varidation_container">';
        foreach ($attribute_opts as $option) {
            $name = $option->name;
            $op_slug = $option->slug;
            $attr_product_slug = $product_slug_orginal.$op_slug;
            $html.= '<span class="filter_varidation_item" data-termid="'.$queried_object->term_id.'" data-productcat="'.$queried_object->slug.'"  data-slug="'.$slug.'"><input style="display:none" type="checkbox" data-option="'.$op_slug.'" name="'.$slug.'" id="'.$slug.'-'.$op_slug.'"><label aria-label="1000w" for="'.$slug.'-'.$op_slug.'">'.$name.'</label></span>';
        }
        $html.= '</div>';
        $html.= '</div>';
        echo $html;
        wp_enqueue_style('filter_attributes_styles','/wp-content/themes/flatsome-child/template-parts/shortcodes/custom/product_attributes_filter/styles.css');
        
        return ob_get_clean();
    }
}

add_action('wp_enqueue_scripts', 'enqueue_custom_scripts_last', 999999);
function enqueue_custom_scripts_last() {
    wp_enqueue_script('filter_attributes', '/wp-content/themes/flatsome-child/template-parts/shortcodes/custom/product_attributes_filter/filter_attributes.js');
    wp_localize_script('filter_attributes', 'adminAjax', array('url' => admin_url('admin-ajax.php')));
}

add_shortcode('product_attributes_filter', 'filter_attributes_shortcode');

add_action( 'wp_ajax_nopriv_get_filter_products_by_attribute', 'get_filter_products_by_attribute' );
add_action( 'wp_ajax_get_filter_products_by_attribute', 'get_filter_products_by_attribute' );

function get_filter_products_by_attribute() {
    filter_products_by_attribute();
    wp_die();
}

function format_option_req($req_option) {
    $resultArray = array();

    foreach ($req_option as $item) {
        // Tách chuỗi theo dấu "::"
        $parts = explode("::", $item);

        // Lấy name và value từ mảng $parts
        $name = $parts[0];
        $value = $parts[1];

        // Nếu key chưa tồn tại trong $resultArray, tạo mới
        if (!isset($resultArray[$name])) {
            $resultArray[$name] = array();
        }

        // Thêm giá trị vào mảng tương ứng
        $resultArray[$name][] = $value;
    }
    return $resultArray;
}

// Hàm lọc sản phẩm theo thuộc tính
function filter_products_by_attribute() {
    // Xác định nếu đây là yêu cầu AJAX
    if (defined('DOING_AJAX') && DOING_AJAX) {
        // Nhận dữ liệu từ POST
        $req_options = $_POST['option'];
        $req_tern_id = $_POST['termId'];
        $req_product_cat = $_POST['productCat'];
        $page = $_POST['page'];
        $search = $_POST['search'];

        // Format dữ liệu option
        $options = format_option_req($req_options);

        // Thiết lập các tham số cho truy vấn
        $args = array(
            'parent' => $req_tern_id,
            'product_cat' => $req_product_cat,
            'post_type' => 'product',
            'posts_per_page' => 12, // Đổi giá trị này tùy thuộc vào số sản phẩm bạn muốn hiển thị trên mỗi trang
            'paged' => $page,
            'tax_query' => array(),
            's' => sanitize_text_field($search) 
        );

        // Tạo tax_query nếu có các thuộc tính được chọn
        if (!empty($options)) {
            foreach ($options as $name => $values) {
                $args['tax_query'][] = array(
                    'taxonomy' => 'pa_' . $name,
                    'field' => 'slug',
                    'terms' => $values
                );
            }
        }

        // Thực hiện truy vấn sản phẩm
        $query = new WP_Query($args);

        // Kiểm tra xem có sản phẩm nào được tìm thấy hay không
        if ($query->have_posts()) {
            ob_start();
            // Hiển thị sản phẩm
            woocommerce_product_loop_start();
            while ($query->have_posts()) : $query->the_post();
                wc_get_template_part('content', 'product');
            endwhile;
            woocommerce_product_loop_end();
            wp_reset_postdata(); // Đặt lại dữ liệu post để tránh xung đột với các truy vấn khác

            global $wp_rewrite;

            echo '<nav class="woocommerce-pagination" data-termid="'.$queried_object->term_id.'" data-productcat="'.$queried_object->slug.'">';
              
                    $pages = paginate_links( apply_filters( 'woocommerce_pagination_args', array( // WPCS: XSS ok.
                        'add_args'  => false,
                        'current'   => max( 1, $page ),
                        'total' => $query->max_num_pages,
                        'prev_text' => '<i class="icon-angle-left"></i>',
                        'next_text' => '<i class="icon-angle-right"></i>',
                        'type'      => 'array',
                        'end_size'  => 3,
                        'mid_size'  => 3,
                    ) ) );
                    if ( is_array( $pages ) ) {
                        $paged = ( get_query_var( 'paged' ) == 0 ) ? 1 : get_query_var( 'paged' );
                        echo '<ul class="page-numbers nav-pagination links text-center">';
                        foreach ( $pages as $page ) {
                            $page = str_replace( 'page-numbers', 'page-number', $page );
                            echo '<li>' . $page . '</li>';
                        }
                        echo '</ul>';
                    }
            echo '</nav>';


            $response = ob_get_clean();
        } else {
            $response = '<div class="empty-product"><span class="empty-product-title">Không tìm thấy sản phẩm.<span></div>';
        }

        echo $response;
        wp_die();
    }
}
