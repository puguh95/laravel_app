@extends('layout.admin.layout.dashboard')

@section('title', 'Detail Order')
@section('content')
<!-- general form elements -->
<div class="col-sm-6">
<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">Detail Order</h3>
  </div>
  <!-- /.card-header -->
  <!-- form start -->
  <form action="/admin/order/update/{{ $order->id }}/status" method="post" enctype="multipart/form-data">
    @csrf
    <div class="card-body">
      <div class="form-group">
        <label for="exampleInputNo1">No</label>
        <input type="text" name="no" value="{{ $order->no }}" class="form-control" id="exampleInputNo1" readonly>
        <div class="text-danger">
          @error('no')
            {{ $message }}
          @enderror
        </div>
      </div>
      <div class="form-group">
        <label for="exampleInputNameUser1">Nama Peminjam</label>
        <input type="text" name="name_user" value="{{ $order->name_user }}" class="form-control" id="exampleInputNameUser1" readonly>
        <div class="text-danger">
          @error('name_user')
            {{ $message }}
          @enderror
        </div>
      </div>
      <div class="form-group">
        <label for="exampleInputPhone1">No. HP</label>
        <input type="text" name="phone" value="{{ $order->phone }}" class="form-control" id="exampleInputPhone1" readonly>
        <div class="text-danger">
          @error('no')
            {{ $message }}
          @enderror
        </div>
      </div>
      <div class="form-group">
        <label for="exampleCatalogName1">Jenis Barang</label>
        <input type="text" name="name_catalog" value="{{ $order->name_catalog }}" class="form-control" id="exampleCatalogName1" readonly>
        <div class="text-danger">
          @error('name_catalog')
            {{ $message }}
          @enderror
        </div>
      </div>
      <div class="form-group">
        <label for="exampleCatalogCode1">Kode Barang</label>
        <input type="text" name="code" value="{{ $order->code }}" class="form-control" id="exampleCatalogCode1" readonly>
        <div class="text-danger">
          @error('code')
            {{ $message }}
          @enderror
        </div>
      </div>
      <div class="form-group">
        <label for="exampleOrderDate1">Tanggal Pemesanan</label>
        <input type="text" name="order_date" value="{{ $order->order_date }}" class="form-control" id="exampleOrderDate1" readonly>
        <div class="text-danger">
          @error('order_date')
            {{ $message }}
          @enderror
        </div>
      </div>
      <div class="form-group">
        <label for="exampleStartDate1">Tanggal Mulai Pinjam</label>
        <input type="text" name="start_date" value="{{ $order->start_date }}" class="form-control" id="exampleStartDate1" readonly>
        <div class="text-danger">
          @error('start_date')
            {{ $message }}
          @enderror
        </div>
      </div>
      <div class="form-group">
        <label for="exampleEndDate1">Tanggal Akhir Pinjam</label>
        <input type="text" name="end_date" value="{{ $order->end_date }}" class="form-control" id="exampleEndDate1" readonly>
        <div class="text-danger">
          @error('end_date')
            {{ $message }}
          @enderror
        </div>
      </div>
      <div class="form-group">
        <label for="exampleStatus1">Status</label>
        <!-- <input type="text" name="status" value="{{ $order->status }}" class="form-control" id="exampleStatus1" readonly> -->
        <select name="status" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
          @if ($order->status === "Menunggu Pembayaran")<option value="Menunggu Pembayaran" @if ($order->status == "Menunggu Pembayaran") {{ 'selected' }} @endif>Menunggu Pembayaran</option>@endif
          <option value="Pengecekan Bukti Bayar" @if ($order->status == "Pengecekan Bukti Bayar") {{ 'selected' }} @endif>Pengecekan Bukti Bayar</option>
          <option value="Pembayaran Terverifikasi" @if ($order->status == "Pembayaran Terverifikasi") {{ 'selected' }} @endif>Pembayaran Terverifikasi</option>
          <option value="Sedang Berjalan" @if ($order->status == "Sedang Berjalan") {{ 'selected' }} @endif>Sedang Berjalan</option>
          <option value="Dibatalkan" @if ($order->status == "Dibatalkan") {{ 'selected' }} @endif>Dibatalkan</option>
          <option value="Sukses" @if ($order->status == "Sukses") {{ 'selected' }} @endif>Sukses</option>
        </select>
        <div class="text-danger">
          @error('status')
            {{ $message }}
          @enderror
        </div>
      </div>
      @isset($order->payment_upload)
      <div class="form-group">
        <label for="exampleInputFile">Bukti Bayar</label>
        <div class="input-group">
          <a href="{{ url('uploads/orders/'.$order->payment_upload)}}"><img src="{{ url('uploads/orders/'.$order->payment_upload)}}" width="300px" height="200px"></a>
        </div>
      </div>
      @endisset
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
    @if ($order->status !== "Menunggu Pembayaran")<button type="submit" class="btn btn-primary">Update</button>@endif
      <a href="/admin/order" class="btn btn-default float-right">Cancel</a>
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