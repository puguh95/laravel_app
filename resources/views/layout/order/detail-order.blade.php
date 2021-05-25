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
</head>
<body>
<!-- ======= Header ======= -->
@include('layout.partials.header')
<!-- End Header -->
<main id="main">
<section id="list-order" class="services section-bg">
  <div class="container">
    <div class="section-title">
      <h2>Status Pemesanan</h2>
      <span>{{$order->status}}</span>
    </div>
    <div class="row content">
      <div class="col-lg-6">
        <p>
          Nama Lengkap: {{$order->name_user}}
        </p>
        <p>
          Alamat: {{$order->delivery_address}}
        </p>
        <p>
          No.HP: {{$order->phone}}
        </p>
        <!-- <ul>
          <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat</li>
          <li><i class="ri-check-double-line"></i> Duis aute irure dolor in reprehenderit in voluptate velit</li>
          <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat</li>
        </ul> -->
      </div>
      <div class="col-lg-6 pt-4 pt-lg-0">
        <!-- <p>
          Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
          velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
          culpa qui officia deserunt mollit anim id est laborum.
        </p>
        <a href="#" class="btn-learn-more">Learn More</a> -->
      </div>
      <div class="row col-12">
        <table id="order" class="table table-bordered table-striped datatable">
          <thead>
            <tr>
              @foreach($headers as $header)
                <th>{{$header}}</th>
              @endforeach
            </tr>
          </thead>
          <tbody>
              <tr>
                @foreach($columns as $col)
                  <td>{{$order->$col}}</td>            
                @endforeach
                  <td>@currency($order->total_price)</td>
              </tr>
          </tbody>
        </table>
      </div>
      @if ($order->status === 'Menunggu Pembayaran')
      <div class="row col-12">
        <p>Silahkan melakukan pembayaran melalui Bank .... dengan norek.... atas nama ....</p>
      </div>
      <div class="row col-12">
        <p>Setelah melakukan pembayaran, upload bukti pembayaran</p>
      </div>
      <div class="row col-12">
        <form action="/order/{{ $order->id }}/upload" method="post" enctype="multipart/form-data">
          @csrf
          <div class="input-group">
            <div class="custom-file">
              <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
              <label class="custom-file-label" for="exampleInputFile">Upload Pembayaran</label>
            </div>
            <div class="text-danger">
              @error('image')
                {{ $message }}
              @enderror
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Upload</button>
        </form>
      </div>
      @else
        <div class="row col-12">
          Status Order: {{$order->status}}
        </div>
      @endif
    </div>
  </div>

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
$('#birthdate').datetimepicker({
  format: 'YYYY-MM-DD',
  minDate: moment().startOf('day')
});
$(function () {
  bsCustomFileInput.init();
});
</script>
</section>
</main>
</body>
</html>