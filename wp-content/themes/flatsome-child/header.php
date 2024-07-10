<?php
/**
 * Header template.
 *
 * @package          Flatsome\Templates
 * @flatsome-version 3.16.0
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="<?php flatsome_html_classes(); ?>">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <style>
        .ux-search-submit {
            background-color: #1f1f1f !important;
        }
        .header-nav-main.nav-line-bottom > li > a:before, .header-nav-main.nav-line-grow > li > a:before, .header-nav-main.nav-line > li > a:before, .header-nav-main.nav-box > li > a:hover, .header-nav-main.nav-box > li.active > a, .header-nav-main.nav-pills > li > a:hover, .header-nav-main.nav-pills > li.active > a {
            color: #2a2a2a  !important;
            background-image: linear-gradient(90deg, #858589 , #ffffff , #5b5b5f ) !important;
            text-shadow: 0px 5px 5px #7a7a7a;
        }
        
        .header-main {
            /* background-image: linear-gradient(332deg, #9b9b9b, #00000070) !important;*/
           background-image: linear-gradient(332deg, #555555cf, #00000070, #000000cc) !important;
        }
        
        .review-container {
            padding: 40px;
            background-color: rgba(44, 51, 51, 0.65) !important;
            border-left: 15px solid #00539f  !important;
        }
        
        .banner-title {
            background: linear-gradient(99deg, #0d1414, #050c0c, #000000, #2C3333);
            -webkit-background-clip: text;
            color: transparent !important;
            text-shadow: 0px 5px 5px #7a7a7a;

        }
        .banner .banner-span {
            color: #363232;
        }
        
        .baner-kimloai-xam {
            background-image: linear-gradient(90deg, #858589 , #ffffff , #858589 ) !important;
        }
        .baner-kimloai-trang {
           background-image: linear-gradient(90deg, #85858961 , #ffffff , #85858980 ) !important;
           background-color: #446084;
        }

        .baner-kimloai-trang:hover {
            transition: background 100ms linear;
            background-image: linear-gradient(90deg, #4e4e5061 , #ffffff , #4e4e5061 ) !important;
            transition-delay: 400ms;
            
        }

        .baner-kimloai-xam:hover {
            transition: background 100ms linear;
            background-image: linear-gradient(90deg, #858589d1 , #ffffff , #858589e0 ) !important;
            transition-delay: 400ms;
        }
        
        @keyframes trin {

            from {
                transform:rotate3d(0, 0, 1, 0deg);
            }
            20%, 32%, 44%, 56%, 68% {
                transform: rotate3d(0, 0, 1, 0deg);
            }
            23%, 35%, 47%, 59%, 71% {
                transform: rotate3d(0,0,1,15deg);
            }
            26%, 38%, 50%, 62%, 74% {
                transform: rotate3d(0,0,1,0deg);
            }
            29%, 41%, 53%, 65%, 77% {
                transform: rotate3d(0,0,1,-15deg);
            }
            80% {
                transform:rotate3d(0, 0, 1, 0deg);
            }

        }
        
        @keyframes fadeIn {
          0% { opacity: 0; }
          100% { opacity: 1; }
        }
        
       
                
        #button-contact-vr {
            position: fixed;
            bottom: 133px;
            z-index: 99999;
            right: 15px;
        }
        
        #gom-all-in-one #phone-vr {
            transition: 0.7s all;
            -moz-transition: 0.7s all;
            -webkit-transition: 0.7s all;
        }
        
        #mess-vr {
            margin-bottom: 12px;
        }
        #mess-vr  .phone-vr-img-circle {
            background-color: #00539f !important;
        }
        #button-contact-vr .button-contact {
            position: relative;
        }
        #button-contact-vr .button-contact .phone-vr {
            position: relative;
            background-color: transparent;
            width: 50px;
            height: 50px;
            cursor: pointer;
            z-index: 11;
        }
        
        #phone-vr .phone-vr-circle-fill {
            opacity: 0.7;
            box-shadow: 0 0 0 0 #dd3333;
        }
        /* social footer */
        .phone-vr-img-circle {
            background-color: #00539f;
            width: 100%;
            height: 50px;
            position: absolute;
            border-radius: 50%;
            overflow: hidden;
            justify-content: center;

        }
        
        .phone-vr-img-circle a {
            display: block;
            line-height: 37px;
        }
        
        .phone-bar {
            position: fixed;
            margin-top: 10px;
            position: fixed;
            right: 45px;
            bottom: 140px;
            width: 120px;
        }
        
        .phone-bar a {
            color: #fff;
            border-radius: 100px;
            background-color: #00539f;
            white-space: nowrap;
            font-size: 16px;
            padding-left: 12px;
        }
        .phone-vr-img-circle a:hover {
            color: #fff;
        }
        
        .phone-bar a:hover{
            color: #fff;
        }
        
        .phone-vr .trin-trin {
            margin-top: 22px;
            animation-name: trin;
            animation-duration: 1.5s;
            animation-iteration-count: infinite;
            animation-timing-function: linear;
        }
        
        .phone-vr-img-circle i {
            font-size: 26px;
            padding-top: 22px !important;
            color: #fff !important;
        }
        
        .phone-vr-img-circle img, .phone-vr-img-circle i {
            max-height: 25px;
            max-width: 27px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            -moz-transform: translate(-50%,-50%);
            -webkit-transform: translate(-50%,-50%);
            -o-transform: translate(-50%,-50%);
        }
        
        .menu-sanpham .button {
            color: #2a2a2a  !important;
            background-image: linear-gradient(90deg, #858589 , #ffffff , #c5c5c5 ) !important;
            text-shadow: 0px 5px 5px #7a7a7a;            
        }
        
        @media(max-width: 740px){
            .phone-bar {
                display: none !important;
            }
            
            #main .products .product {
                padding-right: 10px !important;
                padding-left: 10px!important;
            }
        }
        
        .woocommerce-loop-product__link {
            font-weight: 700 !important;
        }
        .super-plus {
            vertical-align: super;
            padding-left: 3px;
            animation: fadeIn 6s;
        }
        
        .testimonial-text .text {
            height: 50px;
            overflow-y: scroll;
        }
        .testimonial-text .text::-webkit-scrollbar {
            display: none;
        }
        
        @keyframes shake {
          0%,
          100% {
            -webkit-transform: scale(1, 1);
            transform: scale(1, 1);
          }
          25% {
            -webkit-transform: scale(0.9, 1.1);
            transform: scale(0.9, 1.1);
          }
          50% {
            -webkit-transform: scale(1.1, 0.9);
            transform: scale(1.1, 0.9);
          }
          75% {
            -webkit-transform: scale(0.95, 1.05);
            transform: scale(0.95, 1.05);
          }
          0%,
          100% {
            -webkit-transform: scale(1, 1);
            transform: scale(1, 1);
          }
          25% {
            -webkit-transform: scale(0.9, 1.1);
            transform: scale(0.9, 1.1);
          }
          50% {
            -webkit-transform: scale(1.1, 0.9);
            transform: scale(1.1, 0.9);
          }
          75% {
            -webkit-transform: scale(0.95, 1.05);
            transform: scale(0.95, 1.05);
          }
        }
        
        .container-shake:hover .shake-title {
           animation: shake 0.4s ease;
        }
        .brand-title {
            color: #423d3d;
            border-radius: 6px 9px 9px 6px;
            padding: 4px 6px 4px 6px;
            background-image: linear-gradient(90deg, #858589 , #ffffff , #858589 ) !important;
        }
        
        .sh_varidation_show{
			list-style: none;
			display: flex;
			gap: 10px;
			margin: 0;
			
		}
		.sh_varidation_title {
			padding-bottom: 10px;
    		font-weight: 700;
		}
		.varidation_show_item {
			margin: 0 !important ;

		}
		.varidation_show_item a {
			display: block;
		    padding: 5px 10px;
		    border: 1px solid #05061c;
		    font-weight: 700;
		    border-radius: 4px;

		}
		.varidation_show_item a.active {
			background: #05061c;
		    color: #fff;
		}
	
        .sidebar-menu .account-item {
            display: none !important;
        }
        
        .woocommerce-result-count, .woocommerce-ordering {
            display: none !important;
        }  
        #shop-sidebar .product-categories {
            padding-left: 10px !important;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        #shop-sidebar {
            background-image: linear-gradient(304deg, #f9f9f9, #ffffff , #ffffff, #f9f9f9 ) !important; 
            padding: 10px;
        }
        #shop-sidebar .widget-title  {
            color: #00539f !important;
        }

        #shop-sidebar .product-categories a {
           padding: 6px;
        }
        #shop-sidebar .product-categories a:hover, #shop-sidebar .product-categories .current-cat > a {
            transition: all .2s;
            color: #2a2a2a !important;
            background-image: linear-gradient(90deg, #c5c5c5 , #ffffff , #858589 ) !important;
            border-radius: 4px;
            box-shadow: 0px 5px 5px #7a7a7a;
            font-weight: normal !important;
        }
         
        #shop-sidebar .product-categories ul.children {
            margin-top: 10px;
        }
        #shop-sidebar .product-categories ul.children li {
            padding-bottom: 10px;
        }
        .back-to-top {
            margin-right: -5px !important;
        }
        .off-canvas-left .mfp-content {
            width: 285px !important;
        }
    </style>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php do_action( 'flatsome_after_body_open' ); ?>
<?php wp_body_open(); ?>

<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'flatsome' ); ?></a>

<div id="wrapper">

	<?php do_action( 'flatsome_before_header' ); ?>

	<header id="header" class="header <?php flatsome_header_classes(); ?>">
		<div class="header-wrapper">
			<?php get_template_part( 'template-parts/header/header', 'wrapper' ); ?>
		</div>
	</header>

	<?php do_action( 'flatsome_after_header' ); ?>

	<main id="main" class="<?php flatsome_main_classes(); ?>">
