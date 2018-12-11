@extends('admin.layout.index')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
      <h6>
          <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Master</a></li>
              <li class="active">User</li>
          </ol>
      </h6>
    </section>
    <!-- Main content -->
    <section class="content">
            <div class="box box-default color-palette-box">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-tag"></i> Users</h3>
            </div>
            <div class="box-body">
                <table class="table table-bordered" id="table-data">
                    <thead>
                      <th>#</th>
                      <th>Nama</th>
                      <th>Email</th>
                      <th>Jenis Kelamin</th>
                      <th>Tanggal Lahir</th>
                      <th>Alamat</th>
                      <th>Status</th>
                    </thead>
                    <tbody>
                     
                    </tbody>
                  </table>
            </div>
            <!-- /.box-body -->
          </div>
    </section>
    <!-- /.content -->
  </div>
@endsection
@section('style')
<link href="{{ url('/')}}/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
<link href="{{ url('/')}}/plugins/datatables/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css">
@endsection
@section('script')
<script src="{{ url('/') }}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ url('/') }}/plugins/datatables/dataTables.bootstrap.js"></script>
<script>
    $(function() {
        $('#table-data').DataTable({
            processing : true,
            serverSide : true,
            ajax : '{{ url('admin/user/datatables') }}',
            columns: [
                { data: 'DT_RowIndex'},
                { data: 'name'},
                { data: 'email' },
                { data: 'gender' },
                { data: 'date_birth' },
                { data: 'address' },
                { data: 'status' },
            ]
        });
    });
</script>
@endsection