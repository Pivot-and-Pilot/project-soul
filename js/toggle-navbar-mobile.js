
  function openNav() {
    document.getElementById("myNav").style.width = "100%";
  }
  
  function closeNav() {
    document.getElementById("myNav").style.width = "0%";
  }
  
  let didScroll = false;
  let didDesktopScroll = false;
  
  window.onscroll = scrollStatus;
  function scrollStatus() {
    didScroll = true;
    didDesktopScroll = true;
  }
  
  if (window.location.pathname !== '/book-now/') {
  // sticky mobile header
  setInterval(function() {
    if (didScroll) {
      didScroll = false;
      // if (jQuery(window).scrollTop() > 170) {
        if (window.scrollY > 170) {      
          document.getElementById('sticky-mobile-header').style.top = '0';
        } else {
          document.getElementById('sticky-mobile-header').style.top = '-100px';
        }
      }
    }, 100);
    
  // sticky desktop header
  setInterval(function() {
    if (didDesktopScroll) {
      didDesktopScroll = false;
      // if (jQuery(window).scrollTop() > 170) {
      if (window.scrollY > 238) {      
        document.getElementById('sticky-desktop-header').style.top = '0';
      } else {
        document.getElementById('sticky-desktop-header').style.top = '-100px';
      }
    }
  }, 100);
  }

  // book now yellow box
  jQuery(document).ready(function($){
    $('.stripes').click(function() {
      $('.nav-yellow-box').animate({
        left: '42px'
      }, 500);
    });
    $('.menu-x').click(function() {
      $('.nav-yellow-box').animate({
        left: '435px'
      }, 200);
    });
  });
