<!DOCTYPE html>
<html lang="en">

<head>
    @include('layout.partials.head')
</head>

<body>

  <!-- ======= Header ======= -->
  @include('layout.partials.header')
  <!-- End Header -->

  <!-- ======= Hero Section ======= -->
  @include('layout.partials.hero')
  <!-- End Hero -->

  <main id="main">

    <!-- ======= Counts Section ======= -->
    <!-- @include('layout.contents.count') -->
    <!-- End Counts Section -->

    <!-- ======= About Video Section ======= -->
    <!-- @include('layout.contents.about-video') -->
    <!-- End About Video Section -->

    <!-- ======= Clients Section ======= -->
    <!-- @include('layout.contents.client') -->
    <!-- End Clients Section -->

    <!-- ======= Testimonials Section ======= -->
    <!-- @include('layout.contents.testimonial') -->
    <!-- End Testimonials Section -->

    <!-- ======= Services Section ======= -->
    <!-- @include('layout.contents.services') -->
    <!-- End Sevices Section -->

    <!-- ======= Cta Section ======= -->
    <!-- @include('layout.contents.call-to-action') -->
    <!-- End Cta Section -->

    <!-- ======= Portfolio Section ======= -->
    <!-- @include('layout.contents.portfolio') -->
    <!-- End Portfolio Section -->

    <!-- ======= Team Section ======= -->
    <!-- @include('layout.contents.team') -->
    <!-- End Team Section -->

    <!-- ======= Catalog Section ======= -->
    @include('layout.contents.catalog')
    <!-- End Catalog Section -->

    <!-- ======= Frequently Asked Questions Section ======= -->
    <!-- @include('layout.contents.faq') -->
    <!-- End Frequently Asked Questions Section -->

    <!-- ======= Contact Section ======= -->
    @include('layout.contents.contact')
    <!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  @include('layout.partials.footer')
  <!-- End Footer -->

  <a href="#" class="back-to-top"><i class="ri-arrow-up-line"></i></a>
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{asset('OnePage')}}/assets/vendor/jquery/jquery.min.js"></script>
  <script src="{{asset('OnePage')}}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{asset('OnePage')}}/assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="{{asset('OnePage')}}/assets/vendor/php-email-form/validate.js"></script>
  <script src="{{asset('OnePage')}}/assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="{{asset('OnePage')}}/assets/vendor/counterup/counterup.min.js"></script>
  <script src="{{asset('OnePage')}}/assets/vendor/venobox/venobox.min.js"></script>
  <script src="{{asset('OnePage')}}/assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="{{asset('OnePage')}}/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="{{asset('OnePage')}}/assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('OnePage')}}/assets/js/main.js"></script>

</body>

</html>