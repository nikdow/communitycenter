<?php
/**
 * The main template file.
 *
 */

get_header(); ?>

</div><!-- .hero_wrap -->

<div class="blog_header_wrap">

	<?php $blog_overlay_choice = of_get_option( 'blog_overlay_choice' ); ?>
	<?php $blog_background = of_get_option( 'blog_background' ); ?>

    <div class="<?php if ( $blog_background ); { echo "bg-image-hero bg-image"; } ?>">

		<div class="<?php if ( $blog_overlay_choice == '1' ) { echo "blog_overlay"; } ?>">

			<div class="row">
				<div class="large-12 columns ">

					<div class="blog_header_content">
						<?php $blog_h1 = of_get_option( 'blog_header' );
						      $blog_h4 = of_get_option( 'blog_subheader' ); ?>

						<h1 class="wow fadeIn" data-wow-duration=".75s" data-wow-delay="0s"><?php echo $blog_h1 ?></h1>
						<h4 class="wow fadeIn" data-wow-duration=".5s" data-wow-delay=".75s"><?php echo $blog_h4 ?></h4>

					</div><!-- .blog_header_content -->

				</div><!-- .large-12 -->
			</div><!-- .row -->

		</div><!-- .hero_overlay -->

	</div><!-- .bg-image .bg-image-hero -->

</div><!-- .blog_header_wrap -->

<div class="row content_row">

	<div class="large-9 columns">

	<div id="page" class="hfeed site">

		<div id="content" class="site-content">

		<div id="primary" class="content-area">

			<main id="main" class="site-main" role="main">

			<?php if ( have_posts() ) : ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php
						/* Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'content', get_post_format() );
					?>

				<?php endwhile; ?>

				<?php rescue_paging_nav(); ?>

			<?php else : ?>

				<?php get_template_part( 'content', 'none' ); ?>

			<?php endif; ?>

			</main><!-- #main -->

		</div><!-- #primary -->

		</div><!-- #content -->

	</div><!-- #page -->

	</div><!-- .large-9 -->

<?php get_sidebar(); // large-3 ?>

</div><!-- .row .content_row -->

<?php get_footer(); ?>
