@extends('layout.admin.layout.dashboard')

@section('title', 'Tambah Katalog')
@section('content')
<!-- general form elements -->
<div class="col-sm-6">
<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">Tambah Katalog</h3>
  </div>
  <!-- /.card-header -->
  <!-- form start -->
  <form action="/admin/catalog/insert" method="post" enctype="multipart/form-data">
    @csrf
    <div class="card-body">
      <div class="form-group">
        <label for="exampleInputName1">Nama</label>
        <input type="text" name="name" class="form-control" id="exampleInputName1" placeholder="Masukkan Nama">
        <div class="text-danger">
          @error('name')
            {{ $message }}
          @enderror
        </div>
      </div>
      <div class="form-group">
        <label for="exampleInputCode1">Kode</label>
        <input type="text" name="code" class="form-control" id="exampleInputCpde1" placeholder="Masukkan Kode">
        <div class="text-danger">
          @error('kode')
            {{ $message }}
          @enderror
        </div>
      </div>
      <div class="form-group">
        <label for="exampleInputDescription1">Deskripsi</label>
        <input type="text" name="description" class="form-control" id="exampleInputDescription1" placeholder="Masukkan Deskripsi">
        <div class="text-danger">
          @error('description')
            {{ $message }}
          @enderror
        </div>
      </div>
      <div class="form-group">
        <label for="exampleInputPrice1">Price</label>
        <input type="text" name="price" class="form-control" id="exampleInputPrice1" placeholder="Masukkan Harga">
        <div class="text-danger">
          @error('price')
            {{ $message }}
          @enderror
        </div>
      </div>
      <div class="form-group">
        <label for="exampleInputFile">File input</label>
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
      <button type="submit" class="btn btn-default float-right">Cancel</button>
    </div>
  </form>
</div>
</div>
<!-- /.card -->
@endsection

@section('script')
<script src="{{asset('AdminLTE')}}/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
@endsection