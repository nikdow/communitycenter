<?php
/**
 * Template used to display bbpress forums
 *
 */
get_header(); ?>

</div><!-- .hero_wrap -->

<div class="forum_wrap">

<div class="blog_header_wrap">

	<?php $forum_overlay_choice = of_get_option( 'forum_overlay_choice' ); ?>
	<?php $forum_background = of_get_option( 'forum_background' ); ?>
	<?php $forum_title = of_get_option( 'forum_title' ); ?>

    <div class="<?php if ( $forum_background ); { echo "bg-image-hero bg-image"; } ?>">

		<div class="<?php if ( $forum_overlay_choice == '1' ) { echo "blog_overlay"; } ?>">

			<div class="row">
				<div class="large-12 columns ">

					<div class="blog_header_content">

						<h1 class="breadcrumb_wrap wow fadeIn" data-wow-duration=".75s" data-wow-delay="0s">
							<a class="bbp-forum-title" href="<?php bbp_forum_permalink(); ?>">
								<?php if ( bbp_is_forum_archive() ) { echo $forum_title; } else { single_post_title(); }?>
							</a>
						</h1>
						<span class="breadcrumb_wrap wow fadeIn" data-wow-duration=".75s" data-wow-delay=".75s"><?php bbp_breadcrumb(); ?></span>

					</div><!-- .blog_header_content -->

				</div><!-- .large-12 -->
			</div><!-- .row -->

		</div><!-- .hero_overlay -->

	</div><!-- .bg-image .bg-image-hero -->

</div><!-- .blog_header_wrap -->

<div class="row content_row">

	<div class="large-9 columns">

	<div id="primary" class="content-area">

		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'forum' ); ?>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
		
	</div><!-- #primary -->

	</div><!-- large-9 -->

	<div id="secondary" class="widget-area large-3 columns" role="complementary">
			
		<?php if ( ! dynamic_sidebar( 'forums' ) ) : ?>

			<aside id="search" class="widget">
				<h3 class="widget-title"><?php _e( 'No Widgets Yet', 'rescue' ); ?></h3>
				<p>Add widgets to the sidebar in Appearance > Widgets > Forums Sidebar</p>
			</aside>

		<?php endif; // end sidebar widget area ?>

	</div><!-- #secondary -->
	
</div><!-- .row .content_row -->

</div><!-- .forum_wrap -->

<?php get_footer(); ?>
