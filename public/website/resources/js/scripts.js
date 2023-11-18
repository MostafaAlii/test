  $(document).on('click', '[data-toggle="modal"]', function () {
    var image = $(this).data('src');
    $('#modalImage').attr('src', image);
  });

  // Reset the modal image source when the modal is closed
  $('#imageModal').on('hidden.bs.modal', function () {
    $('#modalImage').attr('src', '');
  });

  $(document).ready(function () {
    $("#image-slider").twentytwenty();
});

  $(document).ready(function() {
    // Initialize the Bootstrap Carousel
    $('#testimonialCarousel').carousel();
  });

    // Function to change toggler icon color
    function changeTogglerIconColor() {
        const navbarToggler = document.getElementById("navbarToggler");
        if (window.scrollY > 0) {
            // Change icon color to black
            navbarToggler.classList.add("black-toggler-icon");
        } else {
            // Revert to default color
            navbarToggler.classList.remove("black-toggler-icon");
        }
    }


    // Attach the scroll event listener
    window.addEventListener("scroll", changeTogglerIconColor);

    // Initialize the color based on the initial scroll position
    changeTogglerIconColor();

    //////////////////////////////////////////////////////////////////////
    function initComparisons() {
      var x, i;
      /* Find all elements with an "overlay" class: */
      x = document.getElementsByClassName("img-comp-overlay");
      for (i = 0; i < x.length; i++) {
        /* Once for each "overlay" element:
        pass the "overlay" element as a parameter when executing the compareImages function: */
        compareImages(x[i]);
      }
      function compareImages(img) {
        var slider, img, clicked = 0, w, h;
        /* Get the width and height of the img element */
        w = img.offsetWidth;
        h = img.offsetHeight;
        /* Set the width of the img element to 50%: */
        img.style.width = (w / 2) + "px";
        /* Create slider: */
        slider = document.createElement("DIV");
        slider.setAttribute("class", "img-comp-slider");
        /* Insert slider */
        img.parentElement.insertBefore(slider, img);
        /* Position the slider in the middle: */
        slider.style.top = "50%"; /* Center vertically */
        slider.style.left = "50%"; /* Center horizontally */
        slider.style.transform = "translate(-50%, -50%)"; /* Center the slider */
        /* Execute a function when the mouse button is pressed: */
        slider.addEventListener("mousedown", slideReady);
        /* And another function when the mouse button is released: */
        window.addEventListener("mouseup", slideFinish);
        /* Or touched (for touch screens: */
        slider.addEventListener("touchstart", slideReady);
         /* And released (for touch screens: */
        window.addEventListener("touchend", slideFinish);
        function slideReady(e) {
          /* Prevent any other actions that may occur when moving over the image: */
          e.preventDefault();
          /* The slider is now clicked and ready to move: */
          clicked = 1;
          /* Execute a function when the slider is moved: */
          window.addEventListener("mousemove", slideMove);
          window.addEventListener("touchmove", slideMove);
        }
        function slideFinish() {
          /* The slider is no longer clicked: */
          clicked = 0;
        }
        function slideMove(e) {
          var pos;
          /* If the slider is no longer clicked, exit this function: */
          if (clicked == 0) return false;
          /* Get the cursor's x position: */
          pos = getCursorPos(e)
          /* Prevent the slider from being positioned outside the image: */
          if (pos < 0) pos = 0;
          if (pos > w) pos = w;
          /* Execute a function that will resize the overlay image according to the cursor: */
          slide(pos);
        }
        function getCursorPos(e) {
          var a, x = 0;
          e = (e.changedTouches) ? e.changedTouches[0] : e;
          /* Get the x positions of the image: */
          a = img.getBoundingClientRect();
          /* Calculate the cursor's x coordinate, relative to the image: */
          x = e.pageX - a.left;
          /* Consider any page scrolling: */
          x = x - window.pageXOffset;
          return x;
        }
        function slide(x) {
          /* Resize the image: */
          img.style.width = x + "px";
          /* Position the slider: */
          slider.style.left = img.offsetWidth - (slider.offsetWidth / 2) + "px";
        }
      }
    }
    

    // I hope this over-commenting helps. Let's do this!
// Let's use the 'active' variable to let us know when we're using it
let active = false;

// First we'll have to set up our event listeners
// We want to watch for clicks on our scroller
document.querySelector('.scroller').addEventListener('mousedown',function(){
  active = true;
  // Add our scrolling class so the scroller has full opacity while active
  document.querySelector('.scroller').classList.add('scrolling');
});
// We also want to watch the body for changes to the state,
// like moving around and releasing the click
// so let's set up our event listeners
document.body.addEventListener('mouseup',function(){
  active = false;
  document.querySelector('.scroller').classList.remove('scrolling');
});
document.body.addEventListener('mouseleave',function(){
  active = false;
  document.querySelector('.scroller').classList.remove('scrolling');
});

// Let's figure out where their mouse is at
document.body.addEventListener('mousemove',function(e){
  if (!active) return;
  // Their mouse is here...
  let x = e.pageX;
  // but we want it relative to our wrapper
  x -= document.querySelector('.wrapper').getBoundingClientRect().left;
  // Okay let's change our state
  scrollIt(x);
});

// Let's use this function
function scrollIt(x){
    let transform = Math.max(0,(Math.min(x,document.querySelector('.wrapper').offsetWidth)));
    document.querySelector('.after').style.width = transform+"px";
    document.querySelector('.scroller').style.left = transform-25+"px";
}

// Let's set our opening state based off the width, 
// we want to show a bit of both images so the user can see what's going on
scrollIt(150);

// And finally let's repeat the process for touch events
// first our middle scroller...
$(document).ready(function () {
  let currentIndex = 0;
  const slides = $('.slide');
  const circles = $('.circle');

  const updateSlider = () => {
      slides.css('transform', `translateX(-${currentIndex * 100}%)`);
      circles.removeClass('active');
      circles.eq(currentIndex).addClass('active');
  };

  circles.click(function () {
      currentIndex = $(this).index();
      updateSlider();
  });

  const autoSlide = () => {
      currentIndex = (currentIndex + 1) % slides.length;
      updateSlider();
  };

  setInterval(autoSlide, 8000);
});
