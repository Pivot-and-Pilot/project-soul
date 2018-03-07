jQuery(document).ready(function($){

  if (window.location.pathname.indexOf('/events/') === 0){
    // (function reformat_event_time(){
    //   let monthDatePosition = 0;
    //   let eventTimeString = $('.tribe-event-date-start').html();
    //   for (let i = 0; i < eventTimeString.length; i++){
    //     if (eventTimeString[i] === '@'){
    //       monthDatePosition = i;
    //     }
    //   }
    //   let monthPart = eventTimeString.slice(0, monthDatePosition);
    //   monthPart = `<div class="events-month-date">${monthPart}</div>`;
    //   eventTimeString = `${monthPart}${eventTimeString.slice(monthDatePosition + 1, eventTimeString.length)}`;
    //   $('.tribe-event-date-start').html(eventTimeString);
    // })()
    const windowSize = get_window_size();
    if (windowSize < 640){
      date_and_month_shortcut();
      calendar_event_title_shortcut();
    }
    if (windowSize > 640 && windowSize < 1050 ){
      date_shortcut_for_medium_screen();
      calendar_event_title_shortcut();
    }
  
    function get_window_size (){
      return jQuery(window).width();
    }
  
    function date_and_month_shortcut() {
      // date shortcut
      for (let i = 0; i < 7; i++){
        $('.tribe-events-calendar > thead > tr th')[i].innerText = $('.tribe-events-calendar > thead > tr th')[i].innerText.slice(0, 1);
      }
      // month shortcut 
      $('.tribe-events-nav-previous > a').text($('.tribe-events-nav-previous > a').text().slice(2, 5));
      $('.tribe-events-nav-next > a').text($('.tribe-events-nav-next > a').text().slice(0, 3));
      $('.tribe-events-page-title').text($('.tribe-events-page-title').text().slice(0, 3))
    }
  
    function calendar_event_title_shortcut(){
      $('.tribe-events-month-event-title').text('+')
    }
  
    function date_shortcut_for_medium_screen(){
      for (let i = 0; i < 7; i++){
        $('.tribe-events-calendar > thead > tr th')[i].innerText = $('.tribe-events-calendar > thead > tr th')[i].innerText.slice(0, 3);
      }

    }
  
    (function scroll_down_on_navigation(){
      let scrollDistance = window.innerHeight - $('.sticky-desktop-header').height();
      if(window.location.pathname.length > 8 && window.location.pathname.indexOf('/events/') !== -1){
        window.scroll({
          top: scrollDistance, 
          left: 0, 
          behavior: 'smooth' 
        });      
      };
    })();

    //Parallax effect
    (function calendarPageParallax(){
      if (windowSize > 1050){
        var rellax = new Rellax('.rellax', {
          center: true,
        }) 

        for (let i = 0; i < $('.workshop-cont-image').length; i++){
          if (i % 2 === 0) {
            $($('.workshop-cont-image')[i]).data('data-rellax-speed', 3);
          }
        }
        var workshopContImage = new Rellax('.workshop-cont-image', {
          center: true,
        })
      }
    })();


  }

})