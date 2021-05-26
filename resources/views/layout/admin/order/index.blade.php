@extends('layout.admin.layout.dashboard')

@section('title', 'Order')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title col-6">Data Order</h3>
          <!-- <a href="/admin/order/add"><button type="button" class="btn btn-block btn-primary btn-sm col-1 float-sm-right">Tambah</button></a> -->
        </div>  
        <!-- /.card-header -->
        <div class="card-body">
          @if (session('message'))
            <div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h5><i class="icon fas fa-check"></i> Success!</h5>
              {{ session('message')}}.
            </div>
          @endif
          <table id="order" class="table table-bordered table-striped datatable">
            <thead>
              <tr>
                @foreach($headers as $header)
                  <th>{{$header}}</th>
                @endforeach
              </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                  @foreach($columns as $col)
                    @if ($col === "total_price")
                    <td>@currency($order->$col)</td>
                    @else
                    <td>{{$order->$col}}</td>
                    @endif
                  @endforeach
                  <!-- <td><img src="{{ url('uploads/orders/'.$order->payment_upload)}}" width="100px"></td> -->
                  <td>
                    <a class="btn btn-xs btn-primary" href="/admin/order/{{$order->id}}/detail" title="Detail"><i class="fas fa-edit"></i>Detail</a>
                  </td>
                </tr>
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')
<!-- DataTables  & Plugins -->
<script src="{{asset('AdminLTE')}}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('AdminLTE')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('AdminLTE')}}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{asset('AdminLTE')}}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{asset('AdminLTE')}}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{asset('AdminLTE')}}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{asset('AdminLTE')}}/plugins/jszip/jszip.min.js"></script>
<script src="{{asset('AdminLTE')}}/plugins/pdfmake/pdfmake.min.js"></script>
<script src="{{asset('AdminLTE')}}/plugins/pdfmake/vfs_fonts.js"></script>
<script src="{{asset('AdminLTE')}}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{asset('AdminLTE')}}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{asset('AdminLTE')}}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="{{asset('AdminLTE')}}/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
<script>
  $(function () {
    $("#order").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["excel", "pdf", "print"]
    }).buttons().container().appendTo('#order_wrapper .col-md-6:eq(0)');
  });
</script>
@endsection