<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package projectsoul
 */

get_header(); ?>

	<div id="primary" class="content-area book-now-content-area">
		<main class="book-now-main">
<!-- 
		<?php $previous = "javascript:history.go(-1)";
			if(isset($_SERVER['HTTP_REFERER'])) {
    	$previous = $_SERVER['HTTP_REFERER'];
			} ?> -->

		<div class="x-wrapper"><a href="JavaScript:setTimeout(loadUrl,1500)" class="book-now-close x"></a></div>

			<nav class="book-now-nav">
				<button>1. EVENT DETAILS</button>
				<button>2</button>
			</nav>

			<?php echo do_shortcode( '[contact-form-7 id="310" title="Book Now"]' ); ?>

			<div class="book-now-arrows">
				<button class="book-now-next"><i class="fa fa-angle-right fa-2x" aria-hidden="true"></i></button>
				<button class="book-now-prev hidden"><i class="fa fa-angle-left fa-2x" aria-hidden="true"></i></button>
			</div>

			<div class="book-now-footer">
				<span>Don't like forms?</span>
				<div class="flex-column"><span>Send us an email:&nbsp;</span>
				<a class="book-now-email" href="mailto:hello@projectsoul.com">hello@projectsoul.com</a></div>
				<div class="flex-column"><span>Or give us a call:&nbsp;</span>
				<a class="book-now-tel" href="tel:6048627286">604.862.7286</a></div>
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php

