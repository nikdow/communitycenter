<?php 
  require_once( trailingslashit( get_template_directory() ). 'inc/options-framework.php' );
  header("Content-type: text/css; charset: UTF-8");
 ?>

/* Header */
button, .button, .hero_wrap, a.hero_more, .contain-to-grid, .menu-top-header-container ul li ul, .mini_nav .menu-top-header-container ul li ul.sub-menu, .mini_nav .menu-top-header-container ul li:hover ul.sub-menu, 
.bottom_nav_wrap, .top-bar, .bottom_nav_wrap nav, .bottom_nav_wrap .top-bar-section ul, .bottom_nav_wrap .top-bar.expanded .title-area, .bottom_nav_wrap .top-bar-section li:not(.has-form) a:not(.button), .bottom_nav_wrap .top-bar-section .dropdown li:not(.has-form) a:not(.button), .contributor_list_wrap a.button:hover, .contributor_list_wrap a.button:focus, .entry-footer a, .shareModal_wrap a.share_click, .widget-area aside.widget_categories ul li:hover span, aside.widget_tag_cloud a, .widget_archive li:hover span, .bbp-submit-wrapper button, #tribe-bar-form .tribe-bar-submit input[type="submit"]:hover, .widget_display_stats dt:hover + dd, .cart_search .cart .f-dropdown li a.checkout_button, .woocommerce span.onsale, .woocommerce-page span.onsale, .widget_layered_nav ul li:hover small.count, .woocommerce table.cart a.remove:hover, .woocommerce-page table.cart a.remove:hover, .woocommerce #content table.cart a.remove:hover, .woocommerce-page #content table.cart a.remove:hover, .woocommerce-checkout .woocommerce-info a.showlogin:hover, .woocommerce-checkout .woocommerce-info a.showcoupon:hover, .woocommerce .addresses .title .edit, .woocommerce-page .addresses .title .edit, div.pp_woocommerce a.pp_contract, div.pp_woocommerce a.pp_expand, div.pp_woocommerce .pp_close, div.pp_woocommerce .pp_next:before, div.pp_woocommerce .pp_previous:before, div.pp_woocommerce .pp_arrow_next, div.pp_woocommerce .pp_arrow_previous, .wpcf7 input[type="submit"]:hover, #comments .rescue_staff, .search-no-results .post_wrap form input.search-submit {
  background-color: <?php echo of_get_option( 'header_color' ); ?>;
}

.pull-r {
    border-left: 8px solid <?php echo of_get_option( 'header_color' ); ?>;
}
.pull-l {
    border-right: 8px solid <?php echo of_get_option( 'header_color' ); ?>;
}


.woocommerce a.button:hover, .woocommerce-page a.button:hover, .woocommerce button.button:hover, .woocommerce-page button.button:hover, .woocommerce input.button:hover, .woocommerce-page input.button:hover, .woocommerce #respond input#submit:hover, .woocommerce-page #respond input#submit:hover, .woocommerce #content input.button:hover, .woocommerce-page #content input.button:hover, .woocommerce ul.products li.product:hover a.button, .woocommerce-page ul.products li.product:hover a.button, .woocommerce-page .woocommerce-message a.button {
  color: <?php echo of_get_option( 'header_color' ); ?>;
  border: 2px solid <?php echo of_get_option( 'header_color' ); ?>;
}

.woocommerce div.product .woocommerce-tabs ul.tabs li.active a {
  border-bottom: 2px solid <?php echo of_get_option( 'header_color' ); ?>;
}

.woocommerce .widget_price_filter .ui-slider .ui-slider-range, .woocommerce-page .widget_price_filter .ui-slider .ui-slider-range, .woocommerce .widget_price_filter .ui-slider .ui-slider-handle, .woocommerce-page .widget_price_filter .ui-slider .ui-slider-handle, .woocommerce .widget_layered_nav ul li.chosen a, .woocommerce-page .widget_layered_nav ul li.chosen a, .woocommerce .checkout-button.button.alt, .woocommerce-page .checkout-button.button.alt, .woocommerce div.product form.cart .button.alt, .woocommerce-page div.product form.cart .button.alt, .woocommerce .woocommerce-error, .woocommerce .woocommerce-info, .woocommerce .woocommerce-message, .woocommerce-page .woocommerce-error, .woocommerce-page .woocommerce-info, .woocommerce-page .woocommerce-message, .woocommerce .cart .coupon .button, .woocommerce #content input.button.alt, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce-page #content input.button.alt, .woocommerce-page #respond input#submit.alt, .woocommerce-page a.button.alt, .woocommerce-page button.button.alt, .woocommerce-page input.button.alt, .woocommerce-checkout .woocommerce #place_order {
  background: none repeat scroll 0 0 <?php echo of_get_option( 'header_color' ); ?>;
  border: 1px solid <?php echo of_get_option( 'header_color' ); ?>;
}

.woocommerce-page .woocommerce-message a.button:hover {
  background: none repeat scroll 0 0 <?php echo of_get_option( 'header_color' ); ?>;
  border: 2px solid #ffffff;
}

.woocommerce-checkout .woocommerce-info a.showlogin:hover, .woocommerce-checkout .woocommerce-info a.showcoupon:hover {
  border: 2px solid <?php echo of_get_option( 'header_color' ); ?>;
}

.contributor_list_wrap a.button:hover, .contributor_list_wrap a.button:focus {
  border-color: <?php echo of_get_option( 'header_color' ); ?>;
}

a:hover, a:focus, .top-bar-section a:hover .donate_button, .hero_more_wrap a:hover, .mini_nav .menu-top-header-container a:hover, .mini_nav .menu-top-header-container a:focus, .bottom_nav_wrap .top-bar-section li a:hover, .bottom_nav_wrap .top-bar-section li a:focus, a.hero_more:hover, footer.site-footer aside a:hover, .content-area .entry-meta i, .entry-footer a:hover, .content-area .entry-meta a:hover, .content-area .post-navigation .nav-links a:hover, #comments cite a:hover, .entry-header h1 a:hover, .blog a.more-link:hover, .widget-area aside a:hover, .widget-area aside ul li:hover, aside.widget_tag_cloud a:hover, ul.bbp-forums li.bbp-body ul li.bbp-forum-topic-count:before, ul.bbp-forums li.bbp-body ul li.bbp-forum-reply-count:before, ul.bbp-topics li.bbp-body ul li.bbp-topic-reply-count:before, ul.bbp-topics li.bbp-body ul li.bbp-topic-voice-count:before, .bbp-submit-wrapper button:hover, button#bbp_user_edit_submit:hover, span.bbp-admin-links a:hover, #tribe-events-content a h1:hover, .bbp_widget_login a.button:hover, #bbp-search-form  input#bbp_search_submit:hover, .cart_search .cart .f-dropdown li a.view_cart_button:hover, .woocommerce .star-rating, .woocommerce-page .star-rating, .woocommerce-account p.myaccount_user a, div.pp_woocommerce .pp_next:before, div.pp_woocommerce .pp_previous:before, .widget-area a.button:hover, .widget-area .rescue_about_wrap ul li i.fa:hover {
  color: <?php echo of_get_option( 'header_color' ); ?>;
}

.top-bar-section a:hover .donate_button {
  background-color: <?php echo of_get_option( 'donation_color' ); ?>;
  border-color: <?php echo of_get_option( 'donation_color' ); ?>;
}
.cart_search .cart .f-dropdown li a.view_cart_button:hover {
  border-color: <?php echo of_get_option( 'header_color' ); ?>;
}

.bg-image  {
  background-image: url(<?php echo of_get_option( 'hero_background' ); ?>)
}
.hero_overlay{
  background: <?php echo of_get_option( 'hero_color_overlay' ); ?>;
  opacity: <?php echo of_get_option( 'hero_color_opacity' ); ?>;
}

.blog_header_wrap .bg-image  {
  background-image: url(<?php echo of_get_option( 'blog_background' ); ?>)
}
.blog_header_wrap .blog_overlay{
  background: <?php echo of_get_option( 'blog_color_overlay' ); ?>;
  opacity: <?php echo of_get_option( 'blog_color_opacity' ); ?>;
}

.bbpress .blog_header_wrap .bg-image  {
  background-image: url(<?php echo of_get_option( 'forum_background' ); ?>)
}
.bbpress .blog_header_wrap .blog_overlay{
  background: <?php echo of_get_option( 'forum_color_overlay' ); ?>;
  opacity: <?php echo of_get_option( 'forum_color_opacity' ); ?>;
}

.quote_area_wrap .bg-image  {
  background-image: url(<?php echo of_get_option( 'quote_background' ); ?>)
}

.quote_area_wrap .hero_overlay{
  background: <?php echo of_get_option( 'quote_color_overlay' ); ?>;
  opacity: <?php echo of_get_option( 'quote_color_opacity' ); ?>;
}

.hero_vid_wrap {
  background: <?php echo of_get_option( 'hero_color_overlay' ); ?>;
}

.hero_vid iframe {
  opacity: <?php echo of_get_option( 'hero_color_opacity' ); ?>;
}


/* Custom Styles */
<?php echo of_get_option( 'custom_css' ); ?>