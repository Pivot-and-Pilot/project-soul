jQuery(document).ready(function($) {
  let controller = new ScrollMagic.Controller();


  // OUR SERVICES section fades
  var fades = new TimelineMax()
    .to('#services-img1', 0.25, { autoAlpha: 0.7 })
    .call(function() {
      $('#services-img2').toggleClass('hidden');
      $('.custom-about').toggleClass('hidden');
    })
    .call(function() {
      $('#services-img1').toggleClass('hidden');
      $('.choreographed-about').toggleClass('hidden');
    })
    .to('#services-img2', 0.25, { autoAlpha: 1 })
    .to('#services-img2', 0.25, { autoAlpha: 0.7 })
    .call(function() {
      $('#services-img3').toggleClass('hidden');
      $('.freestyle-about').toggleClass('hidden');
    })
    .call(function() {
      $('#services-img2').toggleClass('hidden');
      $('.custom-about').toggleClass('hidden');
    })
    .to('#services-img3', 0.25, { autoAlpha: 1 })

  // title hide in nav
  function hideTitle(title) {
    $(title).animate({
      'margin-left': '-1000px'
    }, 400)
  }

  // title show in nav
  function showTitle(title) {
    $(title).animate({
      'margin-left': '10px'
    }, 400)
  }
  
  // get window size
  function get_window_size (){
    var window_width = jQuery(window).width();
    return window_width;
  }

  // //get distance from our stype to top
  // function ourStyleTopOffset(){
  //   let startPos = 0;
  //   let tempPos = 'relative'
  //   let endPos = 0;
  //   $(document).scroll(function(){
  //     // console.log($(document).scrollTop());
  //     if (tempPos === 'relative' && $('.services-nav-dots').css('position') === 'fixed'){
  //       startPos = $(document).scrollTop();
  //       tempPos = 'fixed';
  //     }
  //     if (tempPos === 'fixed' && $('.services-nav-dots').css('position') === 'relative'){
  //       endPos = $(document).scrollTop();
  //       tempPos = 'relative';
  //     }

  //     // $($('.services-nav-dots').css('position')).change(function(){
  //     //   console.log('changed');
  //     // })
  //   })
  //   return endPos - startPos;
  // }
  // ourStyleTopOffset();

  // windowSize variables
  const windowWidth = $(window).width();
  const windowHeight = $(window).height();

  // dot navigation (whole page) scenes
  new ScrollMagic.Scene({
    triggerElement: '#services',
    offset: '-50',
    triggerHook: '0'
  })
    .setPin('.services-nav')
    .addTo(controller);

  /******************** DESKTOP *********************/
  // variables for varying desktop screens (11inch, 13inch, extralarge)
  let servicesDuration;
  let servicesOffset;
  let stylesOffset;
  let stylesTop;
  let navTop;

  if (windowWidth > 769) {
    if (windowHeight > 790) {
      /*************** DESKTOP LARGE VIEW ******************/
      servicesOffset = '-260';      
      servicesDuration = 1000;
      approachOffset = '-300';      
      stylesOffset = '-190';
      stylesTop = '3240px';
      navTop = 60;
    } else if (windowHeight > 654 && windowHeight < 790) {
      /*************** DESKTOP MEDIUM VIEW *****************/
      servicesOffset = '-210';            
      servicesDuration = 1500;
      approachOffset = '-300';
      stylesOffset = '-170';
      stylesTop = '3862px';
      navTop = 60;
    } else {
      /**************** DESKTOP SMALL VIEW ******************/
      servicesOffset = '-190';            
      servicesDuration = 1000;
      approachOffset = '-300';      
      stylesOffset = '-150';
      stylesTop = '3200px';
      navTop = 60;     
    }
  } else if (windowWidth > 415 && windowWidth < 769) {
    /********************* IPAD **********************/
    servicesOffset = '-100';
    servicesDuration = 20;
    approachOffset = '-310';
    stylesOffset = '-180';
    stylesTop = '2800px';        
    navTop = 45;        
  } else {
    /******************** MOBILE *********************/
    servicesOffset = '0';
    servicesDuration = 20;
    approachOffset = '-200';
    stylesOffset = '-20';
    stylesTop = '2800px';    
    navTop = 45;                    
  }

  // OUR SERVICES SECTION
  new ScrollMagic.Scene({
    triggerElement: '#our-services',
    offset: servicesOffset,
    triggerHook: '0',
    duration: servicesDuration
  })
    .setPin('#our-services')
    .setTween(fades)
    .addTo(controller);
  // OUR APPROACH SECTION
  new ScrollMagic.Scene({
    triggerElement: '#our-approach',
    offset: approachOffset,
    triggerHook: 'onLeave',
    duration: '1'
  })
    .on('enter', function(e) {
      if (e.scrollDirection === 'REVERSE') {
        $('.services-nav-titles').css({
          'top': '0px'
        })
      } else {
        $('.services-nav-titles').css({          
          'top': `-${navTop}px`
        })
      }
    })
    .addTo(controller);
  // OUR STYLES SECTION
  let styles = new ScrollMagic.Scene({
    triggerElement: '#our-styles',
    triggerHook: '.04',
    offset: stylesOffset,
    duration: '1'
  })
    .on('enter', function(e) {
      if (e.scrollDirection === 'REVERSE') {
        $('.services-nav-titles').css({          
          'top': `-${navTop}px`
        });
        // $('.services-nav').css({
        //   'position': 'fixed',
        //   'top': '50px',
        //   'margin-left': 'auto'
        // });
      } else {
        $('.services-nav-titles').css({          
          'top': `-${navTop + navTop}px`
        });
        // $('.services-nav').css({
        //   'position': 'relative',
        //   'top': stylesTop,
        //   'margin-left': '-10px'
        // });       
      }
    })
    .addTo(controller);
  
});