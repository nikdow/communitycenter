<?php
/**
 * Template Name: Home
 *
 */

get_header(); ?>

<?php $home_hero_choice = of_get_option( 'home_hero_choice' ); if ( $home_hero_choice == '1' ) { ?>

	<div class="hero_cta_wrap">

		<?php 
			$overlay_choice = of_get_option( 'overlay_choice' ); 
	 	  	$image_or_video = of_get_option( 'image_or_video' );

	 	  	if ( $image_or_video == 'image' ) { // check if we're using a static image for the bg 
	 	?>

		<!-- Image Background -->
	    <div class="bg-image-hero bg-image">

			<div class="<?php if ( $overlay_choice == '1' ) { echo "hero_overlay"; } ?>">

				<div class="row">
					<div class="large-12 columns ">

						<div class="hero_content">
							<?php echo do_shortcode( of_get_option( 'hero_content' ) ); ?>
						</div><!-- .hero_content -->

					</div><!-- .large-12 -->
				</div><!-- .row -->

			</div><!-- .hero_overlay -->

			<a class="hero_more round" href="#discover" <?php if ( $overlay_choice == '0' ) { echo "style=\"display:none;\""; } ?> ><?php _e('Discover More','rescue'); ?></a>

		</div><!-- .bg-image .bg-image-hero -->

		<?php } // end image background ?>

		<!-- Video Background -->
		<?php if ( $image_or_video == 'video' ) { // check if we're using a video for the bg ?>

	    <div class="bg-image-hero hero_vid_wrap">

	    	<div class="hero_vid">

	    		<?php if ( of_get_option( 'youtube_video' ) ) { $youtube_video = of_get_option( 'youtube_video' ); ?>

				<!-- Youtube -->
				<iframe width="1600" height="900" src="//www.youtube.com/embed/<?php echo $youtube_video; ?>?autoplay=1&amp;loop=1&amp;rel=0&amp;fs=0&amp;modestbranding=1&amp;iv_load_policy=3&amp;playlist=<?php echo $youtube_video; ?>&amp;showinfo=0&amp;disablekb=1&amp;controls=0&amp;enablejsapi=1" frameborder="0"></iframe>

				<?php } elseif ( of_get_option( 'vimeo_video' ) ) { $vimeo_video = of_get_option( 'vimeo_video' ); ?>

				<!-- Vimeo -->
				<iframe src="//player.vimeo.com/video/<?php echo $vimeo_video; ?>?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff&amp;autoplay=1&amp;loop=1" width="1601" height="900" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>

				<?php } else { echo "<div class=\"notice alert-box secondary\">Please add a video ID in the Theme Options area.</div>"; } // end video check ?>

			</div><!-- .hero_vid -->

			<div class="row">

				<div class="large-12 columns vid_content_wrap">

					<div class="hero_content">
						<?php echo do_shortcode( of_get_option( 'hero_content' ) ); ?>
					</div><!-- .hero_content -->

				</div><!-- .large-12 -->

			</div><!-- .row -->

			<a class="hero_more round" href="#discover"><?php _e('Discover More','rescue'); ?></a>

		</div><!-- .hero_vid_wrap .bg-image-hero -->

		<?php } // end video background ?>

	</div><!-- .hero_cta_wrap -->

<?php } // end home_hero_choice ?>

</div><!-- .hero_wrap -->

<div id="discover"></div>

<!-- Home Page Content -->
<div class="home_content_wrap">

	<div class="row">

		<div class="large-12 columns">

			<div class="home_content">

				<?php if (have_posts()) : while (have_posts()) : the_post();?>

					<?php the_content(); ?>

				<?php endwhile; endif; ?>

			</div><!-- .home_content -->

		</div><!-- .large-12 -->

	</div><!-- .row -->

<?php $user_section_choice = of_get_option( 'user_section_choice' ); if ( $user_section_choice == '1' ) { ?>
<!-- Site Users -->
<div class="contributor_list_wrap clearfix">

	<div class="row">

		<div class="large-12 columns">

			<h2><?php echo of_get_option( 'home_user_title' ); ?></h2>

			<div class="contributor_list"><?php rescue_contributors(); // edit in inc/template-tags.php ?></div>

			<a href="<?php echo of_get_option( 'home_user_button_link' ); ?>" class="button radius round"><?php echo of_get_option( 'home_user_button_title' ); ?> &#8594;</a>

		</div><!-- .large-12 -->

	</div><!-- .row -->

</div><!-- .contributor_list_wrap -->

<?php } // end User Section ?>

<?php $forum_section_choice = of_get_option( 'forum_section_choice' ); if ( $forum_section_choice == '1' ) { ?>
<!-- Forum Activity -->
<div class="forum_posts_wrap clearfix">
	<div class="row">
		<div class="large-2 columns">

			<h5><?php echo of_get_option( 'home_forums_title' ); ?></h5>
			
		</div><!-- .large-2 -->

		<!-- Forum Content Slider -->
		<div class="large-9 large-offset-1 columns">

			<div class="liquid-slider" id="forum_slider">

			<?php // Display last forum post content

				$forum_posts_num = of_get_option( 'forum_posts_num' ); 

				$args = array( 'posts_per_page' => $forum_posts_num, 'post_type' => array(bbp_get_topic_post_type(),bbp_get_reply_post_type() ) );
				$rand_posts = get_posts( $args );

				foreach ( $rand_posts as $post ) : 
				setup_postdata( $post ); ?>

				<div>

					<?php echo get_avatar( $post->post_author, 46 ); ?>

					<?php the_excerpt(); ?>

					<span class="forum_slider_meta">
						<?php the_author();  _e(' posted ', 'rescue'); echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago'; _e(' in ', 'rescue'); ?> <a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
					</span><!-- .forum_slider_meta -->

				</div>

			<?php endforeach; 
				wp_reset_postdata(); ?>

			</div> <!-- #forum_slider -->

		</div><!-- .large-9 offset-1 -->

	</div><!-- .row -->
</div><!-- .forum_posts_wrap -->

<?php } // end Forum Section ?>

<!-- Secondary Content Area -->
<?php $quote_section_choice = of_get_option( 'quote_section_choice' ); if ( $quote_section_choice == '1' ) { ?>
<div class="quote_area_wrap">

    <div class="bg-image-hero bg-image">

    <?php $overlay_choice = of_get_option( 'quote_overlay_choice' ); ?>

    	<div class="<?php if ( $overlay_choice == '1' ) { echo "hero_overlay"; } ?>">

			<div class="row">
				<div class="large-12 columns ">

					<?php echo do_shortcode( of_get_option( 'quote_content' ) ); ?>

				</div><!-- .large-12 -->
			</div><!-- .row -->

		</div><!-- .hero_overlay -->

	</div><!-- .bg-image .bg-image-hero -->

</div><!-- .quote_area_wrap -->

<?php } // end Quote Section ?>

<!-- Latest from Shop -->
<?php $shop_section_choice = of_get_option( 'shop_section_choice' ); if ( $shop_section_choice == '1' ) { ?>
<div class="home_shop_wrap">

	<div class="row">
		<div class="large-12 columns">

			<h2><?php echo of_get_option( 'home_shop_title' ); ?></h2>

			<?php echo do_shortcode('[featured_products per_page="3" columns="3" orderby="date" order="desc"]'); ?>

			<a href="<?php echo of_get_option( 'shop_link' ); ?>" class="button radius round"><?php echo of_get_option( 'home_shop_button_title' ); ?> &#8594;</a>

		</div><!-- . large-12 -->
	</div><!-- .row -->

</div><!-- .home_shop_wrap -->
<?php } // end Home Section ?>

</div><!-- .home_content_wrap -->

<?php get_footer(); ?>
