
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

    /*** Sticky header */
    // $(window).scroll(function() {

    //     if ($(window).scrollTop() > 0) {
    //       $(".header").addClass("sticky");
    //     } 
    //     else {
    //       $(".header").removeClass("sticky");
    //     }
    // });

    $('.toggle-menu-bar').on('click', function(){
        $('.left-side-menu').toggleClass('show_left_sidebar');
    });

     // Mobile package Silder
    $(".sliders").slick({
        // dots: true,
        infinite: true,
        draggable: true,
        slidesToShow: 1,
        autoplay: true,
        slidesToScroll: 1,
        arrows: true,
        responsive: [
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 1,
            dots: true,
            arrows: false,
            slidesToScroll: 1
          }
        }
      ]
    });

     // Banner Silder
    $(".banner-sliders").slick({
        dots: true,
        infinite: true,
        draggable: true,
        slidesToShow: 1,
        autoplay: true,
        slidesToScroll: 1,
        arrows: false,
    });


    // vertical-slider
    $('.vertical-slider').slick({
      slidesToShow: 2,
      slidesToScroll: 2,
      centerMode: false,
      focusOnSelect: true,
      vertical: true,
      arrows: true,
      autoplay:false,
    });

    
})(jQuery);