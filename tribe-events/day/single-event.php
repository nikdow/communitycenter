<?php 
/**
 * Day View Single Event
 * This file contains one event in the day view
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/day/single-event.php
 *
 * @package TribeEventsCalendar
 * @since  3.0
 * @author Modern Tribe Inc.
 *
 */

if ( !defined('ABSPATH') ) { die('-1'); } ?>

<?php 

$venue_details = array();

if ($venue_name = tribe_get_meta( 'tribe_event_venue_name' ) ) {
	$venue_details[] = $venue_name;	
}

if ($venue_address = tribe_get_meta( 'tribe_event_venue_address' ) ) {
	$venue_details[] = $venue_address;	
}
// Venue microformats
$has_venue = ( $venue_details ) ? ' vcard': '';
$has_venue_address = ( $venue_address ) ? ' location': '';
?>

<div class="post_wrap clearfix">

	<div id="tribe-events-content" class="tribe-events-single">

		<header class="entry-header">

			<!-- Event Cost -->
			<?php if ( tribe_get_cost() ) : ?> 
				<div class="tribe-events-event-cost">
					<button><?php echo tribe_get_cost( null, true ); ?></button>
				</div>
			<?php endif; ?>

			<!-- Event Title -->
			<?php do_action( 'tribe_events_before_the_event_title' ) ?>
			<h2 class="tribe-events-list-event-title summary">
				<a class="url" href="<?php echo tribe_get_event_link() ?>" title="<?php the_title() ?>" rel="bookmark">
					<?php the_title() ?>
				</a>
			</h2>
			<?php do_action( 'tribe_events_after_the_event_title' ) ?>

		</header><!-- .entry-header -->

		<div class="entry-meta">

			<!-- Event Meta -->
			<?php do_action( 'tribe_events_before_the_meta' ) ?>
			<div class="tribe-events-event-meta <?php echo $has_venue . $has_venue_address; ?>">

				<!-- Schedule & Recurrence Details -->
				<div class="updated published time-details">
					<?php echo tribe_events_event_schedule_details() ?>
				</div>
				
				<?php if ( $venue_details ) : ?>
					<!-- Venue Display Info -->
					<div class="tribe-events-venue-details">
						<?php echo implode( ', ', $venue_details) ; ?>
					</div> <!-- .tribe-events-venue-details -->
				<?php endif; ?>

			</div><!-- .tribe-events-event-meta -->
			<?php do_action( 'tribe_events_after_the_meta' ) ?>

		</div><!-- .entry-metra -->

		<!-- Event Image -->
		<?php the_post_thumbnail( array( 1100, 400, 'bfi_thumb' => true ) ); ?>

		<article>

			<div class="entry-content clearfix">

				<!-- Event Content -->
				<?php do_action( 'tribe_events_before_the_content' ) ?>
				<div class="tribe-events-list-event-description tribe-events-content description entry-summary">
					<?php echo tribe_events_get_the_excerpt() ?>
					<a href="<?php echo tribe_get_event_link() ?>" class="tribe-events-read-more" rel="bookmark"><?php _e( 'Find out more', 'tribe-events-calendar' ) ?> &rarr;</a>
				</div><!-- .tribe-events-list-event-description -->
				<?php do_action( 'tribe_events_after_the_content' ) ?>

			</div><!-- .entry-content -->

		</article>

	</div><!-- #tribe-events-content -->

</div><!-- .post_wrap -->
