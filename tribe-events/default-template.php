<?php
/**
 * Default Events Template
 * This file is the basic wrapper template for all the views if 'Default Events Template'
 * is selected in Events -> Settings -> Template -> Events Template.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/default-template.php
 *
 * @package TribeEventsCalendar
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

get_header();

?>
<section class="event-section">
		<div id="tribe-events-pg-template" class="tribe-events-pg-template">
			<?php tribe_events_before_html(); ?>
			<?php tribe_get_view(); ?>
			<?php tribe_events_after_html(); ?>
		</div> <!-- #tribe-events-pg-template -->
</section>


<?php
$args = array(
  'posts_per_page'   => '',
  'offset'           => '',
  'category'         => '',
  'orderby'          => 'date',
  'order'            => 'DESC',
  'include'          => '',
  'exclude'          => '',
  'meta_key'         => '',
  'meta_value'       => '',
  'post_type'        => 'tribe_events',
  'post_mime_type'   => '',
  'post_parent'      => '',
  'author'           => '',
  'author_name'      => '',
  'post_status'      => 'publish',
  'suppress_filters' => true,
);

$events = get_posts($args);
?>

<section class="events-page-upcoming-events">
  <div class="events-page-upcoming-events-title">
    <div class="events-page-upcoming-events-black-dash"></div>
    <p class="title">Upcoming Events</p>
  </div>
  
  <?php foreach($events as $event): ?>
    <div class="workshop-cont not-in-slider">
      <img class="workshop-cont-image" src="<?php echo get_the_post_thumbnail_url($event->ID); ?>" alt="">
      <article class="padded-text">
        <a href="<?php echo get_site_url() . '/' .$event->post_name ?>"><h3><?php echo $event->post_title ?></h3></a>
        <p class="title"><?php echo tribe_events_event_schedule_details( $event->ID, '<p class="title">', '</p>' ); ?></p>
        <p><?php echo substr($event->post_content, 0, 100); ?>...</p>
      </article>
    </div>
  <?php endforeach ?>

  <div class="events-page-black-dot-image rellax" data-rellax-speed="1">
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/image/PSP_Black_Dots-01.svg">
  </div>
</section>





<?php
get_footer();
