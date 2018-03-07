<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package projectsoul
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<?php if (!is_page('book-now')) { ?>
<body <?php body_class(); ?>>
	
	<div id="loader">
		<object id="loader-svg" type="image/svg+xml" data="<?php echo get_stylesheet_directory_uri(); ?>/image/loader-logo.svg">Your browser does not support SVGs</object>
	</div>

	<div id="page" class="site">
		<header id="masthead" class="site-header">

			<div class="desktop-header">
				<object id="svg" type="image/svg+xml" data="<?php echo get_stylesheet_directory_uri(); ?>/image/nav.svg">Your browser does not support SVGs</object>
				<a href="<?php echo get_home_url()?>" class='desktop-header-home-page-link'></a>
				<a href="<?php echo get_home_url() . '/services'?>" class='desktop-header-services-link'></a>
				<a href="<?php echo get_home_url() . '/about-us'?>" class='desktop-header-about-us-link'></a>
				<a href="<?php echo get_home_url() . '/events'?>" class='desktop-header-calendar-link'></a>
			</div>

			<div id="sticky-desktop-header">
				<object id="sticky-desktop-svg" type="image/svg+xml" data="<?php echo get_stylesheet_directory_uri(); ?>/image/sticky-logo.svg">Your browser does not support SVGs</object>
				<a class="desktop-nav-home-link" href="<?php echo get_home_url()?>"></a>				
				<div class="sticky-nav">
					<a class="sticky-desktop-header-nav sticky-nav-services" href="<?php echo get_home_url() . '/services'?>">SERVICES</a>
					<a class="sticky-desktop-header-nav sticky-nav-about" href="<?php echo get_home_url() . '/about-us'?>">ABOUT</a>
					<a class="sticky-desktop-header-nav sticky-nav-calendar" href="<?php echo get_home_url() . '/events'?>">CALENDAR</a>
					<div class="sticky-nav-book-now-background"><a class="sticky-nav-book-now" href="<?php echo get_home_url() . '/book-now'?>">BOOK NOW</a></div>
				</div>
			</div>

			<div id="static-mobile-header">
				<object id="static-svg" type="image/svg+xml" data="<?php echo get_stylesheet_directory_uri(); ?>/image/PSP_logo-mobile-08.svg">Your browser does not support SVGs</object>
				<a class="static-mobile-nav-home-link" href="<?php echo get_home_url()?>"></a>
				<div class="static-hamburger">
					<div class="stripes" onclick="openNav()">
						<div class="stripe"></div>
						<div class="stripe"></div>
						<div class="stripe"></div>
					</div>
				</div>
			</div>

			<div id="sticky-mobile-header">
				<object id="sticky-svg" type="image/svg+xml" data="<?php echo get_stylesheet_directory_uri(); ?>/image/sticky-logo.svg">Your browser does not support SVGs</object>
				<a class="mobile-nav-home-link" href="<?php echo get_home_url()?>"></a>
				<div class="hamburger">
					<div class="stripes" onclick="openNav()">
						<div class="stripe"></div>
						<div class="stripe"></div>
						<div class="stripe"></div>
					</div>
				</div>
			</div>

			<div id="myNav" class="overlay"> 
				<div class="menu-x-wrapper"><a href="javascript:void(0)" class="closebtn menu-x" onclick="closeNav()"></a></div>
				<div class="overlay-content">
					<?php
						wp_nav_menu( array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
						) );
					?>
					<div class="nav-yellow-box"></div>
				</div>	
			</div>
			
		</header><!-- #masthead -->
<?php } ?>
