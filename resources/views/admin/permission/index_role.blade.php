@extends('admin.layout.index')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
      <h6>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Permission</a></li>
            <li class="active">Role</li>
        </ol>
    </h6>
    </section>
    <!-- Main content -->
    <section class="content">
            <div class="box box-default color-palette-box">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-tag"></i> Role</h3>
            </div>
            <div class="box-body">
              <div align="right" style="margin-bottom:10px">
                  <button name="view_pil" id="1" class="btn btn-info" data-toggle="modal" data-target="#myModal"><i class="fa fa-eye"></i></button>
              </div>
              <table class="table table-bordered" id="table-data">
                <thead>
                  <th>#</th>
                  <th>Name</th>
                  <th>Guard</th>
                  <th>Aksi</th>
                </thead>
                <tbody>
                 @foreach($data as $key=>$item)
                  <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->guard_name }}</td>
                    <td>
                      <button name="view" data="{{ $item->id }}" class="btn btn-info">view Permission</button>
                      <a href="{{ url('admin/role/'.$item->id.'') }}" class="btn btn-warning">assign Permission</button>
                    </td>
                  </tr>
                 @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <div class="box box-default color-palette-box">
              <div class="box-body">
             <table id="result" class="table table-bordered">
               <thead>
                 <tr>
                   <th>#</th>
                   <th>Name</th>
                   <th>Guard</th>
                 </tr>
               </thead>
               <tbody></tbody>
             </table>
              </div>
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
        <h4 class="modal-title">Add Role</h4>
      </div>
      <div class="modal-body">
          <div class="form-group">
              <label class="col-sm-4 control-label">Role Name</label>
              <div class="col-sm-8">
                  <input type="text" class="form-control" placeholder="Role Name" name="role_name">
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
        $('button[name="assign"]').click(function(){
          var id = $(this).attr('data');
            $('#result').DataTable({
              processing : true,
              serverSide : true,
              ajax : '{{ url('admin/role') }}/'+id+'/datatables',
              columns: [
                  { data: 'DT_RowIndex'},
                  { data: 'name'},
                  { data: 'guard_name' },
              ]
            })
        })
    })
</script>
@endsection