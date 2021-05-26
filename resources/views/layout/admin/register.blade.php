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
  <!-- daterange picker -->
  <link rel="stylesheet" href="{{asset('AdminLTE')}}/plugins/daterangepicker/daterangepicker.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="{{asset('AdminLTE')}}/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{asset('AdminLTE')}}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{asset('AdminLTE')}}/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="{{asset('AdminLTE')}}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="{{asset('AdminLTE')}}/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="{{asset('AdminLTE')}}/plugins/bs-stepper/css/bs-stepper.min.css">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="{{asset('AdminLTE')}}/plugins/dropzone/min/dropzone.min.css">
</head>
<body class="hold-transition">
<!-- ======= Header ======= -->
@include('layout.partials.header')
<!-- End Header -->
<main id="main">
<section id="register" class="services section">
<div class="container">
  <!-- daterange picker -->
  <link rel="stylesheet" href="{{asset('AdminLTE')}}/plugins/daterangepicker/daterangepicker.css">
  <!-- general form elements -->
  <div class="col-sm-12">
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Register Account</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{ route('register') }}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputName1">Nama</label>
          <input type="text" name="name" class="form-control" id="exampleInputName1" placeholder="Masukkan Nama" required/>
          <div class="text-danger">
            @error('name')
              {{ $message }}
            @enderror
          </div>
        </div>
        <div class="form-group">
          <label for="exampleInputUsername1">Username</label>
          <input type="text" name="username" class="form-control" id="exampleInputUsername1" placeholder="Masukkan Username" required/>
          <div class="text-danger">
            @error('username')
              {{ $message }}
            @enderror
          </div>
        </div>
        <div class="form-group">
          <label for="exampleInputBirthplace1">Tempat Lahir</label>
          <input type="text" name="birthplace" class="form-control" id="exampleInputBirthplace1" placeholder="Masukkan Tempat Lahir" required/>
          <div class="text-danger">
            @error('birthplace')
              {{ $message }}
            @enderror
          </div>
        </div>
        <div class="form-group">
          <label>Tanggal Lahir</label>
            <div class="input-group date" id="birthdate" data-target-input="nearest">
              <input type="text" name="birthdate" class="form-control datetimepicker-input" data-target="#birthdate" data-toggle="datetimepicker" required/>
              <div class="input-group-append" data-target="#birthdate" data-toggle="datetimepicker">
                  <div class="input-group-text"><i class="fa fa-calendar"></i></div>
              </div>
            </div>
            <div class="text-danger">
              @error('birthdate')
                {{ $message }}
              @enderror
            </div>
        </div>
        <div class="form-group">
          <label for="exampleInputPhone1">Phone</label>
          <input type="text" name="phone" class="form-control" id="exampleInputPhone1" placeholder="Masukkan Telepon/HP" required/>
          <div class="text-danger">
            @error('phone')
              {{ $message }}
            @enderror
          </div>
        </div>
        <div class="form-group">
          <label for="exampleInputAddress1">Alamat</label>
          <input type="text" name="address" class="form-control" id="exampleInputAddress1" placeholder="Masukkan Alamat" required/>
          <div class="text-danger">
            @error('address')
              {{ $message }}
            @enderror
          </div>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <div class="input-group">
            <input type="password" name="password" class="form-control" placeholder="Password" minlength="6" required>
            <div class="input-group-append">
              <div class="input-group-text"><i class="fa fa-lock"></i></div>
            </div> 
          </div>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password Confirmation</label>
          <div class="input-group">
            <input type="password" name="password_confirmation" class="form-control" placeholder="Retype password" minlength="6" required>
            <div class="input-group-append">
              <div class="input-group-text"><i class="fas fa-lock"></i></div>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="exampleInputFile">Foto KTP</label>
          <div class="input-group">
            <div class="custom-file">
              <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
              <label class="custom-file-label" for="exampleInputFile">Choose file</label>
            </div>
            <div class="text-danger">
              @error('image')
                {{ $message }}
              @enderror
            </div>
          </div>
        </div>
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="/" class="btn btn-default float-right">Cancel</a>
      </div>
    </form>
  </div>
  </div>
  <!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="{{asset('AdminLTE')}}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('AdminLTE')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('AdminLTE')}}/dist/js/adminlte.min.js"></script>
<script src="{{asset('AdminLTE')}}/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- Select2 -->
<script src=".{{asset('AdminLTE')}}/plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="{{asset('AdminLTE')}}/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="{{asset('AdminLTE')}}/plugins/inputmask/jquery.inputmask.min.js"></script>
<script src="{{asset('AdminLTE')}}/plugins/moment/moment.min.js"></script>
<!-- date-range-picker -->
<script src="{{asset('AdminLTE')}}/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="{{asset('AdminLTE')}}/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('AdminLTE')}}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="{{asset('AdminLTE')}}/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- BS-Stepper -->
<script src="{{asset('AdminLTE')}}/plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- dropzonejs -->
<script src="{{asset('AdminLTE')}}/plugins/dropzone/min/dropzone.min.js"></script>
<script>
//Date picker
$('#birthdate').datetimepicker({
  format: 'YYYY-MM-DD'
});
$(function () {
  bsCustomFileInput.init();
});
</script>
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
</section>
</main>
</body>
</html>