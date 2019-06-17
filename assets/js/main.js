(function($) {
  $('.scrollup').click(function() {
    $("html, body").animate({
      scrollTop: 0
    }, 1000);
    return false;
  });

  // local scroll
  jQuery('.navbar').localScroll({
    hash: true,
    offset: {
      top: 0
    },
    duration: 800,
    easing: 'easeInOutExpo'
  });

  // intro
  jQuery('.banner-slider').flexslider({
    animation: "slide",
    directionNav: true,
    controlNav: true,
    pauseOnHover: true,
    slideshowSpeed: 4000,
    direction: "horizontal" //Direction of slides
  });

  $(".navbar-collapse a").on('click', function() {
    $(".navbar-collapse").removeClass('in');
    $(".navbar-collapse").addClass('collapse');
  });

  //testimonial
  jQuery('.testimonials-slider').flexslider({
    animation: "slide",
    directionNav: true,
    controlNav: true,
    pauseOnHover: true,
    slideshowSpeed: 4000,
    direction: "horizontal" //Direction of slides
  });

  if (Modernizr.mq("screen and (max-width:1024px)")) {
    jQuery("body").toggleClass("body");

  } else {
    var s = skrollr.init({
      mobileDeceleration: 1,
      edgeStrategy: 'set',
      forceHeight: true,
      smoothScrolling: true,
      smoothScrollingDuration: 300,
      easing: {
        WTF: Math.random,
        inverted: function(p) {
          return 1 - p;
        }
      }
    });
  }

  //parallax
  var isMobile = false;

  if (Modernizr.mq('only all and (max-width: 1024px)')) {
    isMobile = true;
  }
})(jQuery);
