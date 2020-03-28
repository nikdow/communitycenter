<?php
/**
 * The template part for displaying results in search pages.
 *
 */
?>

<div class="post_wrap clearfix">

	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
 
	<div class="shareModal_wrap">

			<a href="#" class="share_click" title="<?php _e('Share this post','rescue'); ?>" data-reveal-id="shareModal-<?php the_ID(); ?>"><i class="fa fa-share-alt"></i></a>

			<div id="shareModal-<?php the_ID(); ?>" class="reveal-modal tiny" data-reveal>

				<span><?php _e('Share this post:','rescue'); ?></span>
				
				<a class="facebook" onclick="window.open('http://www.facebook.com/sharer.php?u=<?php echo urlencode(the_permalink()) ?>','Facebook','width=600,height=300,left='+(screen.availWidth/2-300)+',top='+(screen.availHeight/2-150)+''); return false;" href="http://www.facebook.com/sharer.php?u=<?php echo urlencode(the_permalink()) ?>"><i class="fa fa-facebook-square"></i></a>
				
				<a class="twitter" onclick="window.open('http://twitter.com/share?url=<?php echo urlencode(the_permalink()) ?>&amp;text=<?php echo urlencode(get_the_title()) ?>','Twitter share','width=600,height=300,left='+(screen.availWidth/2-300)+',top='+(screen.availHeight/2-150)+''); return false;" href="http://twitter.com/share?url=<?php echo urlencode(the_permalink()) ?>&amp;text=<?php echo urlencode(get_the_title()) ?>"><i class="fa fa-twitter-square"></i></a>
				
				<a class="google" onclick="window.open('https://plus.google.com/share?url=<?php echo urlencode(the_permalink()) ?>','Google plus','width=585,height=666,left='+(screen.availWidth/2-292)+',top='+(screen.availHeight/2-333)+''); return false;" href="https://plus.google.com/share?url=<?php echo urlencode(the_permalink()) ?>"><i class="fa fa-google-plus-square"></i></a>

				<a class="pinterest" href="http://www.pinterest.com/pin/create/button/?url=<?php echo urlencode(the_permalink()) ?>&amp;description=<?php echo urlencode(get_the_title()) ?>"data-pin-do="buttonPin"data-pin-config="above"><i class="fa fa-pinterest-square"></i></a>

				<a class="email_share" href="mailto:?Subject=<?php get_site_url(); ?>&amp;Body=<?php echo urlencode(the_permalink()) ?>"><i class="fa fa-envelope-square"></i></a>

			</div><!-- #shareModal -->

	</div><!-- .shareModal_wrap -->

		<header class="entry-header">
			<h1 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
		</header><!-- .entry-header -->

	<div class="entry-meta"><?php _e('Published ','rescue'); rescue_posted_on(); ?></div>

	<?php the_post_thumbnail( array( 815, 355, 'bfi_thumb' => true ) ); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

</article><!-- #post-## -->

	<hr>

	<footer class="entry-footer clearfix">

		<?php 
			echo get_the_category_list(); 
			echo get_the_tag_list('<ul class="post_tags"><li>','</li><li>','</li></ul>');
			edit_post_link( __( 'Edit', 'rescue' ), '<span class="edit-link">', '</span>' ); 
		?>

	</footer><!-- .entry-footer -->

	<hr>

	</div><!-- post class -->

</div><!-- .post_wrap -->
