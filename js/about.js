jQuery(document).ready(function($) {
  var window_width = jQuery(window).width();

  if (window.location.pathname.indexOf("/about-us/") === 0) {
    var aboutLandingHeaderYellowBox = new Rellax(
      ".about-landing-header-yellow-box",
      {
        center: true
      }
    );

    if (window_width > 700) {
      var blackDotImage = new Rellax(".black-dot-image", {
        center: true
      });
    }

    var blackDotImageDesktopTop = new Rellax(".black-dot-image-desktop-top", {
      center: true
    });

    var blackDotImageDesktop = new Rellax(".black-dot-image-desktop", {
      center: true
    });
  }

  if (window_width < 1050) {
    let aboutPageCount = $(".about-page-slick-slider").slick("getSlick")
      .slideCount;
    $(".page-status").text(`1/${aboutPageCount}`);
  }

  //if swiper-slide-active
  // $(document).click(function() {
  //   if ($('.swiper-slide').hasClass('swiper-slide-active')) {
  //     $('.swiper-slide-active > video').attr('autoplay').attr('loop');
  //   }
  // });

  (function autoPlay() {
    let activeVideo;
    // const windowSize = get_window_size();
    // console.log($('.swiper-slide'))
    for (let i = 0; i < $(".swiper-slide").length; i++) {
      if ($($(".swiper-slide")[i]).hasClass("swiper-slide-active")) {
        activeVideo = $(".swiper-slide")[i].children[0].children[0];
        if ($(activeVideo).is("video")) {
          activeVideo.autoplay = true;
        }
      }
    }
  })();

  (function videoNavigation() {
    $(".swiper-button-next").on("click", () => {
      let activeVideo;
      let prevVideo;
      let nextVideo;
      for (let i = 0; i < $(".swiper-slide").length; i++) {
        if ($($(".swiper-slide")[i]).hasClass("swiper-slide-active")) {
          activeVideo = $(".swiper-slide")[i].children[0].children[0];
          if ($(activeVideo).is("video")) {
            activeVideo.play();
          }
        }
        if ($($(".swiper-slide")[i]).hasClass("swiper-slide-prev")) {
          prevVideo = $(".swiper-slide")[i].children[0].children[0];
          if ($(prevVideo).is("video")) {
            prevVideo.autoplay = false;
            prevVideo.pause();
            prevVideo.currentTime = 0;
          }
        }
        if ($($(".swiper-slide")[i]).hasClass("swiper-slide-next")) {
          nextVideo = $(".swiper-slide")[i].children[0].children[0];
          if ($(nextVideo).is("video")) {
            nextVideo.autoplay = false;
            nextVideo.pause();
            nextVideo.currentTime = 0;
          }
        }
      }
    });
    $(".swiper-button-prev").on("click", () => {
      let activeVideo;
      let nextVideo;
      let prevVideo;
      for (let i = 0; i < $(".swiper-slide").length; i++) {
        if ($($(".swiper-slide")[i]).hasClass("swiper-slide-active")) {
          activeVideo = $(".swiper-slide")[i].children[0].children[0];
          if ($(activeVideo).is("video")) {
            activeVideo.play();
          }
        }
        if ($($(".swiper-slide")[i]).hasClass("swiper-slide-next")) {
          nextVideo = $(".swiper-slide")[i].children[0].children[0];
          if ($(nextVideo).is("video")) {
            nextVideo.autoplay = false;
            nextVideo.pause();
            nextVideo.currentTime = 0;
          }
        }
        if ($($(".swiper-slide")[i]).hasClass("swiper-slide-prev")) {
          prevVideo = $(".swiper-slide")[i].children[0].children[0];
          if ($(prevVideo).is("video")) {
            prevVideo.autoplay = false;
            prevVideo.pause();
            prevVideo.currentTime = 0;
          }
        }
      }
    });
  })();
});
