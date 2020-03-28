<?php
/**
 * The Header for our theme.
 *
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>

  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title><?php wp_title( '|', true, 'right' ); ?></title>

  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<div class="hero_wrap">

<header id="masthead" class="site-header" role="banner">

	<div class="mini_nav_wrap">

		<div class="row">
			
			<!-- Top Header Navigation -->
			<div class="large-12 columns mini_nav">

				<ul class="cart_search">

					<?php // checking for woocommerce & displaying cart 
						include_once( ABSPATH . 'wp-admin/includes/plugin.php' ); 
						if(is_plugin_active( 'woocommerce/woocommerce.php')) : ?>

					<li class="cart">

						<?php global $woocommerce;

						$cart_contents_count = $woocommerce->cart->cart_contents_count; ?>

						<a class="cart_count" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" data-dropdown="cart_drop" data-options="is_hover:true;align:left">
							<i class="fa fa-shopping-cart"></i>

						<?php if ($cart_contents_count >= 1) { ?>

								<div class="cart-contents" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'rescue'); ?>">
									<?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'rescue'), $woocommerce->cart->cart_contents_count);?> <span class="total_cost">- <?php echo $woocommerce->cart->get_cart_total(); ?></span>
								</div>
								
						<?php } ?>

						</a><!-- .cart_court -->

						<ul id="cart_drop" class="content f-dropdown small" data-dropdown-content>

						<?php if ($cart_contents_count >= 1) { ?>

								<li><a href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View Cart', 'rescue'); ?>" class="header_shop_button radius view_cart_button"><?php _e('View Cart', 'rescue'); ?></a></li>
								<li><a href="<?php echo $woocommerce->cart->get_checkout_url(); ?>" title="<?php _e('Proceed to Checkout', 'rescue'); ?>" class="header_shop_button radius checkout_button"><?php _e('Checkout', 'rescue'); ?></a></li>

						<?php } else { $shop_page_url = get_permalink( woocommerce_get_page_id( 'shop' ) ); ?>

								<li><a href="<?php echo $shop_page_url; ?>" title="<?php _e('View Shop', 'rescue'); ?>" class="header_shop_button radius view_cart_button"><?php _e('Go to Shop', 'rescue'); ?></a></li>
						<?php } ?>

						</ul><!-- #cart_drop -->

					</li><!-- .cart -->

				<?php endif; // end woocommerce check ?>

					<!-- Search Form -->
					<li class="search">
						<a href="#" data-dropdown="search_drop" data-options="align:left">
							<i class="fa fa-search"></i>
						</a>
						<ul id="search_drop" class="content f-dropdown medium" data-dropdown-content>
						  <li>
							<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
								<label>
									<span class="screen-reader-text"><?php _e('Search for:','rescue'); ?></span>
									<input type="search" class="search-field round" placeholder="<?php _e('Enter your search and press enter','rescue'); ?>" value="" name="s" title="Search for:" />
								</label>
								<input type="submit" class="search-submit" value="Search" />
							</form>
						  </li>
						</ul>
					</li>

				</ul><!-- .cart_search -->

				<div class="menu-top-header-container">
					
				<?php wp_nav_menu( array('theme_location' => 'top_header', )); ?>

				</div><!-- .menu-top-header-container -->

			</div><!-- .mini_nav .large-12-->

		</div><!-- .row -->

	</div><!-- .mini_nav_wrap -->

	<div class="row bottom_nav_wrap">

		<div class="large-12 columns">

		<?php $sticky_nav_choice = of_get_option( 'sticky_nav_choice' ); ?>

		<div class="<?php if ( $sticky_nav_choice == '1' ) { echo "stick contain-to-grid"; } ?>">

	      <nav class="top-bar" data-topbar data-options="mobile_show_parent_link: true">

	          <ul class="title-area">

	          	<!-- Logo -->
	            <li class="name">
	            	<?php 
	            		if ( of_get_option( 'logo_image' ) ) {
	            	?>
	            	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo of_get_option( 'logo_image' ); ?>" alt=""></a>

	            	<?php } else { ?>
 
					<h3 class="site-title fade"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h3>
					<?php } ?>
	            </li>

	             <!-- Mobile Menu Toggle -->
	            <li class="toggle-topbar menu-icon"><a href="#"><?php //_e('Menu','rescue'); ?></a></li>

	          </ul><!-- .title-area -->

			<!-- Bottom Header Navigation -->
	        <section class="top-bar-section">
	
				<!-- Donation Button -->
				<div class="show-for-medium-up">
	       		<?php 
		            $button_choice = of_get_option( 'button_choice' );
		            if ( $button_choice == '1' ) { ?>
					<a href="<?php echo of_get_option('button_link'); ?>"><span class="donate_button round"><?php echo of_get_option( 'button_text' ); ?></span></a>
				<?php } ?>
				</div><!-- .show-for-medium-up -->

				<?php 
					$defaults = array(
				        'theme_location' => 'bottom_header',
				        'container' 	 => false,
				        'menu_class'	 => 'right',
				        'depth' 		 => 5,
				        'fallback_cb'    => false,
				        'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
				        'walker' 		 => new foundation_walker()
					);

					wp_nav_menu( $defaults );
				?>

				<!-- Donation Button -->
				<div class="show-for-small-only">
	       		<?php 
		            $button_choice = of_get_option( 'button_choice' );
		            if ( $button_choice == '1' ) { ?>
					<a href="<?php echo of_get_option('button_link'); ?>"><span class="donate_button round"><?php echo of_get_option( 'button_text' ); ?></span></a>
				<?php } ?>
				</div><!-- .show-for-small-only -->

	        </section><!-- .top-bar-section -->

	      </nav><!-- .top-bar -->

		</div><!-- .stick -->

		</div><!-- .large-12 -->

	</div><!-- .bottom_nav_wrap .row -->

</header><!-- #masthead -->

