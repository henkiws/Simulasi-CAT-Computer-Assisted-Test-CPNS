@extends('admin.layout.index')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
    <h6>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Master</a></li>
            <li class="active">Question</li>
        </ol>
    </h6>
    
    </section>
    <!-- Main content -->
    <section class="content">
            <div class="box box-default color-palette-box">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-tag"></i><strong> Questions</strong></h3>
            </div>
            <div class="box-body">
              <div class="row" style="margin-bottom:10px;">
                <div class="col-sm-8">
                    
                </div>
                <div class="col-sm-4" align="right">
                    <a href="{{ url('admin/question/create') }}" class="btn btn-primary"><i class="fa fa-plus-circle" aria-hidden="true"></i></a>      
                </div>
              </div>
              <table class="table table-bordered" id="table-data">
                <thead>
                  <th>#</th>
                  <th>Group</th>
                  <th>Jenis</th>
                  <th>Pertanyaan</th>
                  <th>Pilihan</th>
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
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Answer</h4>
        </div>
        <div class="modal-body">
          <div id="text"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
  
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
            ajax : '{{ url('admin/question/datatables') }}',
            columns: [
                { data: 'DT_RowIndex'},
                { data: 'group'},
                { data: 'jenis' },
                { data: 'pertanyaan' },
                { data: 'pilihan', orderable: false, searchable: false },
                { data: 'action', orderable: false, searchable: false},
            ]
        });
        $(document).on('click','button[name="view_pil"]',function(){
          var $val = $(this).attr('id');
          $.ajax({
            type:"GET",
            url:"{{ url('/') }}/admin/question/ajax/"+$val,
            beforeSend: function(){
              $('#text').html('Loading ...');
            },
            success: function(data) {
              $('#text').html('');
              var obj = jQuery.parseJSON(data);
              console.log(obj);
              var list = $("#text").append('<ol type="A"></ol>').find('ol');
              $.each(obj, function(i, item){
                if(item.answer == 5){
                  list.append("<li><strong><font color='green'>"+item.choise+"</font></strong></li>");
                }else{
                  list.append("<li>"+item.choise+"</li>");
                }
              })
              // console.log(data);
              $('.text').html(data);
            },
          });
        })
    });
</script>
@endsection