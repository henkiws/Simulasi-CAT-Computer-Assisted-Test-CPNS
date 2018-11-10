@extends('admin.layout.index')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
    <h6>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">UI</a></li>
            <li class="active">General</li>
        </ol>
    </h6>
    
    </section>
    <!-- Main content -->
    <section class="content">
            <div class="box box-default color-palette-box">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-tag"></i><strong> Daftar Pertanyaan</strong></h3>
            </div>
            <div class="box-body">
              <div class="row" style="margin-bottom:10px;">
                <div class="col-sm-8">
                    
                </div>
                <div class="col-sm-4" align="right">
                    <a href="{{ url('admin/question/create') }}" class="btn btn-primary">Tambah</a>      
                </div>
              </div>
              <table class="table table-bordered">
                <thead>
                  <th>No</th>
                  <th>Group</th>
                  <th>Jenis</th>
                  <th>Pertanyaan</th>
                  <th>Pilihan</th>
                  <th>Aksi</th>
                </thead>
                <tbody>
                  @foreach($data as $key=>$item)
                  <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $item->question_group==1 ? "TWK" : $item->question_group==2 ? "TIU" : "TKP" }}</td>
                    <td>{{ $item->question_type }}</td>
                    <td>{{ $item->question }}</td>
                    <td><button class="btn btn-info">lihat</button></td>
                    <td>
                      <button class="btn btn-warning">edit</button>
                      <button class="btn btn-danger">hapus</button>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
    </section>
    <!-- /.content -->
  </div>
@endsection