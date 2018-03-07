<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package projectsoul
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="landing-background" style="background-image: url(<?php the_post_thumbnail_url(); ?>)">
		<div class="landing-title"><?php the_excerpt() ?></div>
		<div class="landing-description"><?php the_content() ?></div>
	</div>
</article><!-- #post-<?php the_ID(); ?> --> 
