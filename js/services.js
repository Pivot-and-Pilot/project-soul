function fallback(video) {
  var img = video.querySelector('img');
  if (img)
    video.parentNode.replaceChild(img, video);
}

jQuery(document).ready(function($) {
  // Get window size
  function get_window_size (){
    var window_width = jQuery(window).width();
    return window_width;
  }

  // play carousel video
  function playVideo() {
    for (let i = 0; i < $('.services-video').length; i++){
      let currentVid = $('.services-video')[i];
      let isActive = $(currentVid).parent().parent().hasClass('slick-active');
      if (isActive){
        // $('.services-video')[i].load();
        $('.services-video')[i].play();    
        // $('.services-video')[i].muted = true;  
      } else {
        $('.services-video')[i].pause();
        $('.services-video')[i].currentTime = 0;
      }
    }
  }

  const windowSize = get_window_size();  
  let controls = '#styles-buttons';

  // if MOBILE, show one slider
  if (windowSize < 769) {
    jQuery('.services-yellow-slider').slick({
      focusOnSelect: true,
      appendArrows: controls,
      arrows: true,
      speed: 400,
      prevArrow:
        '<button type="button" class="slick-prev"><i class="fa fa-chevron-left" aria-hidden="true"></i><span class="control-previous"> PREV</span></button>',
      nextArrow:
        '<button type="button" class="slick-next"><span class="control-next">NEXT </span><i class="fa fa-chevron-right" aria-hidden="true"></i></button>',
    });
    $('.yellow-styles-container2').hide();

    for (let i = 0; i < $('.services-video').length; i++){
      let currentVid = $('.services-video')[i];
      let isActive = $(currentVid).parent().parent().hasClass('slick-active');
    }
  }

  // if IPAD PRO / DESKTOP, show second slider
  if (windowSize > 769){

    let servicesImgWidthInit = $('.services-img-container').width();
    let newMarginWidthInit = ((servicesImgWidthInit * 4) / 9);
    $('.services-about').css('margin-left', newMarginWidthInit);
    
  
    $(window).resize(function () {
      let servicesImgWidth = $('.services-img-container').width();
      let newMarginWidth = ((servicesImgWidth * 4) / 9);
      $('.services-about').css('margin-left', newMarginWidth);
    })

    jQuery('.services-yellow-slider').slick({
      asNavFor: '.services-slider',
      focusOnSelect: true,
      appendArrows: controls,
      arrows: true,
      speed: 500,      
      prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-chevron-left" aria-hidden="true"></i><span class="control-previous"> PREV</span></button>',
      nextArrow: '<button type="button" class="slick-next"><span class="control-next">NEXT </span><i class="fa fa-chevron-right" aria-hidden="true"></i></button>',
      useTransform: true,      
      cssEase: 'ease-in-out'
    });
    jQuery('.services-slider').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      speed: 500,
      arrows: false,
      asNavFor: '.services-yellow-slider',
      useTransform: true,
      cssEase: 'ease-in-out'      
    });

    playVideo();
    // on change
    $('.services-yellow-slider').on('afterChange', function() {
      playVideo();
    });

  }


  // Hover and Show Our Styles Description
  (function hoverEffect(){
    $('.video-wrapper').hover(function () {
      $('.styles-description').css("opacity", "1");
    }, function () {
      $('.styles-description').css("opacity", "0");
    });
  })();

  // Parallax
  var servicesYellowBox = new Rellax('.services-landing-yellow-box', {
    center: true,
  });
  var approachImage1 = new Rellax('.approach-image1', {
    center: true,
  });
  var yellowBox1 = new Rellax('.yellow-box1', {
    center: true,
  });
  var approachImage2 = new Rellax('.approach-image2', {
    center: true,
  });
  var yellowBox2 = new Rellax('.yellow-box2', {
    center: true,
  });

});
