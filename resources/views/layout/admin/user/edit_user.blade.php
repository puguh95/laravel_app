@extends('layout.admin.layout.dashboard')

@section('title', 'Edit User')
@section('content')
<!-- daterange picker -->
<link rel="stylesheet" href="{{asset('AdminLTE')}}/plugins/daterangepicker/daterangepicker.css">
<!-- general form elements -->
<div class="col-sm-6">
<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">Edit User</h3>
  </div>
  <!-- /.card-header -->
  <!-- form start -->
  <form action="/admin/user/update/{{ $user->id }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="card-body">
      <div class="form-group">
        <label for="exampleInputName1">Nama</label>
        <input type="text" name="name" class="form-control" id="exampleInputName1" placeholder="Masukkan Nama" value="{{$user->name}}">
        <div class="text-danger">
          @error('name')
            {{ $message }}
          @enderror
        </div>
      </div>
      <div class="form-group">
        <label for="exampleInputUsername1">Username</label>
        <input type="text" name="username" class="form-control" id="exampleInputUsername1" placeholder="Masukkan Username" value="{{$user->username}}" readonly>
        <div class="text-danger">
          @error('username')
            {{ $message }}
          @enderror
        </div>
      </div>
      <div class="form-group">
        <label for="exampleInputBirthplace1">Tempat Lahir</label>
        <input type="text" name="birthplace" class="form-control" id="exampleInputBirthplace1" placeholder="Masukkan Tempat Lahir" value="{{$user->birthplace}}">
        <div class="text-danger">
          @error('birthplace')
            {{ $message }}
          @enderror
        </div>
      </div>
      <div class="form-group">
        <label>Tanggal Lahir</label>
          <div class="input-group date" id="birthdate" data-target-input="nearest">
              <input type="text" name="birthdate" class="form-control datetimepicker-input" data-target="#birthdate" value="{{$user-> birthdate}}"/>
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
        <input type="text" name="phone" class="form-control" id="exampleInputPhone1" placeholder="Masukkan Telepon/HP" value="{{$user->phone}}" readonly>
        <div class="text-danger">
          @error('phone')
            {{ $message }}
          @enderror
        </div>
      </div>
      <div class="form-group">
        <label for="exampleInputAddress1">Alamat</label>
        <input type="text" name="address" class="form-control" id="exampleInputAddress1" placeholder="Masukkan Alamat" value="{{$user->address}}">
        <div class="text-danger">
          @error('address')
            {{ $message }}
          @enderror
        </div>
      </div>
      <div class="form-group">
        <label for="exampleInputFile">Foto KTP</label>
        <div class="input-group">
          <img src="{{ url('uploads/users/'.$user->image)}}" width="300px" height="200px">
        </div>
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
      <!-- <div class="form-group">
        <label for="exampleInputEmail1">Email</label>
        <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Email" value="{{$user->email}}" readonly>
        <div class="text-danger">
          @error('email')
            {{ $message }}
          @enderror
        </div>
      </div> -->
      <!-- <div class="form-group">
        <label for="exampleInputFile">File input</label>
        <div class="input-group">
          <div class="custom-file">
            <input type="file" class="custom-file-input" id="exampleInputFile">
            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
          </div>
          <div class="input-group-append">
            <span class="input-group-text">Upload</span>
          </div>
        </div>
      </div>
      <div class="form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
      </div> -->
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
      <a href="/admin/user" class="btn btn-default float-right">Cancel</a>
    </div>
  </form>
</div>
</div>
<!-- /.card -->
@endsection

@section('script')
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
@endsection