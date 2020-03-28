<?php
/**
 * The template used for displaying page content in page.php
 *
 */
?>

<div class="post_wrap clearfix">

		<header class="entry-header">
			<h1 class="entry-title"><?php the_title(); ?></h1>
		</header><!-- .entry-header -->

	<div class="entry-meta"><?php //_e('Published ','rescue'); rescue_posted_on(); ?></div>

	<?php the_post_thumbnail( array( 815, 355, 'bfi_thumb' => true ) ); ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<div class="entry-content clearfix">

			<?php the_content(); ?>
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'rescue' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->

	</article><!-- #post-## -->

	<footer class="entry-footer clearfix">

		<?php 
			edit_post_link( __( 'Edit', 'rescue' ), '<span class="edit-link">', '</span>' ); 
		?>

	</footer><!-- .entry-footer -->

</div><!-- .post_wrap -->