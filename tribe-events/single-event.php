<?php
/**
 * Single Event Template
 * A single event. This displays the event title, description, meta, and
 * optionally, the Google map for the event.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/single-event.php
 *
 * @package TribeEventsCalendar
 * @version  4.3
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$events_label_singular = tribe_get_event_label_singular();
$events_label_plural = tribe_get_event_label_plural();

$event_id = get_the_ID();

?>

<div id="tribe-events-content" class="tribe-events-single">
	<!-- feature image of each event -->
	<div class="single-event-feature-image">
		<div class="single-event-feature-image-overlay"></div>
		<?php echo tribe_event_featured_image( $event_id, 'full', false ); ?>
		<a href="<?php echo get_home_url() . '/book-now'?>" class="single-event-book-now">book now</a>
	</div>

	<!-- Notices -->
	<?php tribe_the_notices() ?>
		<div class="single-event-time">
			<div class="tribe-events-schedule tribe-clearfix">
				<?php echo tribe_events_event_schedule_details( $event_id, '<h2>', '</h2>' ); ?>
				<?php if ( tribe_get_cost() ) : ?>
					<span class="tribe-events-cost"><?php echo tribe_get_cost( null, true ) ?></span>
				<?php endif; ?>
			</div>
		</div>

			<!-- Event header -->
	<div id="tribe-events-header" <?php tribe_events_the_header_attributes() ?>>
	<!-- Navigation -->
		<h3 class="tribe-events-visuallyhidden"><?php printf( esc_html__( '%s Navigation', 'the-events-calendar' ), $events_label_singular ); ?></h3>
		<ul class="tribe-events-sub-nav single-event-page-nav">
			<li class="tribe-events-nav-previous single-event-page-nav-prev"><?php tribe_the_prev_event_link( '<div class="single-event-prev-arrow"></div>' ) ?></li>
			<li class="tribe-events-nav-next single-event-page-nav-next"><?php tribe_the_next_event_link( '<div class="single-event-next-arrow"></div>' ) ?></li>
		</ul>
		<!-- .tribe-events-sub-nav -->
	</div>
	<!-- #tribe-events-header -->

	<?php the_title( '<h1 class="tribe-events-single-event-title">', '</h1>' ); ?>



	<?php while ( have_posts() ) :  the_post(); ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<!-- Event featured image, but exclude link -->

			<!-- Event content -->
			<?php do_action( 'tribe_events_single_event_before_the_content' ) ?>
			<div class="tribe-events-single-event-description tribe-events-content">
				<?php the_content(); ?>
			</div>
			<!-- .tribe-events-single-event-description -->

			<!-- Event meta -->

		</div> <!-- #post-x -->
		<?php if ( get_post_type() == Tribe__Events__Main::POSTTYPE && tribe_get_option( 'showComments', false ) ) comments_template() ?>
	<?php endwhile; ?>

	<!-- Event footer -->
	<div id="tribe-events-footer">
		<!-- Navigation -->
		<h3 class="tribe-events-visuallyhidden"><?php printf( esc_html__( '%s Navigation', 'the-events-calendar' ), $events_label_singular ); ?></h3>
		<ul class="tribe-events-sub-nav">
			<li class="tribe-events-nav-previous"><?php tribe_the_prev_event_link( '<span>&laquo;</span> <' ) ?></li>
			<li class="tribe-events-nav-next"><?php tribe_the_next_event_link( 'span>&raquo;</span> >' ) ?></li>
		</ul>
		<!-- .tribe-events-sub-nav -->
	</div>
	<!-- #tribe-events-footer -->
	<div class="single-event-page-buy-ticket">
		<a href="<?php echo tribe_get_event_website_url( $event_id ); ?>">buy tickets</a>
	</div>
	<p class="tribe-events-back">
		<a href="<?php echo esc_url( tribe_get_events_link() ); ?>"> <?php printf( '&laquo; ' . esc_html_x( 'All %s', '%s Events plural label', 'the-events-calendar' ), $events_label_plural ); ?></a>
	</p>

</div><!-- #tribe-events-content -->
