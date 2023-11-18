/* ------------------------------------------------
  Project:   Thomso - Multipurpose Responsive HTML5 Template
  Build:     Bootstrap 4.4.1
  Author:    ThemeHt
------------------------------------------------ */
/* ------------------------
    Table of Contents

  1. Predefined Variables
  2. Preloader
  3. Owl carousel
  4. FullScreen
  5. Slit Slider
  6. Counter
  7. Lightgallery
  9. Magnific Popup
  10. Isotope
  11. Scroll to top
  12. Scrolling Animation
  13. Fixed Header
  14. Text Color, Background Color And Image
  15. Accordian
  16. Contact Form
  17. Searchbox
  18. ProgressBar
  19. Masonry
  20. Countdown
  21. Cart
  22. Mailchimp
  23. Slick Slider
  24. Parallax
  25. HT Window load and functions  

------------------------ */

"use strict";

/*------------------------------------
  HT Predefined Variables
--------------------------------------*/
var $window = $(window),
  $document = $(document),
  $body = $('body'),
  $fullScreen = $('.fullscreen-banner') || $('.section-fullscreen'),
  $halfScreen = $('.halfscreen-banner');
  
//Check if function exists
$.fn.exists = function () {
  return this.length > 0;
};

/*------------------------------------
  HT PreLoader
--------------------------------------*/
function preloader() {
  $('#ht-preloader').fadeOut();
};

/*------------------------------------
  HT Dropdown
--------------------------------------*/  
function dropdown() {
    $('.dropdown-menu a.dropdown-toggle').on('click', function(e) {
  if (!$(this).next().hasClass('show')) {
    $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
  }
  var $subMenu = $(this).next(".dropdown-menu");
  $subMenu.toggleClass('show');

  $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
    $('.dropdown-submenu .show').removeClass("show");
  });

  return false;
});
};

/*------------------------------------
  HT Owl Carousel
--------------------------------------*/
function owlcarousel() {
  $('.owl-0').owlCarousel({
    loop: true,
    margin: 0,
    dots: false,
    nav: true,
    autoplay: true,
    responsiveClass: true,
    responsive: {
      0: {
        items: 1,
      },
      600: {
        items: 1,
      },
      1000: {
        items: 1,
      }
    }
  })
  $('.owl-1').owlCarousel({
    loop: true,
    margin: 0,
    nav: false,
    dots: true,
    responsiveClass: true,
    responsive: {
      0: {
        items: 1,
      },
      600: {
        items: 1,
      },
      1000: {
        items: 1,
      }
    }
  })
  $('.owl-2').owlCarousel({
    loop: true,
    margin: 30,
    nav: false,
    dots: true,
    responsiveClass: true,
    responsive: {
      0: {
        items: 1,
      },
      600: {
        items: 1,
      },
      1000: {
        items: 2,
      }
    }
  })
  $('.owl-3').owlCarousel({
    loop: true,
    margin: 30,
    nav: false,
    dots: true,
    responsiveClass: true,
    responsive: {
      0: {
        items: 1,
      },
      600: {
        items: 2,
      },
      1000: {
        items: 3,
      }
    }
  })
  $('.owl-4').owlCarousel({
    loop: true,
    margin: 30,
    nav: true,
    dots: false,
    responsiveClass: true,
    responsive: {
      0: {
        items: 1,
      },
      600: {
        items: 3,
      },
      1000: {
        items: 4,
      }
    }
  })
  $('.owl-5').owlCarousel({
    loop: true,
    margin: 30,
    nav: false,
    dots: false,
    responsiveClass: true,
    responsive: {
      0: {
        items: 1,
      },
      580: {
        items: 2,
      },
      768: {
        items: 3,
      },
      1000: {
        items: 4,
      }
    }
  })
  $('.owl-6').owlCarousel({
    loop: true,
    margin: 30,
    nav: true,
    dots: false,
    responsiveClass: true,
    responsive: {
      0: {
        items: 1,
      },
      600: {
        items: 2,
      },
      1000: {
        items: 3,
      }
    }
  })
  $('.owl-7').owlCarousel({
    loop: true,
    margin: 0,
    dots: false,
    nav: false,
    responsiveClass: true,
    responsive: {
      0: {
        items: 1,
      },
      600: {
        items: 1,
      },
      1000: {
        items: 1,
      }
    }
  })
  $('.owl-8').owlCarousel({
    items: 3,
    loop: true,
    center: true,
    margin: 30,
    autoplay: true,
    dots: false,
    nav: false,
    URLhashListener: true,
    autoplayHoverPause: true,
    startPosition: 'URLHash',
    responsiveClass: true,
    responsive: {
      0: {
        items: 1,
      },
      600: {
        items: 2,
      },
      1000: {
        items: 2,
      },
      1350: {
        items: 3,
      }
    }
  });
  $('.owl-9').owlCarousel({
    loop: true,
    margin: 30,
    nav: false,
    dots: false,
    responsiveClass: true,
    responsive: {
      0: {
        items: 1,
      },
      600: {
        items: 2,
      },
      1000: {
        items: 3,
      }
    }
  })
  $('.owl-10').owlCarousel({
    center: true,
    loop: true,
    margin: 30,
    dots: false,
    nav: false,
    autoslide: true,
    responsive: {
      0: {
        items: 3,
      },
      600: {
        items: 3,
      },
      1000: {
        items: 5,
      }
    }
  })
  $('.owl-11').owlCarousel({
    center: true,
    loop: true,
    margin: 0,
    dots: false,
    nav: false,
    autoslide: true,
    responsive: {
      0: {
        items: 1,
      },
      580: {
        items: 2,
      },
      768: {
        items: 3,
      },
      1000: {
        items: 5,
      }
    }
  })
  $('.app-screenslider').owlCarousel({
    center: true,
    loop: true,
    autoplay: true,
    dots: false,
    responsive: {
      0: {
        items: 1
      },
      600: {
        items: 3
      },
      1000: {
        items: 5
      }
    }
  });
  $('.portfolio-slider').owlCarousel({
    loop: true,
    autoplay: true,
    dots: false,
    responsive: {
      0: {
        items: 1
      },
      600: {
        items: 1
      },
      1000: {
        items: 1
      }
    }
  });
  $('.loop').owlCarousel({
    center: true,
    loop: true,
    margin: 30,
    dots: false,
    nav: false,
    responsive: {
      0: {
        items: 1,
      },
      500: {
        items: 2,
      },
      600: {
        items: 2,
      },
      1000: {
        items: 2,
      }
    }
  });
};

/*------------------------------------
  HT FullScreen
--------------------------------------*/
function fullScreen() {
  if ($fullScreen.exists()) {
    $fullScreen.each(function () {
      var $elem = $(this),
        elemHeight = $window.height();
      if ($window.width() < 768) $elem.css('height', elemHeight / 1);
      else $elem.css('height', elemHeight);
    });
  }
  if ($halfScreen.exists()) {
    $halfScreen.each(function () {
      var $elem = $(this),
        elemHeight = $window.height();
      $elem.css('height', elemHeight / 2);
    });
  }
};

/*------------------------------------
  HT Slit Slider
--------------------------------------*/
function slitslider() {
  var Page = (function () {
    var $navArrows = $('#nav-arrows'),
      $nav = $('#nav-dots > span'),
      slitslider = $('#slider').slitslider({
        onBeforeChange: function (slide, pos) {
          $nav.removeClass('nav-dot-current');
          $nav.eq(pos).addClass('nav-dot-current');
        }
      }),
      init = function () {
        initEvents();
      },
      initEvents = function () {
        // add navigation events
        $navArrows.children(':last').on('click', function () {
          slitslider.next();
          return false;
        });
        $navArrows.children(':first').on('click', function () {
          slitslider.previous();
          return false;
        });
        $nav.each(function (i) {
          $(this).on('click', function (event) {
            var $dot = $(this);
            if (!slitslider.isActive()) {
              $nav.removeClass('nav-dot-current');
              $dot.addClass('nav-dot-current');
            }
            slitslider.jump(i + 1);
            return false;
          });
        });
      };
    return {
      init: init
    };
  })();
  Page.init();
};

/*------------------------------------
  HT Counter
--------------------------------------*/
function counter() {  
  $('.count-number').countTo({
    refreshInterval: 2
  });   
};

/*------------------------------------
  HT Lightgallery
--------------------------------------*/
function lightgallery() {
  $('#lightgallery').lightGallery();
  $('audio').audioPlayer();
};

/*------------------------------------
  HT Magnific Popup
--------------------------------------*/
function magnificpopup() {
  $('.popup-gallery').magnificPopup({
    delegate: 'a.popup-img',
    type: 'image',
    tLoading: 'Loading image #%curr%...',
    mainClass: 'mfp-img-mobile',
    gallery: {
      enabled: true,
      navigateByImgClick: true,
      preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
    },
    image: {
      tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
      titleSrc: function (item) {
        return item.el.attr('title') + '<small>by Marsel Van Oosten</small>';
      }
    }
  });
  if ($(".popup-youtube, .popup-vimeo, .popup-gmaps").exists()) {
    $('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
      type: 'iframe',
      mainClass: 'mfp-fade',
      removalDelay: 160,
      preloader: false,
      fixedContentPos: false
    });
  }
  $(".portfolio-slider").each(function () {
    var _items = $(this).find(".item > a");
    var items = [];
    for (var i = 0; i < _items.length; i++) {
      items.push({
        src: $(_items[i]).attr("href"),
        title: $(_items[i]).attr("title")
      });
    }
    $(this).parent().find(".portfolio-title").magnificPopup({
      items: items,
      type: "image",
      gallery: {
        enabled: true
      }
    });
  });
};

/*------------------------------------
  HT Isotope
--------------------------------------*/
function isotope() {
  // init Isotope
  var $grid = $('.grid').isotope({
    itemSelector: '.grid-item',
    layoutMode: 'fitRows',
  });
  // filter functions
  var filterFns = {
    // show if number is greater than 50
    numberGreaterThan50: function () {
      var number = $(this).find('.number').text();
      return parseInt(number, 10) > 50;
    },
    // show if name ends with -ium
    ium: function () {
      var name = $(this).find('.name').text();
      return name.match(/ium$/);
    }
  };
  // bind filter button click
  $('.portfolio-filter').on('click', 'button', function () {
    var filterValue = $(this).attr('data-filter');
    // use filterFn if matches value
    filterValue = filterFns[filterValue] || filterValue;
    $grid.isotope({
      filter: filterValue
    });
  });
  // change is-checked class on buttons
  $('.portfolio-filter').each(function (i, buttonGroup) {
    var $buttonGroup = $(buttonGroup);
    $buttonGroup.on('click', 'button', function () {
      $buttonGroup.find('.is-checked').removeClass('is-checked');
      $(this).addClass('is-checked');
    });
  });
};

/*------------------------------------
  HT Scroll to top
--------------------------------------*/
function scrolltop() {
  var pxShow = 300,
    goTopButton = $(".scroll-top")
    // Show or hide the button
  if ($(window).scrollTop() >= pxShow) goTopButton.addClass('scroll-visible');
  $(window).on('scroll', function () {
    if ($(window).scrollTop() >= pxShow) {
      if (!goTopButton.hasClass('scroll-visible')) goTopButton.addClass('scroll-visible')
    } else {
      goTopButton.removeClass('scroll-visible')
    }
  });
  $('.smoothscroll').on('click', function (e) {
    $('body,html').animate({
      scrollTop: 0
    }, 1000);
    return false;
  });
};

 /*------------------------------------
  HT Banner Section
--------------------------------------*/
function headerheight() {
  $('.fullscreen-banner .align-center, .nav-arrows span').each(function(){
    var headerHeight=$('.header').height();
    // headerHeight+=15; // maybe add an offset too?
    $(this).css('padding-top',headerHeight+'px');
  });
};

/*------------------------------------
  HT Scrolling Animation
--------------------------------------*/
function scrolling() {
  $('.nav-item a, .page-scroll').bind('click', function (event) {
    var $anchor = $(this);
    var hg = $('header').height();
    var scroll_h = $($anchor.attr('href')).offset().top - (hg + 50);
    $('html, body').stop().animate({
      scrollTop: scroll_h
    }, 1200);
    event.preventDefault();
  });
};

/*------------------------------------
  HT Fixed Header
--------------------------------------*/
function fxheader() {
  $(window).on('scroll', function () {
    if ($(window).scrollTop() >= 100) {
      $('#header-wrap').addClass('fixed-header');
    } else {
      $('#header-wrap').removeClass('fixed-header');
    }
  });
  $(window).on('scroll', function () {
    if ($window.width() > 992) $('.side-navbar #header-wrap').removeClass('fixed-header');
  });
};

/*------------------------------------------
  HT Text Color, Background Color And Image
---------------------------------------------*/
function databgcolor() {
  $('[data-bg-color]').each(function (index, el) {
    $(el).css('background-color', $(el).data('bg-color'));
  });
  $('[data-text-color]').each(function (index, el) {
    $(el).css('color', $(el).data('text-color'));
  });
  $('[data-bg-img]').each(function () {
    $(this).css('background-image', 'url(' + $(this).data("bg-img") + ')');
  });
};

/*------------------------------------
  HT Accordian
--------------------------------------*/
function accordian() {
  $(".card").on("show.bs.collapse hide.bs.collapse", function (e) {
    if (e.type == 'show') {
      $(this).addClass('active');
    } else {
      $(this).removeClass('active');
    }
  });
  $('#accordion .card-header a').prepend('<span></span>');
};

/*------------------------------------
  HT Contact Form
--------------------------------------*/
function contactform() {
  $('#contact-form').validator();
  // when the form is submitted
  $('#contact-form').on('submit', function (e) {
    // if the validator does not prevent form submit
    if (!e.isDefaultPrevented()) {
      var url = "php/contact.php";
      // POST values in the background the the script URL
      $.ajax({
        type: "POST",
        url: url,
        data: $(this).serialize(),
        success: function (data) {
          // data = JSON object that contact.php returns
          // we recieve the type of the message: success x danger and apply it to the 
          var messageAlert = 'alert-' + data.type;
          var messageText = data.message;
          // let's compose Bootstrap alert box HTML
          var alertBox = '<div class="alert ' + messageAlert + ' alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' + messageText + '</div>';
          // If we have messageAlert and messageText
          if (messageAlert && messageText) {
            // inject the alert to .messages div in our form
            $('#contact-form').find('.messages').html(alertBox).show().delay(2000).fadeOut('slow');
            // empty the form
            $('#contact-form')[0].reset();
          }
        }
      });
      return false;
    }
  })
};

/*------------------------------------
  HT Searchbox
--------------------------------------*/
function search() {
  // Remove Search if user Resets Form or hits Escape!
  $('body, .search-box form[role="search"] button[type="reset"]').on('click keyup', function (event) {
    console.log(event.currentTarget);
    if (event.which == 27 && $('.search-box form[role="search"]').hasClass('active') || $(event.currentTarget).attr('type') == 'reset') {
      closeSearch();
    }
  });

  function closeSearch() {
    var $form = $('.search-box form[role="search"].active')
    $form.find('input').val('');
    $form.removeClass('active');
  }
  // Show Search if form is not active // event.preventDefault() is important, this prevents the form from submitting
  $(document).on('click', '.search-box form[role="search"]:not(.active) button[type="submit"]', function (event) {
    event.preventDefault();
    var $form = $(this).closest('form'),
      $input = $form.find('input');
    $form.addClass('active');
    $input.focus();
  });
  // ONLY FOR DEMO // Please use $('form').submit(function(event)) to track from submission
  // if your form is ajax remember to call `closeSearch()` to close the search container
  $(document).on('click', '.search-box form[role="search"].active button[type="submit"]', function (event) {
    event.preventDefault();
    var $form = $(this).closest('form'),
      $input = $form.find('input');
    $('#showSearchTerm').text($input.val());
    closeSearch()
  });
};

/*------------------------------------
  HT ProgressBar
--------------------------------------*/
function progressbar() {
  var progressBar = $('.progress');
  if (progressBar.length) {
    progressBar.each(function () {
      var Self = $(this);
      Self.appear(function () {
        var progressValue = Self.data('value');
        Self.find('.progress-bar').animate({
          width: progressValue + '%'
        }, 1000);
      });
    })
  }
};

/*------------------------------------
  HT Masonry
--------------------------------------*/
function masonry() {
  var $masonry = $('.masonry'),
    $itemElement = '.masonry-brick',
    $filters = $('.portfolio-filter');
  if ($masonry.exists()) {
    $masonry.isotope({
      resizable: true,
      itemSelector: $itemElement,
    });
    // bind filter button click
    $filters.on('click', 'button', function () {
      var filterValue = $(this).attr('data-filter');
      $masonry.isotope({
        filter: filterValue
      });
    });
  }
};

/*------------------------------------
  HT Countdown
--------------------------------------*/
function countdown() {
  $('.countdown').each(function () {
    var $this = $(this),
      finalDate = $(this).data('countdown');
    $this.countdown(finalDate, function (event) {
      $(this).html(event.strftime('<li><span>%-D</span><p>Days</p></li>' + '<li><span>%-H</span><p>Hours</p></li>' + '<li><span>%-M</span><p>Minutes</p></li>' + '<li><span>%S</span><p>Seconds</p></li>'));
    });
  });
};

/*------------------------------------
  HT Cart
--------------------------------------*/
function cart() {
  $("#cart").on("click", function () {
    $(".shopping-cart").fadeToggle("fast");
  });
};


/*------------------------------------
  HT Slick Slider
--------------------------------------*/
function slickslider() {
  $(".vertical").slick({
    dots: false,
    vertical: true,
    autoplay: true,
    autoplaySpeed: 4000,
    slidesToShow: 1,
    slidesToScroll: 1
  });
  $('.slick3').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    fade: true,
    dots: true,
    appendDots: $('.slick3-dots-main'),
    dotsClass: 'slick3-dots',
    infinite: true,
    autoplay: true,
    autoplaySpeed: 6000,
    arrows: false,
    customPaging: function (slick, index) {
      var portrait = $(slick.$slides[index]).data('thumb');
      return '<img src=" ' + portrait + ' "/><div class="slick3-dot-overlay"></div>';
    },
  });
  $('.btn-product-down').on('click', function (e) {
    e.preventDefault();
    var numProduct = Number($(this).next().val());
    if (numProduct > 1) $(this).next().val(numProduct - 1);
  });
  $('.btn-product-up').on('click', function (e) {
    e.preventDefault();
    var numProduct = Number($(this).prev().val());
    $(this).prev().val(numProduct + 1);
  });
};

/*------------------------------------
  HT Parallax
--------------------------------------*/
function parallax() {
  $(".parallaxie").parallaxie({
      speed: 0.4,
      offset: 0,
  });
};

/*------------------------------------
  HT Window load and functions
--------------------------------------*/
$(document).ready(function () {
  dropdown(),
  owlcarousel(),
  fullScreen(),
  slitslider(),
  counter(),
  lightgallery(),
  magnificpopup(),
  scrolltop(),
  headerheight(),
  scrolling(),
  fxheader(),
  databgcolor(),
  accordian(),
  contactform(),
  search(),
  progressbar(),
  countdown(),
  cart(),
  slickslider(),
  parallax();
});

$window.resize(function () {
  fullScreen();
});

$(window).on('load', function () {
  preloader(),
  isotope(),
  masonry();
});