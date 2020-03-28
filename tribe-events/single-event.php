<?php
/**
 * Single Event Template
 * A single event. This displays the event title, description, meta, and
 * optionally, the Google map for the event.
 * 
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/single-event.php
 *
 * @package TribeEventsCalendar
 * @since  2.1
 * @author Modern Tribe Inc.
 *
 */

if ( !defined('ABSPATH') ) { die('-1'); }

$event_id = get_the_ID();

?>

<p class="tribe-events-back"><a href="<?php echo tribe_get_events_link() ?>"> <?php _e( '&larr; All Events', 'tribe-events-calendar' ) ?></a></p>

		<!-- Notices -->
		<?php tribe_events_the_notices() ?>

<div class="post_wrap clearfix">

	<div id="tribe-events-content" class="tribe-events-single vevent hentry">

		<header class="entry-header">
			
		<!-- Event Cost -->
		<?php if ( tribe_get_cost() ) : ?> 
			<div class="tribe-events-event-cost">
				<button><?php echo tribe_get_cost( null, true ); ?></button>
			</div>
		<?php endif; ?>

		<?php the_title( '<h2 class="tribe-events-single-event-title summary entry-title">', '</h2>' ); ?>

		</header><!-- .entry-header -->

		<div class="entry-meta">

			<!-- Event meta -->
			<?php do_action( 'tribe_events_single_event_before_the_meta' ) ?>
				<?php echo tribe_events_event_schedule_details( $event_id, '<h5>', '</h5>'); ?>
			<?php do_action( 'tribe_events_single_event_after_the_meta' ) ?>

			<!-- Event header -->
			<div id="tribe-events-header" <?php tribe_events_the_header_attributes() ?>>
				<!-- Navigation -->
				<h3 class="tribe-events-visuallyhidden"><?php _e( 'Event Navigation', 'tribe-events-calendar' ) ?></h3>
				<ul class="tribe-events-sub-nav">
					<li class="tribe-events-nav-previous"><?php tribe_the_prev_event_link( '<span>&laquo;</span> %title%' ) ?></li>
					<li class="tribe-events-nav-next"><?php tribe_the_next_event_link( '%title% <span>&raquo;</span>' ) ?></li>
				</ul><!-- .tribe-events-sub-nav -->
			</div><!-- #tribe-events-header -->

		</div><!-- .entry-meta -->

	<?php while ( have_posts() ) :  the_post(); ?>

		<a href="<?php echo tribe_get_event_link() ?>" title="<?php the_title() ?>">
				<?php the_post_thumbnail( array( 1100, 400, 'bfi_thumb' => true ) ); ?>
		</a>

		<article id="post-<?php the_ID(); ?>" <?php post_class('vevent'); ?>>

			<div class="entry-content clearfix">

				<!-- Event content -->
				<?php do_action( 'tribe_events_single_event_before_the_content' ) ?>
				<div class="tribe-events-single-event-description tribe-events-content entry-content description">
					<?php the_content(); ?>
				</div><!-- .tribe-events-single-event-description -->
				<?php do_action( 'tribe_events_single_event_after_the_content' ) ?>

			<!-- Event meta -->
			<?php do_action( 'tribe_events_single_event_before_the_meta' ) ?>
				<?php
				/**
				 * The tribe_events_single_event_meta() function has been deprecated and has been
				 * left in place only to help customers with existing meta factory customizations
				 * to transition: if you are one of those users, please review the new meta templates
				 * and make the switch!
				 */
				if ( ! apply_filters( 'tribe_events_single_event_meta_legacy_mode', false ) )
					tribe_get_template_part( 'modules/meta' );
				else echo tribe_events_single_event_meta()
				?>
			<?php do_action( 'tribe_events_single_event_after_the_meta' ) ?>

			<?php if( get_post_type() == TribeEvents::POSTTYPE && tribe_get_option( 'showComments', false ) ) comments_template() ?>

			</div><!-- .entry-content -->

		</article><!-- #post-ID -->

	<?php endwhile; ?>

	<!-- Event footer -->
    <div id="tribe-events-footer">

		<!-- Navigation -->
		<h3 class="tribe-events-visuallyhidden"><?php _e( 'Event Navigation', 'tribe-events-calendar' ) ?></h3>
		<ul class="tribe-events-sub-nav">
			<li class="tribe-events-nav-previous"><?php tribe_the_prev_event_link( '<span>&larr;</span> %title%' ) ?></li>
			<li class="tribe-events-nav-next"><?php tribe_the_next_event_link( '%title% <span>&rarr;</span>' ) ?></li>
		</ul><!-- .tribe-events-sub-nav -->
	</div><!-- #tribe-events-footer -->

	</div><!-- #tribe-events-content -->

</div><!-- .post_wrap -->
