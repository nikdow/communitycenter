<?php
/**
 * Template Name: Full Width
 *
 */
get_header(); ?>

</div><!-- .hero_wrap -->

<div class="row content_row">

	<div class="large-12 columns">

	<div id="primary" class="content-area">

		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'full' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main .site-main -->

	</div><!-- #primary .content-area -->

	</div><!-- .large-12 -->

  </div><!-- .row .content_row -->

<?php get_footer(); ?>