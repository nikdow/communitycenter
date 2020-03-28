<?php
/**
 * The template for displaying Archive pages.
 *
 */

get_header(); ?>

</div><!-- .hero_wrap -->

<div class="blog_header_wrap">

<?php if ( have_posts() ) : ?>
	
	<?php $blog_overlay_choice = of_get_option( 'blog_overlay_choice' ); ?>
	<?php $blog_background = of_get_option( 'blog_background' ); ?>

    <div class="<?php if ( $blog_background ); { echo "bg-image-hero bg-image"; } ?>">

		<div class="<?php if ( $blog_overlay_choice == '1' ) { echo "blog_overlay"; } ?>">

			<div class="row">

				<div class="large-12 columns">

						<header class="page-header blog_header_content">

							<h1 class="page-title wow fadeIn" data-wow-duration=".75s" data-wow-delay="0s">
								<?php
									if ( is_category() ) : 
										printf( __( 'Category: ', 'rescue' ) ) ; single_cat_title();

									elseif ( is_tag() ) :
										printf( __( 'Tag: ', 'rescue' ) ) ; single_tag_title();

									elseif ( is_author() ) :
										printf( __( 'Author: %s', 'rescue' ), '<span class="vcard">' . get_the_author() . '</span>' );

									elseif ( is_day() ) :
										printf( __( 'Day: %s', 'rescue' ), '<span>' . get_the_date() . '</span>' );

									elseif ( is_month() ) :
										printf( __( 'Month: %s', 'rescue' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'rescue' ) ) . '</span>' );

									elseif ( is_year() ) :
										printf( __( 'Year: %s', 'rescue' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'rescue' ) ) . '</span>' );

									elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
										_e( 'Asides', 'rescue' );

									elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
										_e( 'Galleries', 'rescue');

									elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
										_e( 'Images', 'rescue');

									elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
										_e( 'Videos', 'rescue' );

									elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
										_e( 'Quotes', 'rescue' );

									elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
										_e( 'Links', 'rescue' );

									elseif ( is_tax( 'post_format', 'post-format-status' ) ) :
										_e( 'Statuses', 'rescue' );

									elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
										_e( 'Audios', 'rescue' );

									elseif ( is_tax( 'post_format', 'post-format-chat' ) ) :
										_e( 'Chats', 'rescue' );

									else :
										_e( 'Archives', 'rescue' );

									endif;
								?>
							</h1>
							<?php
								// Show an optional term description.
								$term_description = term_description();
								if ( ! empty( $term_description ) ) :
									printf( '<h4 class="taxonomy-description wow fadeIn" data-wow-duration=".5s" data-wow-delay=".75s">%s</h4>', $term_description );
								endif;
							?>
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

					</main><!-- #main .site-main -->

				</div><!-- #primary .content-area -->

			</div><!-- #content .site-content -->

		</div><!-- #page -->

	</div><!-- .large-9 -->

<?php get_sidebar(); ?>

</div><!-- .row -->

<?php get_footer(); ?>
