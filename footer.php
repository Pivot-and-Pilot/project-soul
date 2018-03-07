<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package projectsoul
 */

?>
 
	</div><!-- #content -->

	<?php if (!is_page('book-now')) { ?>
	<footer id="colophon" class="site-footer">
		<section class="theme-dark">
				<div class="footer-container">
						<div>
							<div class="custom-social">	
								<a href="https://www.facebook.com/Project-Soul-217345311663883/" target='_blank'>
									<img class="custom-social-fb" src="<?php echo get_stylesheet_directory_uri(); ?>/image/PSP_Social_icons-01.svg"/>		
								</a>
								<a href="https://www.instagram.com/projectsouldance/" target='_blank'>
									<img class="custom-social-instagram" src="<?php echo get_stylesheet_directory_uri(); ?>/image/PSP_Social_icons-02.svg"/>
								</a>
							</div>
					
							<div class="footer-contact">
								<a href="tel:6048627286">604.862.7286</a>
								<a href="mailto:kim@projectsoul.com">kim@projectsoul.com</a>
							</div>
						</div>
					<div class="footer-flex-bottom">
						<div class="move-content-right">2017 &copy; Project Soul</div>
						<div>Web Design by Pivot & Pilot</div>
					</div>
				</div>
		</section>	
	</footer><!-- #colophon -->
	<?php } ?>
</div><!-- #page -->

</body>
</html>
