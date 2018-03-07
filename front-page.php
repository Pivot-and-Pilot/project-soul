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
			
			<div class="reflection-of-motion">
				<a href="<?php echo get_home_url() . '/book-now'?>" class="reflection-of-motion-book-now">book now</a>
				<div class="reflections-of-motion-image">
					<div class="front-page__reflection-of-motion-overlay"></div>
					<?php the_post_thumbnail(); ?>
					<iframe width="560" height="315" src="https://www.youtube.com/embed/Fy5RvTRjPV8?rel=0&amp;controls=0&amp;showinfo=0&amp;autoplay=1&amp;loop=1&amp;playlist=Fy5RvTRjPV8" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
				</div>
				<div class="reflection-of-motion-title">
					<h1><?php the_field('reflection') ?></h1>
					<div class="front-page-of-and-text">
						<div class="of-wrap">
							<h1><?php the_field('of') ?></h1>
						</div>
						<div class="text-wrap">
							<p class="reflections-of-motion-text"><?php the_field('reflections_of_motion_text') ?></p>
						</div>
					</div>
					<h1><?php the_field('motion') ?></h1>
				</div>
				<!-- mobile -->
				<div class="reflection-of-motion-title-mobile">
					<h1><?php the_field('reflection') ?></h1>
					<h1><?php the_field('of') ?></h1>
					<h1><?php the_field('motion') ?></h1>
				</div>	
				<p class="reflections-of-motion-text-mobile"><?php the_field('reflections_of_motion_text') ?></p>
				<!-- end mobile -->
				<div class="reflections-of-motion-learn-more">
					<svg class="learn-more-white-line">
						<line class="line-animate" x1="0" y1="0" x2="100" y2="0"/>
						Sorry, your browser does not support inline SVG.
					</svg>
					<div class="learn-more-link">
						<a href="<?php echo get_home_url() . '/services'?>">learn more</a>
					</div>
				</div>
				<div class="reflections-of-motion-yellow-box rellax" data-rellax-speed="-7"></div>
			</div>

			<!-- we tell story through dance page -->
			<div class="we-tell-story-through-dance">
				<div class="we-tell-story-through-dance-image">
					<img class='we-tell-story-img rellax' src="<?php the_field('we_tell_story_through_dance_image') ?>" alt="" data-rellax-speed="-1">
				</div>
				<div class="we-tell-story-through-dance-title">
					<h1><?php the_field('we_story') ?></h1>
					<div class="tell-with-black-line">
						<h1><?php the_field('tell') ?></h1>
						<div class="black-line"></div>
					</div>
					<h1><?php the_field('through') ?></h1>
					<h1><?php the_field('dance') ?></h1>
				</div>
				<div class="we-tell-story-through-dance-learn-more-and-text">
					<p class="we-tell-story-through-dance-text"><?php the_field('we_tell_story_through_dance_text') ?></p>
					<div class="we-tell-story-through-dance-learn-more">
						<a href="<?php echo get_home_url() . '/services'?>">LEARN MORE</a>
						<div class="we-tell-story-through-dance-learn-more-yellow-box"></div>
					</div>
				</div>
			</div>
			
			<!-- sponsors -->
			<div class="sponsor-part">
				<div class="sponsor-title">
					<h3><div class="sponsor-title-dash"></div>SOME OF OUR CLIENTS INCLUDE</h3>
				</div>

				<div class="sponsor-logos sponsor-class">
					<?php foreach(range(1,12) as $count): ?>
						<?php if(get_field('sponsor_logo_' . $count)): ?>
							<div class="s-logo"><img src="<?php the_field('sponsor_logo_' . $count); ?>"/></div>
						<?php endif; ?>
					<?php endforeach; ?>  
				</div>
				<div class="sponsor-white-dots rellax" data-rellax-speed="1">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/image/PSP_White_Dots-01.svg">
				</div>
			</div>

			<!-- upcoming events -->
			<div class="up-coming-events">
				<div class="box-1">
					<div class="upcoming-events">upcoming events</div>
					<div class="yellow-slider">
						<?php $events = tribe_get_events( array( 'posts_per_page' => 5 ) ); ?>   
						<?php foreach($events as $event): ?>
							<div class="text-close">
								<div class=flex-slick-slider-header-positioning>									
									<div class="event-dates"><?php echo tribe_get_start_date( $event, false); ?></div>
								</div>
								<a href="<?php echo get_site_url() . '/' .$event->post_name ?>">
									<div class="img-overlay">
										<?php echo get_the_post_thumbnail($event); ?>
									</div> 
								</a>
								
								<div class="address-city-padding">
									<p>
										<span>
											<?php echo( $event->post_title );?>
										</span><br>
										<?php echo tribe_get_address($event). " " .tribe_get_city($event); ?>
									</p>
								</div>
							</div>
						<?php endforeach ?>
					</div>
					<div id="yellow-slider-controls"></div>
				</div> <!--end box 1 -->

				<div class="box-2">
					<div class="slider-for">
						<?php foreach($events as $event): ?>
							<div class="box2-image-and-info-wrap">
								<?php echo get_the_post_thumbnail($event); ?>
								<div class="box2-event-info">
									<h1><?php echo( $event->post_title );?></h1>
									<h1 class='box2__event-address'><?php echo tribe_get_address($event). " " .tribe_get_city($event); ?></h1>
									<h3 class='box2__event-detail'><?php echo( $event->post_content );?></h3>
								</div>
							</div>
						<?php endforeach ?>
					</div>
				</div> <!--end box2-->

			</div>

			<div class="our-style">
				<div class="style-black-dots rellax" data-rellax-speed="2"><img src="<?php echo get_stylesheet_directory_uri(); ?>/image/PSP_Black_Dots-01.svg"></div>
				<div class="our-style-title rellax" data-rellax-speed="2"><?php the_field('our_styles'); ?></div>
				<!-- MOBILE -->
				<div class="front-page-status"></div>			
				<div class="our-style-slick-slider front-page-slick-slider">
					<?php foreach(range(1,10) as $count): ?>
						<?php if(get_field('styles_video_'.$count)): ?>
							<div class="text-close our-style-videos">
								<video muted loop autoplay playsinline src="<?php the_field('styles_video_' . $count); ?>"?>"></video>
								<h1><?php the_field('style_dancing_type_excerpt_'.$count); ?></h1>
								<p><?php the_field('style_description_'.$count); ?></p>
							</div>
						<?php endif ?>
					<?php endforeach; ?>
				</div>
				<!-- DESKTOP -->
				<div class="row swiper-container">
					<div class="swiper-wrapper">
						<?php foreach(range(1,10) as $count): ?>
							<?php if(get_field('styles_video_'.$count)): ?>
								<div class="swiper-slide">
										<video loop muted src="<?php the_field('styles_video_' . $count); ?>" poster="<?php the_field('style_image_' . $count); ?>"></video>
									<div class="slide-inner-content">
										<h1><?php the_field('style_dancing_type_excerpt_'.$count); ?></h1>
										<p><?php the_field('style_description_'.$count); ?></p> 
									</div>
								</div>
							<?php endif ?>
						<?php endforeach; ?>
					</div>
					<!--Add Arrow-->
					<div class="swiper-button-next"></div>
					<div class="swiper-button-prev"></div>
				</div>
			</div>

			<div class="lets-tell-your-story">
				<div class="lets-tell-your-story-big-yellow-box rellax" data-rellax-speed="3"></div>
				<div class="lets-tell-your-story-title"><?php the_field('lets_tell_your_story')?></div>
				<div class="lets-tell-your-story-image"><img src="<?php the_field('lets_tell_your_story_image')?>" alt=""></div>
				<div class="lets-tell-your-story-book-now">
					<a href="<?php echo get_home_url() . '/book-now'?>">BOOK NOW</a>
					<div class="lets-tell-your-story-book-now-yellow-box"></div>
				</div>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();