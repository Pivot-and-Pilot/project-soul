jQuery(document).ready(function($) {

  // if history is /book now, TRANSITION NONE
  if (document.referrer !== 'http://projectsoul.ca/book-now/') {
    $('.book-now-main').css('transition', '1.5s ease-in-out');

  } 

  $('.book-now-main').css('left', '0px');    
  $('.book-now-close').click(function() {
    $('.book-now-main').css({'left': '-2000px', 'transition': '1.5s ease-in-out'});
  });

  (function datePicker(){
    $('#event-date').removeAttr('type');
    if (jQuery(window).width() > 1050){
      $('#event-date').on('focus', function(event) {
        $(this).attr('type', 'date');
      });
    }
    if (jQuery(window).width() < 1050){
      $('#event-date').on('touchend', function(event) {
        event.preventDefault();
        $(this).attr('type', 'date');
        if ($('#event-date').attr('type') === 'date'){
          $('#event-date').focus();
        }
      });
    }
  })();
  
  // ARE YOU A CHARITY
  $('.is-charity-select > button').click(function() {
    // on select, colour of button changes
    event.preventDefault();
    $('.is-charity-select > button').removeClass('selected');
    $(this).addClass('selected');

    // link yes and no buttons to contact form hidden radio buttons
    const selection = $(this).text();
    const yesButton = $('#radio-is-charity > .wpcf7-list-item.first > input');
    const noButton = $('#radio-is-charity > .wpcf7-list-item.last > input');
    if (selection === 'yes') {
      $(yesButton).attr('checked', true);
      $(noButton).attr('checked', false); 
      $('.budget').removeClass('fade-in').addClass('fade-out').css('opacity', 0);
    } else if (selection === 'no') {
      $(yesButton).attr('checked', false);
      $(noButton).attr('checked', true);
      $('.budget').removeClass('fade-out').addClass('fade-in').css('opacity', 1);      
    }
  });

  // NUMBER OF DANCERS
  // $('.num-dancers-select > button').click(function() {
  //   event.preventDefault();
  //   $('.num-dancers-select > button').removeClass('selected');
  //   $(this).addClass('selected');

  //   // link number of dancers buttons to contact form hidden radio buttons
  //   const selection = $(this).text();
  //   $('#radio-num-dancers > span').each(function() {
  //     const radioBtn = $(this).children('input');
  //     $(radioBtn).attr('checked', false);
  //     if ($(radioBtn).attr('value') === selection) {
  //       $(radioBtn).attr('checked', true);
  //     }
  //   });

  //   // performance length range
  //   $('.performance-length').removeClass('hidden').addClass('fade-in');

  //   // set budget range 
  //   let min;
  //   $('.budget-range > span:first').text('');
  //   switch(selection) {
  //     case '3':
  //       min = 200;
  //       break;
  //     case '5':
  //       min = 400;
  //       break;
  //     case '7':
  //       min = 600;
  //       break;
  //     case '10':
  //       min = 1000; 
  //       break;
  //     default:
  //       return;
  //   }
  //   $('.budget-range > span:first').text(`$${min}`);
  //   $('#budget-slider-track').attr('min', `${min}`).attr('value', `${min}`);
  //   $('#budget-slider-value').text(`$${min}`)

    // if NOT charity, show budget range
    // if ($('#radio-is-charity > .wpcf7-list-item.last > input').attr('checked')) {
    //   $('.budget').removeClass('hidden').removeClass('fade-out').addClass('fade-in');
    // }
  // });

  // NUMBER OF DANCERS
  $('#num-dancers-slider-track').on('input', function() {
    const value = $(this).attr('value');
    $('#num-dancers-slider-value').attr('value', `${value}`);
  });

  // LENGTH OF PERFORMANCE
  $('#performance-slider-track').on('input', function() {
    const value = $(this).attr('value');
    $('#performance-slider-value').attr('value', `${value} mins`);
  });

  // BUDGET
  $('#budget-slider-track').on('input', function() {
    const value = $(this).attr('value').replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
    $('#budget-slider-value').attr('value', `$${value}`);
  });

  // NEXT BUTTON
  $('.book-now-next').click(function() {
    $('.book-now-page1').addClass('hidden');
    $(this).addClass('hidden');
    $('.book-now-page2').removeClass('hidden').addClass('slide');
    $('.book-now-prev').removeClass('hidden');
    $('.book-now-arrows').css('justify-content', 'flex-start');

    $('.budget').removeClass('fade-out').removeClass('fade-in');

    $('.book-now-nav > button:last').css({
      'background-color': 'white',
      'width': '75%'
    }).addClass('open-book-now-nav').fadeTo('slow', 1, function() {
      $('.book-now-nav > button:last').text('2. PERSONAL INFO');
    } );
    $('.book-now-nav > button:first').css({
      'background-color': '#fdee00',
      'width': '25%'
    }).addClass('close-book-now-nav')
    .text('1');

    $('.book-now-arrows').css('margin-top', '0');
  });

  // PREV BUTTON
  $('.book-now-prev').click(function() {
    $('.book-now-page1').removeClass('hidden');
    $('.book-now-next').removeClass('hidden');
    $('.book-now-page2').addClass('hidden');
    $(this).addClass('hidden');
    $('.book-now-arrows').css('justify-content', 'flex-end');

    $('.book-now-nav > button:first').css({
      'background-color': 'white',
      'width': '75%',
    }).fadeTo('slow', 1, function() {
      $('.book-now-nav > button:first').text('1. EVENT DETAILS')        
    });
    $('.book-now-nav > button:last').css({
      'background-color': '#fdee00',
      'width': '25%',
    }).text('2');

    $('.book-now-arrows').css('margin-top', '-5.2em');    
  });

  // 2. PERSONAL INFO
  $('.book-now-nav > button:last').click(function() {
    $('.book-now-next').trigger('click');
  });

  // 1. EVENT DETAILS
  $('.book-now-nav > button:first').click(function() {
    $('.book-now-prev').trigger('click');
  });

  // IF SUBMIT SUCCESSFUL, MAIL MSG
  if ($('.wpcf7-response-output').hasClass('wpcf7-mail-sent-ok')) {
    console.log('MAIL SENT OK!')
    $('.book-now-page1').addClass('hidden');
    $('.book-now-page2').addClass('hidden');
    $('.book-now-nav').addClass('hidden');    
    $('.book-now-arrows').addClass('hidden');    
    $('.book-now-footer').addClass('hidden');    
    
    $('.book-now-page3').removeClass('hidden').addClass('fade-in');
  }

  // ON SUBMIT if invalid/incomplete entry, reload to second page
  if (document.querySelector('.wpcf7-not-valid-tip')) {
    if (document.querySelector('.wpcf7-not-valid-tip').textContent) {

      $('.book-now-page1').addClass('hidden');
      $('.book-now-next').addClass('hidden');
      $('.book-now-page2').removeClass('hidden').addClass('fade-in');
      $('.book-now-prev').removeClass('hidden');
      $('.book-now-arrows').css('justify-content', 'flex-start');

      $('.book-now-nav > button:last').css({
        'background-color': 'white',
        'width': '75%',
      }).text('2. PERSONAL INFO');
      $('.book-now-nav > button:first').css({
        'background-color': '#fdee00',
        'width': '25%',
      }).text('1');

    }

    // ON RELOAD, sync page with hidden form
      // ON RELOAD BUTTON ON PAGE 2 CSS (no margin top)
    $('#radio-is-charity > span').each(function() {
      const hiddenBtn = $(this)[0].children[0];
      if ($(hiddenBtn).attr('checked') === 'checked') {
        $('.is-charity-select > button').each(function() {
          $(this).removeClass('selected');
          let value = $(hiddenBtn).val();
          if ($(this).text() === value) {
            $(this).addClass('selected');
            const selection = $(this).text();
            const yesButton = $('#radio-is-charity > .wpcf7-list-item.first > input');
            const noButton = $('#radio-is-charity > .wpcf7-list-item.last > input');
            if (selection === 'yes') {
              $(yesButton).attr('checked', true);
              $(noButton).attr('checked', false); 
              $('.budget').removeClass('fade-in').addClass('fade-out').css('opacity', 0);
            } else if (selection === 'no') {
              $(yesButton).attr('checked', false);
              $(noButton).attr('checked', true);
              $('.budget').removeClass('fade-out').addClass('fade-in').css('opacity', 1);      
            }
          }
        })
      }
    });
    $('#performance-slider-track').trigger('input');
    $('#budget-slider-track').trigger('input');
    $('#num-dancers-slider-track').trigger('input');
  }  
});

// CHANGE THIS URL LATER
function loadUrl(){
  // window.location.href = "http://www.google.com";
  document.location.href='/';
} 