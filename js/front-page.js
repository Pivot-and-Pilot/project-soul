jQuery(document).ready(function($){

  frontPageSlider()

  function get_window_size (){
    var window_width = jQuery(window).width();
    return window_width;
  }

  (function detectBrownser(){
    var isSafari = /constructor/i.test(window.HTMLElement) || (function (p) { return p.toString() === "[object SafariRemoteNotification]"; })(!window['safari'] || (typeof safari !== 'undefined' && safari.pushNotification));
    if (isSafari){
      $('.reflections-of-motion-image > iframe').hide()
      $('.reflections-of-motion-image > img').css('display', 'block');
      $('.reflections-of-motion-image > img').css('height', '100%');
      $('.reflections-of-motion-image > img').css('width', '100%');
      $('.reflections-of-motion-image > img').css('objectFit', 'cover');
    }
  })();

  function frontPageSlider(){
    const windowSize = get_window_size();
    var controls = "#yellow-slider-controls";
    
    if (windowSize < 700){
      //sponsor slider
      jQuery('.sponsor-logos').slick({
        arrows: false,
        dots: true,
      });
    }

    if (windowSize < 1050){
      jQuery('.yellow-slider').slick({
        focusOnSelect: true,
        appendArrows: controls,
        arrows: true,
        prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-chevron-left" aria-hidden="true"></i></span><span class="control-previous">  PREV</span></button>',
        nextArrow: '<button type="button" class="slick-next"><span class="control-next">NEXT    </span><i class="fa fa-chevron-right" aria-hidden="true"></i></button>'
      });
      jQuery('.box-2').hide();

      // our style slider
      jQuery('.our-style-slick-slider').slick({
        arrows: true,
        prevArrow: '<button type="button" class="about-slick-prev"><i class="fa fa-angle-left" aria-hidden="true"></button>',
        nextArrow: '<button type="button" class="about-slick-next"><i class="fa fa-angle-right" aria-hidden="true"></i></button>'
      });

      // front page our styles slick slider count

      let frontPageCount = $('.front-page-slick-slider').slick('getSlick').slideCount;
      $('.front-page-status').text(`1/${frontPageCount}`)
      $('.front-page-slick-slider').on('init reinit afterChange', function(event, slick, currentSlide, nextSlide) {
        let i = (currentSlide ? currentSlide : 0) + 1;
        $('.front-page-status').text(`${i}/${slick.slideCount}`);
      }); 

      // about page slick slider count
      $('.about-page-slick-slider').on('init reinit afterChange', function(event, slick, currentSlide, nextSlide) {
        let i = (currentSlide ? currentSlide : 0) + 1;
        $('.page-status').text(`${i}/${slick.slideCount}`);
      }); 
    }

    if (windowSize > 1050){

      jQuery('.yellow-slider').slick({
        asNavFor: '.slider-for',
        focusOnSelect: true,
        // infinite: false,
        appendArrows: controls,
        arrows: true,
        prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-chevron-left" aria-hidden="true"></i></span><span class="control-previous">  PREV</span></button>',
        nextArrow: '<button type="button" class="slick-next"><span class="control-next">NEXT    </span><i class="fa fa-chevron-right" aria-hidden="true"></i></button>'
      }); 
      jQuery('.slider-for').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        // infinite: false,
        arrows: false,
        asNavFor: '.yellow-slider'
      });

      //our style slider
      var swiper = new Swiper('.swiper-container', {
        initialSlide: 1,
        loop: true,
        effect: 'coverflow',
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: 'auto',
        coverflowEffect: {
            rotate: 0,
            stretch: -150,
            depth: 500,
            modifier: 1,
            slideShadows : false,
        },
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
      
      });
    }
  }

  if (window.location.pathname === '/'){

    (function hoverEffect(){

      //upcoming events
      $('.yellow-slider').hover(function () {
        $('.box2-event-info').css("opacity", "1");
      }, function () {
        $('.box2-event-info').css("opacity", "0");
      });

    })();

    //parallax
    (function parallaxEfect(){
      var rellax = new Rellax('.rellax', {
        center: true,
      });
      // window.requestAnimationFrame(parallaxEfect);
    })();
    // window.requestAnimationFrame(parallaxEfect);


    //add autoplay to active videos
    (function autoPlay(){
      let activeVideo;
      const windowSize = get_window_size();
      for (let i = 0; i < $('.swiper-slide').length; i++){
        if ($($('.swiper-slide')[i]).hasClass('swiper-slide-active')){
          activeVideo = $($('.swiper-slide')[i])[0].children[0];
          activeVideo.autoplay = true;
        }
      }
    })();


    (function videoNavigation(){
      $('.swiper-button-next').on('click', () => {
        let activeVideo;
        let prevVideo;
        let nextVideo;
        for (let i = 0; i < $('.swiper-slide').length; i++){
          if ($($('.swiper-slide')[i]).hasClass('swiper-slide-active')){
            activeVideo = $($('.swiper-slide')[i])[0].children[0];
            activeVideo.play();
          }
          if ($($('.swiper-slide')[i]).hasClass('swiper-slide-prev')){
            prevVideo = $($('.swiper-slide')[i])[0].children[0];
            prevVideo.autoplay = false;
            prevVideo.pause();
            prevVideo.currentTime = 0;
          }
          if ($($('.swiper-slide')[i]).hasClass('swiper-slide-next')){
            nextVideo = $($('.swiper-slide')[i])[0].children[0];
            nextVideo.autoplay = false;
            nextVideo.pause();
            nextVideo.currentTime = 0;
          }
        }
      })
      $('.swiper-button-prev').on('click', () => {
        let activeVideo;
        let nextVideo;
        let prevVideo;
        for (let i = 0; i < $('.swiper-slide').length; i++){
          if ($($('.swiper-slide')[i]).hasClass('swiper-slide-active')){
            activeVideo = $($('.swiper-slide')[i])[0].children[0];
            activeVideo.play();
          } 
          if ($($('.swiper-slide')[i]).hasClass('swiper-slide-next')){
            nextVideo = $($('.swiper-slide')[i])[0].children[0];
            nextVideo.autoplay = false;
            nextVideo.pause();
            nextVideo.currentTime = 0;
          }
          if ($($('.swiper-slide')[i]).hasClass('swiper-slide-prev')){
            prevVideo = $($('.swiper-slide')[i])[0].children[0];
            prevVideo.autoplay = false;
            prevVideo.pause();
            prevVideo.currentTime = 0;
          }
        }
      })
      $('.swiper-container').mouseup( function(){
        for (let i = 0; i < $('.swiper-slide').length; i++){
          if ($($('.swiper-slide')[i]).hasClass('swiper-slide-active')){
            activeVideo = $($('.swiper-slide')[i])[0].children[0];
            activeVideo.play();
          } 
          if ($($('.swiper-slide')[i]).hasClass('swiper-slide-next')){
            nextVideo = $($('.swiper-slide')[i])[0].children[0];
            nextVideo.autoplay = false;
            nextVideo.pause();
            nextVideo.currentTime = 0;
          }
          if ($($('.swiper-slide')[i]).hasClass('swiper-slide-prev')){
            prevVideo = $($('.swiper-slide')[i])[0].children[0];
            prevVideo.autoplay = false;
            prevVideo.pause();
            prevVideo.currentTime = 0;
          }
        }
      })
    })();
  }

})

