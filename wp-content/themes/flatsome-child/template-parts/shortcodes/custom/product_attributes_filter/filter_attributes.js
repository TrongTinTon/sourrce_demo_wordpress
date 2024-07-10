// Hàm để lấy số trang từ URL
function getPageNumberFromUrl(url) {
  // Sử dụng biểu thức chính quy để tìm số trang trong URL
  var match = url.match(/\/page\/(\d+)/);

  // Nếu tìm thấy, trả về số trang. Nếu không, trả về null.
  return match ? match[1] : null;
}

function equalizeProductBoxes() {
    var maxHeight = 0;

    // Loop through each product box and find the maximum height
    jQuery('.product .product-title').each(function() {
        jQuery(this).css('height', 'auto'); // Reset height
        var boxHeight = jQuery(this).outerHeight();

        if (boxHeight > maxHeight) {
            maxHeight = boxHeight;
        }
    });

    // Set the maximum height to all product boxes
    jQuery('.product .product-title').css('height', maxHeight + 'px');
}

// Hàm để lấy giá trị của tham số từ URL
function getUrlParameter(name) {
    name = name.replace(/[[]/, '\\[').replace(/[\]]/, '\\]');
    var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
    var results = regex.exec(location.search);
    return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
}

function skeleton() {
    // Loop through each product box and find the maximum height
    jQuery('.product').each(function() {
        $this = jQuery(this);
        var boxImageHeight = jQuery('.box-image', $this).outerHeight();
        var boxImageWidth = jQuery('.box-image', $this).outerWidth();
        jQuery('.box-image', this).css('height', boxImageHeight);
        jQuery('.box-image', this).css('width', boxImageWidth);
        jQuery('.box-image', this).addClass('skeleton')
        jQuery('.box-image', this).empty();

        var titleWrapperHeight = jQuery('.product-title', $this).outerHeight();
        var titleWrapperWidth = jQuery('.product-title', $this).outerWidth();
        jQuery('.product-title', this).css('height', titleWrapperHeight);
        jQuery('.product-title', this).css('width', titleWrapperWidth);
        jQuery('.product-title', this).addClass('skeleton')
        jQuery('.product-title', this).empty();
     
    });
}

jQuery(document).ready(function() {
    // Thêm sự kiện cho các liên kết phân trang
    jQuery('.woocommerce-pagination a').replaceWith(function() {
        var originalHref = jQuery(this).attr('href');
        return '<div class="page-number" data-href="' + originalHref + '">' + jQuery(this).html() + '</div>';
    });
    jQuery(document).off('click', '.woocommerce-pagination .page-number');
    jQuery(document).on('click', '.woocommerce-pagination .page-number', function (e) {
        e.preventDefault();
        var pagination = jQuery('.woocommerce-pagination');
        var adminAjaxUrl = adminAjax.url;
        var termId = pagination.data('termid');
        var productCat = pagination.data('productcat');
        var searchTerm = getUrlParameter('s');

        var selectedValues = [];
        // Lặp qua tất cả các input checked trong class "filter_varidation_container"
        jQuery('.filter_varidation_container input:checked').each(function () {
            // Lấy tên và giá trị data-option của input
            var name = jQuery(this).attr('name');
            var option = jQuery(this).data('option');

            // Ghép tên và giá trị data-option và đưa vào mảng
            var value = name + '::' + option;
            selectedValues.push(value);
        });
        var pageHref = jQuery(this).data('href');
       
        var page = getPageNumberFromUrl(pageHref);
       console.log(page)
        var data = {
            action: 'get_filter_products_by_attribute',
            search: searchTerm,
            option: selectedValues, // Đổi giá trị này tùy thuộc vào tùy chọn của bạn
            termId: termId, // Đổi giá trị này tùy thuộc vào term_id của bạn
            productCat: productCat, // Đổi giá trị này tùy thuộc vào danh mục sản phẩm của bạn
            page: page // Truyền số trang
        };
        skeleton();
        var elementLoadAjax = jQuery('.shop-container');
        jQuery.post(adminAjaxUrl, data, function(response) {
            elementLoadAjax.empty();
            elementLoadAjax.html(response);
            elementLoadAjax.removeClass('loading-cat');
            jQuery('.woocommerce-pagination a').replaceWith(function() {
                var originalHref = jQuery(this).attr('href');
                return '<div class="page-number" data-href="' + originalHref + '">' + jQuery(this).html() + '</div>';
            });
            equalizeProductBoxes();
        });

    });
})

onClickHandler = function(e) {
    e.preventDefault();
    var $this = jQuery(this);
    var adminAjaxUrl = adminAjax.url;
    var termId = $this.data('termid');
    var productCat = $this.data('productcat');
    var nameAttr = [];
    var input = $this.find('input');
    var isChecked = input.prop("checked");
    if (!isChecked === true) { $this.addClass('active')} else { $this.removeClass('active') }
    input.attr("checked", !isChecked);
    // Tạo một mảng để lưu trữ các giá trị
    var selectedValues = [];
    // Lặp qua tất cả các input checked trong class "filter_varidation_container"
    jQuery('.filter_varidation_container input:checked').each(function () {
        // Lấy tên và giá trị data-option của input
        var name = jQuery(this).attr('name');
        var option = jQuery(this).data('option');

        // Ghép tên và giá trị data-option và đưa vào mảng
        var value = name + '::' + option;
        selectedValues.push(value);
    });

    var data = {
        'action': 'get_filter_products_by_attribute',
        'option': selectedValues,
        'termId': termId,
        'productCat': productCat,
    };
    skeleton();
    var elementLoadAjax = jQuery('.shop-container');
    jQuery.post(adminAjaxUrl, data, function(response) {
        elementLoadAjax.empty();
        elementLoadAjax.html(response);
        elementLoadAjax.removeClass('loading-cat');
        jQuery('.woocommerce-pagination a').replaceWith(function() {
            var originalHref = jQuery(this).attr('href');
            return '<div class="page-number" data-href="' + originalHref + '">' + jQuery(this).html() + '</div>';
        });
        equalizeProductBoxes();
    });
};

jQuery(document).on('click', '.filter_varidation_item', onClickHandler)

