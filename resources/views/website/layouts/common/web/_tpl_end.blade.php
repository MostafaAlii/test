{{--<script src="{{ asset('website/resources/js/scripts.js') }}"></script>--}}

<script>
    /*Execute a function that will execute an image compare function for each element with the img-comp-overlay class:*/
    initComparisons();
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="{{ asset('website/resources/js/scripts.js') }}"></script>
<script src="{{ asset('website/resources/js/jquery.js') }}"></script>
<script src="{{ asset('website/resources/js/bootstrap.js') }}"></script>
<script src="{{ asset('website/resources/lib/slick/slick.min.js') }}"></script>

<script>
    // Add JavaScript to handle the fixed navbar and link color change
    $(document).ready(function () {
      $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
          $(".navbar").addClass("fixed-top-scroll navbar-dark");
          $(".navbar").removeClass("navbar-white-bg");
          $(".navbar .nav-link").addClass("text-dark");
          $(".navbar .navbar-toggler-icon").addClass("text-dark");
        } else {
          $(".navbar").removeClass("fixed-top-scroll navbar-dark");
          $(".navbar").addClass("navbar-white-bg");
          $(".navbar .nav-link").removeClass("text-dark");
          $(".navbar .navbar-toggler-icon").removeClass("text-dark");
        }
      });
    });
</script>
@yield('js')
</body>

</html>