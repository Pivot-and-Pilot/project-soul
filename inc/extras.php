<?php
/** Setup post types and pages */
function projectsoul_posts_page_setup(){

    add_post_type_support( 'page', 'excerpt' );

}

add_action( 'init', 'projectsoul_posts_page_setup' );

/** Enqueue scripts and styles */
function projectsoul_secondary_scripts() {
  // add jquery
  // wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.2.1.min.js', array(), true);

  wp_enqueue_style( 'projectsoul-custom-style', get_template_directory_uri() . '/css/footer.css' );

  
  // wp_enqueue_script('jquery');

  wp_enqueue_script( 'projectsoul-toggle-menu', get_template_directory_uri() . '/js/toggle-navbar-mobile.js', array('jquery'), true );
  wp_enqueue_style( 'header-style', get_template_directory_uri() . '/css/header.css' );

  // SLICK CSS

  wp_enqueue_style( 'projectsoul-slick-style', get_template_directory_uri() . '/js/slick/slick.css'  );
  wp_enqueue_style( 'projectsoul-slick-style-theme', get_template_directory_uri() . '/js/slick/slick-theme.css'  );

  wp_enqueue_style('services-css', get_template_directory_uri() . '/css/services.css');
  
  // LOADER
  wp_enqueue_style('loader-css', get_template_directory_uri() . '/css/loader.css');
  wp_enqueue_script('loader-js', get_template_directory_uri() . '/js/loader.js');        

  // BOOK NOW PAGE
  wp_enqueue_style('book-now-css', get_template_directory_uri() . '/css/book-now.css');
  wp_enqueue_script('book-now-js', get_template_directory_uri() . '/js/book-now.js');        

  wp_enqueue_script( 'projectsoul-slick-js', get_template_directory_uri() . '/js/slick/slick.min.js', '2017', true);
    
  // ScrollMagic
  wp_enqueue_script( 'scrollmagic-velocity', 'https://cdnjs.cloudflare.com/ajax/libs/velocity/1.5.0/velocity.js');    
  wp_enqueue_script( 'scrollmagic-tweenmax', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.3/TweenMax.min.js');    
  wp_enqueue_script( 'scrollmagic', 'https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/ScrollMagic.js', array());    
  wp_enqueue_script( 'scrollmagic-animation', 'https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/plugins/animation.gsap.js');    
  wp_enqueue_script( 'scrollmagic-animation-velocity', 'https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/plugins/animation.velocity.js');        
  wp_enqueue_script( 'scrollmagic-indicators', 'https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/plugins/debug.addIndicators.js');
  wp_enqueue_script( 'scrollmagic-jquery', 'https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/plugins/jquery.ScrollMagic.js');  

  if(is_page('services')){
    wp_enqueue_script( 'projectsoul-scrollmagic', get_template_directory_uri() . '/js/scrollmagic.js');  
  wp_enqueue_script( 'projectsoul-services-js', get_template_directory_uri() . '/js/services.js', array('jquery'), true );  
  
  }

  // wp_enqueue_script( 'jquery-mobile-git', 'http://code.jquery.com/mobile/git/jquery.mobile-git.js'); 
  // wp_enqueue_script( 'jquery-mobile-datepicker', 'https://rawgithub.com/arschmitz/jquery-mobile-datepicker-wrapper/master/jquery.mobile.datepicker.js'); 
  // wp_enqueue_style( 'jquery-mobile-git-css', 'http://code.jquery.com/mobile/git/jquery.mobile-git.css' );
  // wp_enqueue_style( 'jquery-mobile-datepicker-css', 'https://rawgithub.com/arschmitz/jquery-mobile-datepicker-wrapper/master/jquery.mobile.datepicker.css' );

  // wp_enqueue_script( 'projectsoul-toggle-menu', get_template_directory_uri() . '/js/toggle-menu.js', array('jquery'), false, true );
  
  // Enqueue Font Awesome for menu icons always
  wp_enqueue_script( 'font-awesome-cdn', 'https://use.fontawesome.com/affc2627e0.js', array(),'4.7.0');

  // front page
  wp_enqueue_style( 'front-page-style', get_template_directory_uri() . '/css/front-page.css' );
  wp_enqueue_script( 'projectsoul-front-page', get_template_directory_uri() . '/js/front-page.js', array('jquery'), true );

  //about page
  if (is_page('about-us')){
    wp_enqueue_script( 'projectsoul-about', get_template_directory_uri() . '/js/about.js', array('jquery'), true );
    wp_enqueue_style( 'projectsould-about-style', get_template_directory_uri() . '/css/about.css' );
  }
  
  // events page
  wp_enqueue_style( 'calendar-page-style', get_template_directory_uri() . '/css/calendar.css' );
  wp_enqueue_script( 'projectsoul-events-page-script', get_template_directory_uri() . '/js/events-page.js', array('jquery'), true );

  // single event page
  wp_enqueue_style( 'single-event-page-style', get_template_directory_uri() . '/css/single-event.css' );
  wp_enqueue_script( 'projectsoul-single-event-page-script', get_template_directory_uri() . '/js/single-event-page.js', array('jquery'), true );

  
  // wp_enqueue_script( 'projectsoul-services-js', get_template_directory_uri() . '/js/services.js', array('jquery'), true );  

  // Swiper
  wp_enqueue_script( 'swiper-js', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.3/js/swiper.min.js', array(),'4.0.3');
  wp_enqueue_style( 'swiper-css', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.3/css/swiper.min.css' );
  
  // rellax
  wp_enqueue_script( 'projectsoul-rellax-js', get_template_directory_uri() . '/js/rellax/rellax.min.js', true );
}
add_action( 'wp_enqueue_scripts', 'projectsoul_secondary_scripts' );

// Remove end tag from url when Contact Form 7 is submitted
add_filter('wpcf7_form_action_url', 'remove_unit_tag');

function remove_unit_tag($url){
    $remove_unit_tag = explode('#',$url);
    $new_url = $remove_unit_tag[0];
    return $new_url;
}

?>