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
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{asset('AdminLTE')}}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
</head>
<body class="hold-transition">
<!-- ======= Header ======= -->
@include('layout.partials.header')
<!-- End Header -->
<main id="main">
<section id="form-order" class="services section">
<div class="container">
  <div class="section-title">
    <h2>Pesan Barang</h2>
    <!-- <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p> -->
  </div>
  <!-- daterange picker -->
  <link rel="stylesheet" href="{{asset('AdminLTE')}}/plugins/daterangepicker/daterangepicker.css">
  <!-- general form elements -->
  <div class="col-sm-12">
  <div class="card card-primary">
    <!-- <div class="card-header">
      <h3 class="card-title"></h3>
    </div> -->
    <!-- /.card-header -->
    <!-- form start -->
    <form action="/order/create" method="post" enctype="multipart/form-data">
      @csrf
      <div class="card-body">
        <input type="hidden" name="id_catalog" class="form-control" value="{{$catalog->id}}">
        <img src="{{ url('uploads/catalogs/'.$catalog->image)}}" width="300px">
        <div class="form-group">
          <label for="catalogName1">Nama Barang</label>
          <input type="text" name="name" class="form-control" id="catalogName1" value="{{$catalog->name}}" readonly>
        </div>
        <div class="form-group">
          <label for="catalogCode1">Kode Barang</label>
          <input type="text" name="code" class="form-control" id="catalogCode1" value="{{$catalog->code}}" readonly>
        </div>
        <div class="form-group">
          <label for="catalogDescription1">Keterangan Barang</label>
          <input type="text" name="description" class="form-control" id="catalogDescription1" value="{{$catalog->description}}" readonly>
        </div>
        <div class="form-group">
          <label for="catalogPrice1">Harga Barang</label>
          <input type="text" name="price" class="form-control" id="catalogPrice1" value="{{ $catalog->price }}" readonly>
        </div>
        <div class="form-group">
          <label for="delivery_address">Alamat Pengiriman</label>
          <input type="text" name="delivery_address" class="form-control" id="delivery_address" placeholder="Alamat Pengiriman Barang">
          <div class="text-danger">
            @error('delivery_address')
              {{ $message }}
            @enderror
          </div>
        </div>
        <div class="form-group">
          <!-- <label>Tanggal Penggunaan</label> -->
            <div class="input-group date" id="start_date" data-target-input="nearest">
                <input type="text" name="start_date" class="form-control datetimepicker-input" data-target="#start_date" placeholder="Tanggal Mulai Pinjam" data-toggle="datetimepicker"/>
                <div class="input-group-append" data-target="#start_date" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                </div>
            </div>
            <div class="text-danger">
              @error('start_date')
                {{ $message }}
              @enderror
            </div>
        </div>
        <div class="form-group">
          <!-- <label>Tanggal Selesai</label> -->
            <div class="input-group date" id="end_date" data-target-input="nearest">
              <input type="text" name="end_date" class="form-control datetimepicker-input" data-target="#end_date" placeholder="Tanggal Akhir Pinjam" data-toggle="datetimepicker"/>
              <div class="input-group-append" data-target="#end_date" data-toggle="datetimepicker">
                  <div class="input-group-text"><i class="fa fa-calendar"></i></div>
              </div>
            </div>
            <div class="text-danger">
              @error('end_date')
                {{ $message }}
              @enderror
            </div>
        </div>
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Pesan</button>
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
<script src="{{asset('AdminLTE')}}/plugins/select2/js/select2.full.min.js"></script>
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
$('#start_date').datetimepicker({
  format: 'YYYY-MM-DD',
  minDate: moment()
});
$('#end_date').datetimepicker({
  format: 'YYYY-MM-DD',
  useCurrent: false
});
$("#start_date").on("change.datetimepicker", function (e) {
  $('#end_date').datetimepicker('minDate', e.date);
});
$("#end_date").on("change.datetimepicker", function (e) {
  $('#start_date').datetimepicker('maxDate', e.date);
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