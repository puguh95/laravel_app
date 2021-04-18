@extends('layout.admin.layout.dashboard')

@section('title', 'User')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title col-6">Data User</h3>
          <!-- <a href="/admin/user/add"><button type="button" class="btn btn-block btn-primary btn-sm col-1 float-sm-right">Tambah</button></a> -->
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
          <table id="user" class="table table-bordered table-striped datatable">
            <thead>
              <tr>
                @foreach($headers as $header)
                  <th>{{$header}}</th>
                @endforeach
              </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                  @foreach($columns as $col)
                    <td>{{$user->$col}}</td>            
                  @endforeach
                  <td>
                    <a class="btn btn-xs btn-primary" href="/admin/user/edit/{{$user->id}}" title="Edit"><i class="fas fa-edit"></i>Edit</a>
                    <button class="btn btn-xs btn-danger" data-toggle="modal" data-target="#delete{{$user->id}}" title="Delete"><i class="fas fa-trash"></i>Delete</button>
                    <!-- <a class="btn btn-xs btn-danger" href="javascript:void(0)" title="Delete" onclick="delete_data('{{$user->id}}')"><i class="fas fa-trash"></i>Delete</a> -->
                  </td>
                </tr>
                @endforeach
            </tbody>
          </table>
          @foreach($users as $user)
          <div class="modal fade" id="delete{{$user->id}}">
            <div class="modal-dialog modal-sm">
              <div class="modal-content bg-danger">
                <div class="modal-header">
                  <h4 class="modal-title">Danger Modal {{$user->id}}</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Apakah anda yakin ingin menghapus ?</p>
                </div>
                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-outline-light" data-dismiss="modal">Tidak</button>
                  <a href="/admin/user/delete/{{$user->id}}" type="button" class="btn btn-outline-light">Ya</a>
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
<script>
  $(function () {
    $("#user").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["excel", "pdf", "print"]
    }).buttons().container().appendTo('#user_wrapper .col-md-6:eq(0)');
  });
</script>
@endsection