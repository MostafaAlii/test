/* ------------------------------------------------
  Project:   Hortech - Responsive HTML5 Template
  Build:     Bootstrap 4.0.0
  Author:    ThemeBucket
------------------------------------------------ */
/* ------------------------
    Table of Contents

  1. Predefined Variables
  2. Preloader
  3. Scroll to top
  4. Scrolling Animation
  5. HT Window load and functions

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
  HT Owl Carousel
--------------------------------------*/
function owlcarousel() {

  $('.owl-carousel').owlCarousel({
      loop:true,
      margin:30,
      autoplay: true,
      dots: true,
      responsive:{
          0: {
            items: 1
        },
        600: {
            items: 3
        },
        1000: {
            items: 4
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
        if($window.width() < 768 ) $elem.css('height', elemHeight/ 1);
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
    numberGreaterThan50: function() {
      var number = $(this).find('.number').text();
      return parseInt( number, 10 ) > 50;
    },
    // show if name ends with -ium
    ium: function() {
      var name = $(this).find('.name').text();
      return name.match( /ium$/ );
    }
  };

  // bind filter button click
  $('.portfolio-filter').on( 'click', 'button', function() {
    var filterValue = $( this ).attr('data-filter');
    // use filterFn if matches value
    filterValue = filterFns[ filterValue ] || filterValue;
    $grid.isotope({ filter: filterValue });
  });


  // change is-checked class on buttons
  $('.portfolio-filter').each( function( i, buttonGroup ) {
    var $buttonGroup = $( buttonGroup );
    $buttonGroup.on( 'click', 'button', function() {
      $buttonGroup.find('.is-checked').removeClass('is-checked');
      $( this ).addClass('is-checked');
    });
  });
};

	
/*------------------------------------
  HT Scroll to top
--------------------------------------*/
function scrolltop() {
  var $goToTop = $('#scroll-top');
      $goToTop.hide();
      $window.on('scroll',function(){
        if ($window.scrollTop()>100) $goToTop.fadeIn();
        else $goToTop.fadeOut();
      });
    $goToTop.on("click", function () {
      $('body,html').animate({scrollTop:0},1000);
      return false;
  });
}

/*------------------------------------
  HT Scrolling Animation
--------------------------------------*/
function scrolling() {
    $('.nav-item a, .page-scroll').bind('click', function(event) {
        var $anchor = $(this);
    var hg = $('header').height();
    var scroll_h = $($anchor.attr('href')).offset().top;
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
$(window).on('scroll',function(){
    if ($(window).scrollTop() >= 600) {
       $('#header-wrap').addClass('fixed-header');
    }
    else {
       $('#header-wrap').removeClass('fixed-header');
    }
 });
$(window).on('scroll',function(){    
  $('.side-navbar #header-wrap').removeClass('fixed-header');
 });
};

/*------------------------------------
  HT Wow Animation
--------------------------------------*/
function wowanimation() {
    var wow = new WOW({
        boxClass: 'wow',
        animateClass: 'animated',
        offset: 0,
        mobile: false,
        live: true
    });
    wow.init();
}


/*------------------------------------
  HT Window load and functions
--------------------------------------*/
$(document).ready(function() {
    owlcarousel(),
    fullScreen(),
    scrolltop(),
    scrolling(),
    fxheader();
});


$(window).on('load', function() {
    isotope(),
    wowanimation();
});


