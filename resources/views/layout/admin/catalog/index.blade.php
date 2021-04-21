@extends('layout.admin.layout.dashboard')

@section('title', 'Katalog')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title col-6">Data Katalog</h3>
          <a href="/admin/catalog/add"><button type="button" class="btn btn-block btn-primary btn-sm col-1 float-sm-right">Tambah</button></a>
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
          <table id="catalog" class="table table-bordered table-striped datatable">
            <thead>
              <tr>
                @foreach($headers as $header)
                  <th>{{$header}}</th>
                @endforeach
              </tr>
            </thead>
            <tbody>
                @foreach($catalogs as $catalog)
                <tr>
                  @foreach($columns as $col)
                    <td>{{$catalog->$col}}</td>            
                  @endforeach
                  <td><img src="{{ url('uploads/catalogs/'.$catalog->image)}}" width="100px"></td>
                  <td>
                    <a class="btn btn-xs btn-primary" href="/admin/catalog/edit/{{$catalog->id}}" title="Edit"><i class="fas fa-edit"></i>Edit</a>
                    <button class="btn btn-xs btn-danger" data-toggle="modal" data-target="#delete{{$catalog->id}}" title="Delete"><i class="fas fa-trash"></i>Delete</button>
                  </td>
                </tr>
                @endforeach
            </tbody>
          </table>
          @foreach($catalogs as $catalog)
          <div class="modal fade" id="delete{{$catalog->id}}">
            <div class="modal-dialog modal-sm">
              <div class="modal-content bg-danger">
                <div class="modal-header">
                  <h4 class="modal-title">Hapus Barang {{$catalog->name}}</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Apakah anda yakin ingin menghapus ?</p>
                </div>
                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-outline-light" data-dismiss="modal">Tidak</button>
                  <a href="/admin/catalog/delete/{{$catalog->id}}" class="btn btn-outline-light">Ya</a>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          @endforeach
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
    $("#catalog").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["excel", "pdf", "print"]
    }).buttons().container().appendTo('#catalog_wrapper .col-md-6:eq(0)');
  });
</script>
@endsection