<?php
/**
 * The template for displaying the footer.
 *
 */
?>
<footer id="colophon" class="site-footer" role="contentinfo">

<?php $footer_section_choice = of_get_option( 'footer_section_choice' ); if ( $footer_section_choice == '1' ) { ?>

	<div class="row">

		<div class="large-6 columns">

			<div class="row">

			<?php if ( ! dynamic_sidebar( 'footer_left' ) ) : endif; ?>

			</div><!-- .row -->

		</div><!-- .large-6 -->

		<div class="large-6 columns">

			<div class="row">

			<?php if ( ! dynamic_sidebar( 'footer_right' ) ) : endif; ?>

		</div><!-- .row -->

		</div><!-- .large-6 -->

	</div><!-- .row -->

<?php } ?>

	<div class="copyright_wrap">
		<div class="row">

				<div class="large-12 columns">

					<div class="site-info">
						<span>&#169; <?php _e('Copyright','rescue'); ?> <?php echo date('Y '); ?><?php echo of_get_option( 'copyright_text' ); ?></span>
					</div><!-- .site-info -->

				</div><!-- .large-12 -->

		</div><!-- .row -->
	</div><!-- .copyright_wrap -->

</footer><!-- .site-footer #colophon -->

<?php wp_footer(); ?>

</body>

</html>