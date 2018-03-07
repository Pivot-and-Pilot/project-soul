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

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="about-landing-header">
				<div class="about-landing-header-image">
					<?php the_post_thumbnail() ?>
					<div class="about-page-header-overlay"></div>
						<iframe src="https://www.youtube.com/embed/5wNzcp8Bijs?rel=0&amp;controls=0&amp;showinfo=0&amp;autoplay=1&amp;loop=1&amp;playlist=5wNzcp8Bijs" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
				</div>
				<div class="about-landing-header-title">
					<?php the_excerpt() ?>
					<svg class="about-landing-header-white-line">
						<line class="about-landing-header-line-animate" x1="0" y1="0" x2="100" y2="0"/>
						Sorry, your browser does not support inline SVG.
					</svg>
				</div>
				<a href="<?php echo get_home_url() . '/book-now'?>" class="about-landing-header-book-now">book now</a>
				<div class="about-landing-header-yellow-box" data-rellax-speed="-4"></div>
			</div>

			<section class="theme-light">
				<div class="black-dot-image-desktop-top" data-rellax-speed="1">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/image/PSP_Black_Dots-01.svg">
				</div>
				<div class="about-container"> 
					<div class="about-line">
						<div class="black-line-about-us"></div>
						<div class="about-us-title about-us-title-margin">
							<?php the_title();?>
						</div>
					</div>
					
					<div class="flex-container-image-content">
						<div class="flex-container-img">	
							<img src="<?php the_field('about_us_image'); ?>" alt="">	
						</div> 
						<div class="p-container"> 
							<?php the_field('about_us_text') ?> 
						</div>
					</div>
					<div class="black-dot-image-desktop" data-rellax-speed="2">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/image/PSP_Black_Dots-01.svg">
					</div>
				</div>
			</section>
					
			<section class="about-page-our-team-wrap">
				<div class="about-line">
					<div class="black-line-about-us"></div>
					<div class="about-us-title out-team-margin">our team</div>
				</div>

				<!-- MOBILE -->
				<div class="page-status"></div>			
				<div class="our-style-slick-slider about-page-slick-slider">
					<?php foreach(range(1,14) as $count): ?>
					<?php if(get_field('dancer_name_' . $count)): ?>											
						<div>
							<?php if(get_field('dancer_video_' . $count)): ?>
								<video id="about-us-top-image" playsinline autoplay muted loop> <source src="<?php the_field('dancer_video_' . $count); ?>"></video>
							<?php elseif(get_field('dancer_image_' . $count)): ?>
								<img id="about-us-top-image" src="<?php the_field('dancer_image_' . $count); ?>"/>
							<?php endif; ?>
							<!-- <div class="page-status"></div> -->
							<!-- <div id="#mobile-slick-slider-controls"></div> -->
								<div class="style-container">
									<h1><?php the_field('dancer_name_' . $count); ?></h1>
									<p style="font-weight: bold;"><?php the_field('dancer_styles_' .$count)?></p>
									<p><?php the_field('dancer_description_' .$count)?><p>
								</div>
						</div>
					<?php endif; ?>					
					<?php endforeach; ?>
				</div>

				<!-- DESKTOP -->
				<div class="row swiper-container">
					<div class="swiper-wrapper">
						<?php foreach(range(1,14) as $count): ?>
						<?php if(get_field('dancer_name_' . $count)): ?>						
							<div class="swiper-slide">
								<?php if(get_field('dancer_video_' . $count)): ?>
									<div id="swiper-video">
										<video muted loop> <source src="<?php the_field('dancer_video_'. $count); ?>"></video>									
									</div>
								<?php elseif(get_field('dancer_image_' . $count)): ?>
									<div id="swiper-video">
										<img src="<?php the_field('dancer_image_'. $count); ?>"/>									
									</div>
								<?php endif; ?>
								<div class="swiper-inner-content">
									<h1><?php the_field('dancer_name_' . $count); ?></h1>
									<p style="font-weight: bold;"><?php the_field('dancer_styles_' .$count)?></p>
									<p><?php the_field('dancer_description_' .$count)?><p>
								</div>
							</div>
						<?php endif; ?>							
						<?php endforeach; ?>
					</div>
					<div class="swiper-button-next swiper-button-black"></div>
					<div class="swiper-button-prev swiper-button-black"></div>
				</div> <!-- .swiper-container -->
				
				<div class="black-dot-image" data-rellax-speed="-1.5">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/image/PSP_Black_Dots-01.svg">
				</div>

			</section>


		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
