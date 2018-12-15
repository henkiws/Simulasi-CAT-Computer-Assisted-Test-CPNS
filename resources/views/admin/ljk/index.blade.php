@extends('admin.layout.index')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
      <h6>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Master</a></li>
            <li class="active">Ljk</li>
        </ol>
    </h6>
    </section>
    <!-- Main content -->
    <section class="content">
            <div class="box box-default color-palette-box">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-tag"></i> Ljk</h3>
            </div>
            <div class="box-body">
              <table class="table table-bordered" id="table-data">
                <thead>
                  <th>#</th>
                  <th>User</th>
                  <th>Skor TWk</th>
                  <th>Skor TIU</th>
                  <th>Skor TKP</th>
                  <th>Skor Total</th>
                  <th>Keterangan</th>
                  <th>Aksi</th>
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
            ajax : '{{ url('admin/ljk/datatables') }}',
            columns: [
                { data: 'DT_RowIndex'},
                { data: 'user'},
                { data: 'skor_twk' },
                { data: 'skor_tiu' },
                { data: 'skor_tkp' },
                { data: 'skor_total' },
                { data: 'keterangan' },
                { data: 'action', orderable: false, searchable: false},
            ]
        });
    });
</script>
@endsection