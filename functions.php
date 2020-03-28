<?php
/**
 * Functions and definitions
 *
 */

/*
 * Loads the Options Panel
 *
 * If you're loading from a child theme use stylesheet_directory
 * instead of template_directory
 */

define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/' );
require_once dirname( __FILE__ ) . '/inc/options-framework.php';

/*
 * This is an example of how to add custom scripts to the options panel.
 * This one shows/hides the an option when a checkbox is clicked.
 *
 * You can delete it if you not using that option
 */
add_action( 'optionsframework_custom_scripts', 'optionsframework_custom_scripts' );

function optionsframework_custom_scripts() { ?>

<script type="text/javascript">
jQuery(document).ready(function() {

	jQuery('#example_showhidden').click(function() {
  		jQuery('#section-example_text_hidden').fadeToggle(400);
	});

	if (jQuery('#example_showhidden:checked').val() !== undefined) {
		jQuery('#section-example_text_hidden').show();
	}

});
</script>

<?php
}

/*----------------------------------------------------*/
/*	Set content width based on theme design
/*----------------------------------------------------*/
if ( ! isset( $content_width ) ) {
	$content_width = 815; /* pixels */
}

/*----------------------------------------------------*/
/*	Defaults and registers support for various WP features
/*----------------------------------------------------*/
if ( ! function_exists( 'rescue_setup' ) ) :

/**
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function rescue_setup() {

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Enable support for Post Thumbnails on posts and pages.
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'top_header' => __( 'Header Top Menu', 'rescue' ),
		'bottom_header' => __( 'Header Bottom Menu', 'rescue' ),
	) );

	// Enable support for Post Formats.
	// add_theme_support( 'post-formats', array( 'gallery', 'video', 'quote' ) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'rescue_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array(
		'comment-list',
		'search-form',
		'comment-form',
		'gallery',
	) );
}
endif; // rescue_setup
add_action( 'after_setup_theme', 'rescue_setup' );

/*----------------------------------------------------*/
/*	Register widget area.
/*----------------------------------------------------*/
function rescue_widgets_init() {

	register_sidebar( array(
		'name'          => __( 'Inner Sidebar', 'rescue' ),
		'id'            => 'sidebar',
		'description'   => 'Displays on all inner pages that have a sidebar.',
		'before_widget' => '<aside id="%1$s" class="widget %2$s clearfix">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));
	register_sidebar( array(
		'name'          => __( 'Forums Sidebar', 'rescue' ),
		'id'            => 'forums',
		'description'   => 'Displays on all forums pages that have a sidebar.',
		'before_widget' => '<aside id="%1$s" class="widget %2$s clearfix">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));
	register_sidebar( array(
		'name'          => __( 'Shop Sidebar', 'rescue' ),
		'id'            => 'shop',
		'description'   => 'Displays on all shop pages that have a sidebar.',
		'before_widget' => '<aside id="%1$s" class="widget %2$s clearfix">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));
	register_sidebar( array(
		'name'          => __( 'Footer Left', 'rescue' ),
		'id'            => 'footer_left',
		'description'   => 'Displays in the left half of the footer. Ideal for three widgets.',
		'before_widget' => '<aside id="%1$s" class="widget %2$s large-4 columns">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));
	register_sidebar( array(
		'name'          => __( 'Footer Right', 'rescue' ),
		'id'            => 'footer_right',
		'description'   => 'Displays in the right half of the footer. Ideal for one widget. Recommended: Rescue About',
		'before_widget' => '<aside id="%1$s" class="widget large-12 large-offset-1 columns %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));

}
add_action( 'widgets_init', 'rescue_widgets_init' );

/*----------------------------------------------------*/
/*	Enqueue scripts and styles
/*----------------------------------------------------*/
function rescue_scripts() {

	wp_enqueue_style( 'normalize', get_template_directory_uri() . '/css/normalize.css', array(), '', 'all' );
	wp_enqueue_style( 'foundation_style', get_template_directory_uri() . '/css/foundation.min.css', array(), '5.3.0', 'all' );
	wp_enqueue_style( 'open_sans', 'https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,300,600,700', array(), '', 'all' );
	wp_enqueue_style( 'font_awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '4.1.0', 'all' );
	wp_enqueue_style( 'rescue_animate', get_template_directory_uri() . '/css/animate.css', array(), '', 'all' );
	wp_enqueue_style( 'bbpress_style', get_template_directory_uri() . '/css/forums.css', array(), '', 'all' );

	wp_enqueue_script( 'foundation', get_template_directory_uri() . '/js/foundation.min.js', array(), '5.3.0', true );
	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/vendor/modernizr.js', array(), '', true );
	wp_enqueue_script( 'rescue-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '', true );
	wp_enqueue_script( 'rescue_wow', get_template_directory_uri() . '/js/wow.min.js', array ('jquery') );
	wp_enqueue_script( 'pace_script', get_template_directory_uri() . '/js/pace.min.js', array('jquery'), '', true );
	wp_enqueue_script( 'pace_options', get_template_directory_uri() . '/js/pace-options.js', array('jquery'), '', false );
	wp_enqueue_script( 'rescue_custom_universal', get_template_directory_uri() . '/js/custom_universal.js', array('jquery'), '', true );


	if ( is_page_template( 'template-home.php' ) ) { // only load these on the home page
		wp_enqueue_style( 'slider_style', get_template_directory_uri() . '/css/liquid-slider.css', array(), '', 'all' );
		wp_enqueue_script( 'easing', get_template_directory_uri() . '/js/jquery.easing.min.js', array(), '', true );
		wp_enqueue_script( 'touchswipe', get_template_directory_uri() . '/js/jquery.touchSwipe.min.js', array(), '', true );
		wp_enqueue_script( 'liquid_slider', get_template_directory_uri() . '/js/jquery.liquid-slider.min.js', array(), '', true );
		wp_enqueue_script( 'rescue_custom_home', get_template_directory_uri() . '/js/custom_home.js', array('jquery'), '', true );
	}

	wp_enqueue_style( 'rescue_style', get_stylesheet_uri() );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	} 
}
add_action( 'wp_enqueue_scripts', 'rescue_scripts' );

/*----------------------------------------------------*/
/*	Declare WooCommerce support
/*----------------------------------------------------*/
add_theme_support( 'woocommerce' );

/*----------------------------------------------------*/
/*	WooCommerce AJAX cart update
/*----------------------------------------------------*/
add_filter('add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');
 
function woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;
	
	ob_start();
	
	$cart_contents_count = $woocommerce->cart->cart_contents_count;
	if ($cart_contents_count >= 1) {
	?>
	<span class="cart-contents" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'rescue'); ?>">
		<?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'rescue'), $woocommerce->cart->cart_contents_count);?> <span class="total_cost">- <?php echo $woocommerce->cart->get_cart_total(); ?></span>
	</span>
	<?php }
	
	$fragments['span.cart-contents'] = ob_get_clean();
	
	return $fragments;
	
}

/*----------------------------------------------------*/
/*	bbpress Forum Search - http://goo.gl/3Ksieh
/*----------------------------------------------------*/
add_filter( 'template_include', 'rescue_custom_maybe_load_bbpress_tpl', 99 );
 
function rescue_custom_maybe_load_bbpress_tpl ( $tpl ) {
	if ( function_exists( 'is_bbpress' ) && is_bbpress() ) {
		$tpl = locate_template( 'bbpress.php' );
	}
	return $tpl;
} // End rescue_custom_maybe_load_bbpress_tpl()
 
add_filter( 'bbp_get_template_stack', 'rescue_custom_deregister_bbpress_template_stack' );
 
function rescue_custom_deregister_bbpress_template_stack ( $stack ) {
	if ( 0 < count( $stack ) ) {
		$stylesheet_dir = get_stylesheet_directory();
		$template_dir = get_template_directory();
		foreach ( $stack as $k => $v ) {
			if ( $stylesheet_dir == $v || $template_dir == $v ) {
				unset( $stack[$k] );
			}
		}
	}
	return $stack;
} // End rescue_custom_deregister_bbpress_template_stack()


/*----------------------------------------------------*/
/*	Prompt Recommended Plugins
/*----------------------------------------------------*/
require_once get_template_directory() . '/inc/tgm/tgm.php';

/*----------------------------------------------------*/
/*	Image resizing
/*----------------------------------------------------*/
require_once get_template_directory() . '/inc/BFI_Thumb.php';

/*----------------------------------------------------*/
/*	Custom template tags for this theme
/*----------------------------------------------------*/
require_once get_template_directory() . '/inc/template-tags.php';

/*----------------------------------------------------*/
/*	Custom functions that act independently of the theme
/*----------------------------------------------------*/
require_once get_template_directory() . '/inc/extras.php';

/*----------------------------------------------------*/
/*	Customizer additions
/*----------------------------------------------------*/
require_once get_template_directory() . '/inc/customizer.php';

/*----------------------------------------------------*/
/*	Load Jetpack compatibility file
/*----------------------------------------------------*/
require_once get_template_directory() . '/inc/jetpack.php';

/*----------------------------------------------------*/
/*	Debugging
/*----------------------------------------------------*/
require_once get_template_directory() . '/woocommerce/functions.php';

/*----------------------------------------------------*/
/*	Debugging
/*----------------------------------------------------*/
//require_once get_template_directory() . '/inc/errors.php';
