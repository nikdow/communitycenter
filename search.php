<?php
/**
 * The template for displaying Search Results pages.
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

				<div class="large-12 columns">

				<header class="page-header blog_header_content">
					<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'rescue' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
				</header><!-- .page-header .blog_header_content -->	

				</div><!-- large-12 -->

			</div><!-- .row -->

		</div><!-- .blog_overlay -->

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
						/**
						 * Run the loop for the search to output the results.
						 * If you want to overload this in a child theme then include a file
						 * called content-search.php and that will be used instead.
						 */
						get_template_part( 'content', 'search' );
						?>

					<?php endwhile; ?>

						<?php rescue_paging_nav(); ?>

					<?php else : ?>
						
						<?php get_template_part( 'content', 'none' ); ?>

					<?php endif; ?>

					</main><!-- #main .site-main -->

				</div><!-- #primary .content-area -->

			</div><!-- #content .site-content -->

		</div><!-- #page -->

	</div><!-- .large-9 -->

<?php get_sidebar(); ?>

</div><!-- .row -->

<?php get_footer(); ?>