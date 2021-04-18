<!DOCTYPE html>
<html lang="en">

<head>
    @include('layout.partials.head')
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('AdminLTE')}}/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{asset('AdminLTE')}}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('AdminLTE')}}/dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">

  <!-- ======= Header ======= -->
  @include('layout.partials.header')
  <!-- End Header -->

    <!-- ======= Catalog Section ======= -->
    <div class="login-box">
      <!-- /.login-logo -->
      <div class="card card-outline card-primary">
        <div class="card-header text-center">
          <a href="#" class="h3"><b>Login</b></a>
        </div>
        <div class="card-body">
          <!-- <p class="login-box-msg">Sign in to start your session</p> -->

          <form action="{{ route('login') }}" method="post">
            @csrf
            <div class="input-group mb-3">
              <input type="text" name="username" class="form-control" placeholder="Username">
              @error('username')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
            </div>
            <!-- <div class="input-group mb-3">
              <input type="email" name="email" class="form-control" placeholder="Email">
              @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
            </div> -->
            <div class="input-group mb-3">
              <input type="password" name="password" class="form-control" placeholder="Password">
              @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-8">
                <p class="mb-0">
                  <a href="{{ route('register') }}" class="text-center">Registrasi akun</a>
                </p>
              </div>
              <!-- /.col -->
              <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block">Sign In</button>
              </div>
              <!-- /.col -->
            </div>
          </form>

          <!-- <div class="social-auth-links text-center mt-2 mb-3">
            <a href="#" class="btn btn-block btn-primary">
              <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
            </a>
            <a href="#" class="btn btn-block btn-danger">
              <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
            </a>
          </div> -->
          <!-- /.social-auth-links -->

          <!-- <p class="mb-1">
            <a href="{{ route('password.request') }}">Lupa password</a>
          </p> -->
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- End Catalog Section -->

  <a href="#" class="back-to-top"><i class="ri-arrow-up-line"></i></a>
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="OnePage/assets/vendor/jquery/jquery.min.js"></script>
  <script src="OnePage/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="OnePage/assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="OnePage/assets/vendor/php-email-form/validate.js"></script>
  <script src="OnePage/assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="OnePage/assets/vendor/counterup/counterup.min.js"></script>
  <script src="OnePage/assets/vendor/venobox/venobox.min.js"></script>
  <script src="OnePage/assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="OnePage/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="OnePage/assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="OnePage/assets/js/main.js"></script>

  <!-- jQuery -->
  <script src="{{asset('AdminLTE')}}/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="{{asset('AdminLTE')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="{{asset('AdminLTE')}}/dist/js/adminlte.min.js"></script>

</body>

</html>