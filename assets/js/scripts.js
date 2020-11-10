
(function($){
    var ua = window.navigator.userAgent;
    var isIE = /MSIE|Trident/.test(ua);

    if ( !isIE ) {
        //IE specific code goes here
        "use strict";
    }

      /*** Sidr Menu */
    $('.navbar-toggle').sidr({
        name: 'sidr-main',
        side: 'right',
        source: '#sidr',
        displace: false,
        renaming: false
    });

    $("document").on("click",function(e) { $.sidr('close','sidr-main'); });

    $('.closeMenu').on('click', function(){
        $.sidr('close', 'sidr-main');
    });

    setTimeout(function() {
      $('body').removeClass('is_loading');
    }, 500);
    setTimeout(function() {
        $('body').removeClass('loading_finish');
    }, 3600);

    $('menu-item').on('click', function(e) {
        let link = $(this).children(a).attr('href');
        e.preventDefault();
        $('body').addClass('loading_finish');
        setTimeout(function() {
            $('body').addClass('is_loading');
        }, 100);
        setTimeout(function() {
            window.location.href = link
        }, 3000);
    });

    $('.toggle-menu-bar').on('click', function(){
        $('.left-side-menu').toggleClass('show_left_sidebar');
    });

    $(window).scroll(function () {
      if ($('.section-title').visible()) {
          console.log('visible');
          $('.section-title').addClass('is-in-view');
      } else {
          $('.section-title').removeClass('is-in-view');
      }
    });

    $(window).scroll(function () {
        if ($('#youtube_title_animation').visible()) {
            $('#youtube_title_animation').addClass('is-in-view');
        } else {
            $('#youtube_title_animation').removeClass('is-in-view');
        }
    });

    $(window).scroll(function () {
        if ($('#newsfeed_title_animation').visible()) {
            $('#newsfeed_title_animation').addClass('is-in-view');
        } else {
            $('#newsfeed_title_animation').removeClass('is-in-view');
        }
    });

    $(window).scroll(function () {
        if ($('#igfeed_title_animation').visible()) {
            $('#igfeed_title_animation').addClass('is-in-view');
        } else {
            $('#igfeed_title_animation').removeClass('is-in-view');
        }
    });

    $(window).scroll(function () {
        if ($('#igfeed_title_animation').visible()) {
            $('#igfeed_title_animation').addClass('is-in-view');
        } else {
            $('#igfeed_title_animation').removeClass('is-in-view');
        }
    });

    $(window).scroll(function () {
        if ($('#artist-page-title').visible()) {
            $('#artist-page-title').addClass('is-in-view');
        } else {
            $('#artist-page-title').removeClass('is-in-view');
        }
    });

    $(window).scroll(function () {
        if ($('#about-page-title').visible()) {
            $('#about-page-title').addClass('is-in-view');
        } else {
            $('#about-page-title').removeClass('is-in-view');
        }
    });

    $(window).scroll(function () {
        if ($('#artist_-page-title').visible()) {
            $('#artist_-page-title').addClass('is-in-view');
        } else {
            $('#artist_-page-title').removeClass('is-in-view');
        }
    });

    $(window).scroll(function () {
        if ($('#listen_page_title').visible()) {
            $('#listen_page_title').addClass('is-in-view');
        } else {
            $('#listen_page_title').removeClass('is-in-view');
        }
    });

    $(window).scroll(function () {
        if ($('#event_page_title').visible()) {
            $('#event_page_title').addClass('is-in-view');
        } else {
            $('#event_page_title').removeClass('is-in-view');
        }
    });

  $(document).on('click', '[data-toggle="lightbox"]', function(event) {
    event.preventDefault();
    $(this).ekkoLightbox();
  });

    $('.vertical-slider').slick({
      slidesToShow: 2,
      slidesToScroll: 2,
      centerMode: false,
      focusOnSelect: true,
      vertical: true,
      arrows: true,
      autoplay:false,

      responsive: [
        {
          breakpoint: 1024,
          settings: {
            vertical: false,
          }
        },
        {
          breakpoint: 600,
          settings: {
            
          }
        },
        {
          breakpoint: 480,
          settings: {
            
          }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
      ]
    });
    
})(jQuery);