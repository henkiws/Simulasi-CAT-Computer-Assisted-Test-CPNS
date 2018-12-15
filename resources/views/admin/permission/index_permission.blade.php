@extends('admin.layout.index')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
      <h6>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Permission</a></li>
            <li class="active">Name</li>
        </ol>
    </h6>
    </section>
    <!-- Main content -->
    <section class="content">
            <div class="box box-default color-palette-box">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-tag"></i> Permission Name</h3>
            </div>
            <div class="box-body">
                <div align="right" style="margin-bottom:10px">
                    <button name="view_pil" id="1" class="btn btn-info" data-toggle="modal" data-target="#myModal"><i class="fa fa-eye"></i></button>
                </div>
              <table class="table table-bordered" id="table-data">
                <thead>
                  <th>#</th>
                  <th>Name</th>
                  <th>Guard Name</th>
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

      <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
  
      <!-- Modal content-->
      <form action="" class="form-horizontal" method="POST">
      {{ csrf_field() }}
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Permission</h4>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label class="col-sm-4 control-label">Permission Name</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" placeholder="Role Name" name="permission_name">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">Guard Name</label>
                <div class="col-sm-8">
                    <input type="text" readonly class="form-control" value="web" name="guard">
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Save</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </form>
  
    </div>
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
          ajax : '{{ url("admin/permission/datatables") }}',
          columns: [
              { data: 'DT_RowIndex'},
              { data: 'name'},
              { data: 'guard_name' },
          ]
        })
    })
</script>
@endsection