jQuery(document).ready(function($){

  if (window.location.pathname.indexOf('/event/') === 0){
    $('.events-page-upcoming-events').hide();
    (function reformat_event_time(){
      let monthDatePosition = 0;
      let eventTimeString = $('.tribe-event-date-start').html();
      for (let i = 0; i < eventTimeString.length; i++){
        if (eventTimeString[i] === '@'){
          monthDatePosition = i;
        }
      }
      let monthPart = eventTimeString.slice(0, monthDatePosition);
      monthPart = `<div class="single-event-month-date">${monthPart}</div>`;
      eventTimeString = `${monthPart}${eventTimeString.slice(monthDatePosition + 1, eventTimeString.length)}`;
      $('.tribe-event-date-start').html(eventTimeString);
    })();

    (function addNavigationOnLastEvent(){
      if ($('.single-event-page-nav-next')[0].children.length === 0){
        $('.single-event-page-nav-next').append('<div class="single-event-next-arrow" style="opacity: 0.2;"></div>')
      }
      if ($('.single-event-page-nav-prev')[0].children.length === 0){
        $('.single-event-page-nav-prev').append('<div class="single-event-prev-arrow" style="opacity: 0.2;"></div>')
      }
    })();
  }
 
})