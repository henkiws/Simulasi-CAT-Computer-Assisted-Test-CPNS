@extends('admin.layout.index')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
      <h6>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Permission</a></li>
            <li><a href="{{ url('admin/role') }}"> Role</a></li>
            <li class="active">Assign</li>
        </ol>
    </h6>
    </section>
    <!-- Main content -->
    <section class="content">
            <div class="box box-default color-palette-box">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-tag"></i> Role "{{ $role->name }}"</h3>
            </div>
            <div class="box-body">
                <form action="{{ url('admin/role/assign') }}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" value="{{ $role->name }}" name="role">
                <div align="right" style="margin-bottom:10px">
                    <button class="btn btn-primary" type="submit">Assign to Role</button>
                </div>
              <table class="table table-bordered" id="table-data">
                <thead>
                  <th>#</th>
                  <th>Name</th>
                  <th>Guard Name</th>
                  <th>Remove Permission</th>
                </thead>
                <tbody>
                    @foreach($permission as $key=>$item)
                    <tr>
                        <td>
                            <input type="checkbox" name="permission[]" value="{{ $item->name }}"
                            @foreach($assigned as $val)
                                @if($val->id == $item->id)
                                    checked
                                @endif
                            @endforeach>
                        </td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->guard_name }}</td>
                        <td>
                            <input type="button" name="delete" class="btn btn-danger" value="remove" data="{{ $item->id }}">
                        </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
                </form>
            </div>
            <!-- /.box-body -->
          </div>
    </section>
    <!-- /.content -->
  </div>

@endsection
@section('script')
    <script>
        $('input[name="delete"]').click(function(){
            if(confirm('Are you sure ?')){
                $id = $(this).attr('data');
                var token = $('input[name="_token"]').val();
                $.ajax({
                    url: '{{ url("admin/permission") }}/'+$id,
                    type: 'DELETE',
                    data: { _token: token, role: '{{ $role->name }}' },
                    success: function(res) {
                        if(res.status == true){
                            location.reload();
                        }
                    }
                });
            }
        })
    </script>
@endsection 
