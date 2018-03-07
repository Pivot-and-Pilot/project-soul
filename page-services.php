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

		<div class="services-landing-header">
			<div class="services-landing-header-image">
				<?php the_post_thumbnail() ?>
				<div class="services-page-header-overlay"></div>
				<iframe id="services-page__iframe" src="https://www.youtube.com/embed/nZXY8mjazI4?rel=0&amp;controls=0&amp;showinfo=0&amp;autoplay=1&amp;loop=1&amp;playlist=nZXY8mjazI4" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
				<div class="services-landing-header-content">
				<div class="services-landing-header-title">
					<?php the_field('reflections') ?>
					<div class="services-landing-header-title-middle">
						<?php the_field('of') ?>
						<div class="services-landing-header-description">
							<p><?php the_field('services_landing_description') ?><p>
						</div>								
					</div>		
					<?php the_field('motion') ?>					
				</div>
				</div>
			</div>
			<a href="http://projectsoul.ca/book-now/" class="services-landing-book-now">BOOK NOW</a>
			<div class="services-landing-yellow-box" data-rellax-speed="4"></div>
		</div>
			
			<section class="services-body" id="services">
				<section id="services-scrollmagic-rail">

				<nav class="services-nav">
					<div class="services-nav-container">
						<div class="services-nav-titles">
							<div class="our-services-title">OUR SERVICES</div>
							<div class="our-approach-title">OUR APPROACH</div>
							<div class="our-styles-title">OUR STYLES</div>
						</div>
					</div>					
				</nav>

				<div class="our-container" id="our-services">

					<!-- CHOREOGRAPHED SVG -->
					<div class="services-desktop">
						<div class="services-desktop-wrap">
							<div class="custom-DESKTOP services-img-container">
								<img id="services-img1" src="<?php echo get_stylesheet_directory_uri(); ?>/image/PSP_logo-choreographed-Desktop-01.svg">
								<img id="services-img2" class="hidden" src="<?php echo get_stylesheet_directory_uri(); ?>/image/PSP_logo-Custom-Desktop-01.svg">
								<img id="services-img3" class="hidden" src="<?php echo get_stylesheet_directory_uri(); ?>/image/PSP_logo-freestyle-Desktop-01.svg">						
							</div> 
							<div class="services-about">
								<p class="choreographed-about"><?php the_field('choreographed_field')?></p>
								<p class="custom-about hidden"><?php the_field('custom_field')?></p>
								<p class="freestyle-about hidden"><?php the_field('freestyle_field')?></p>
							</div>
						</div>						
					</div>

					<!-- CHOREOGRAPHED SVG -->					
					<div class="custom-MOBILE">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/image/PSP_logo-choreographed-Mobile-01.svg">
						<p><?php the_field('choreographed_field')?></p>					
					</div> 
					
					<!-- CUSTOM SVG -->
					<div class="custom-MOBILE">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/image/PSP_logo-Custom-Mobile-01.svg">
						<p><?php the_field('custom_field')?></p>
					</div> 

					<!-- FREESTYLE SVG -->
					<div class="custom-MOBILE">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/image/PSP_logo-freestyle-Mobile-01.svg">
						<p><?php the_field('freestyle_field')?></p>
					</div> 
				</div>

				<div class="our-container" id="our-approach">
					<div class="approach-step-one">
						<!-- 1 CLIENT COMES FIRST -->
						<div class="approach-step">
							<span class="number">1</span>
							<div class="approach-snippet"><?php the_field('approach_1'); ?></div>
						</div>
						
						<img class="approach-image1" data-rellax-speed="1" src="<?php the_field('approach_image_1') ?>"/>
							<div class="yellow-box1" data-rellax-speed="-1"></div>

						<!-- 2 CREATION -->
						<div class="approach-step">
							<span class="number">2</span>
							<div class="approach-snippet"><?php the_field('approach_2'); ?></div>
						</div>
					</div>
				

					<div class="approach-step-two">
						<!-- 3 ARTISTIC FLAIR -->
						<div class="approach-step">
							<span class="number">3</span>
							<div class="approach-snippet"><?php the_field('approach_3'); ?></div>
						</div>
						

						<img class="approach-image2" data-rellax-speed="1" src="<?php the_field('approach_image_2') ?>"/> 
						<div class="yellow-box2" data-rellax-speed="-2"></div>

						<!-- 4 FINAL STEPS -->
						<div class="approach-step">
							<span class="number">4</span>
							<div class="approach-snippet"><?php the_field('approach_4'); ?></div>
						</div>
					</div>

				</div>
		</section>
				<div class="our-container" id="our-styles">
					<div class="nav-our-styles-test">
						<a href="#our-styles-test"></a>
						<div class="our-styles-title-test">OUR STYLES</div>
					</div>

					<!-- MOBILE OUR STYLES --> 
					<div class="yellow-styles-container">
						<span class="styles-title">STYLES</span>
						<div class="services-yellow-slider"> 
							<?php foreach(range(1,10) as $count): ?>
								<?php if(get_field('styles_video_'.$count)): ?>
								<div class="styles-carousel-left">
									<div class="styles-header">
										<span class="styles-name"><?php the_field('style_name_'.$count) ?></span>
									</div>
									<div class="video-wrapper">
										<video muted autoplay playsinline loop class="services-video"> 
											<source src="<?php the_field('styles_video_'.$count) ?>" onerror="fallback(parentNode)">
											<img src="<?php the_field('styles_image_'.$count) ?>">
										</video>	
									</div>
								</div>
							<?php endif; ?>
							<?php endforeach; ?>
						</div>
						<div id="styles-buttons"></div>
					</div>

					<!-- DESKTOP OUR STYLES -->
					<div class="yellow-styles-container2">
						<div class="services-slider">
							<?php foreach(range(1,10) as $count): ?>
								<div class="styles-image-wrap">
									<?php if(get_field('styles_image_'.$count)): ?>
										<img class="styles-image2" src="<?php echo the_field('styles_image_'.$count); ?>"/>
									<?php endif ?>
									<div class="styles-description">
										<div class="styles-description-wrapper">
											<h1><?php the_field('style_name_'.$count) ?></h1>
											<?php the_field('styles_description_'.$count) ?>
										</div>										
									</div>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
				</div>

			</section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
