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

            <div class="box box-info">
                    <div class="box-header with-border">
                      <h3 class="box-title">Form Soal</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form class="form-horizontal">
                      <div class="box-body">
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Group Soal</label>
                          <div class="col-sm-10">
                            <select name="question_group" class="form-control">
                                <option selected disabled>- Silahkan Pilih -</option>
                                <option value="1">Tes Wawasan Kebangsaan</option>
                                <option value="2">Tes Intelegensi Umum</option>
                                <option value="3">Tes Kepribadian</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group">
                        <label class="col-sm-2 control-label">Jenis Soal</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Contoh : Sejarah Nasional" name="question_type">
                        </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Sumber Soal</label>  
                            <div class="col-sm-10">
                                <input type="radio" name="sumber_soal" value="1">Text
                                <input type="radio" name="sumber_soal" value="0">Image
                            </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Pertanyaan</label>  
                          <div class="col-sm-10">
                            <textarea class="form-control" name="question" id="question_text"></textarea>
                            <input type="file" class="form-control" name="question" id="question_img" style="display:none;">
                          </div>
                        </div>
                      </div>

                    </form>
                  </div>
                <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Form Pilihan Jawaban</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal">
                    <div class="box-body">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Sumber Jawaban</label>  
                        <div class="col-sm-10">
                            <input type="radio" name="sumber_jawaban" value="1">Text
                            <input type="radio" name="sumber_jawaban" value="0">Image
                        </div>
                    </div>
                    @for($a=0;$a<5;$a++)
                    <div class="form-group pil_text">
                        <label class="col-sm-2 control-label">Pilihan {{ $a+1 }}</label>  
                        <div class="col-sm-8">
                        <textarea class="form-control" name="choise[]"></textarea>
                        </div>  
                        <div class="col-sm-2">
                            <input type="radio" name="answer[]" value="1" tkp='0'> Benar
                            <input type="number" class="form-control" name="answer[]" tkp="1" placeholder="Range 1-5" style="display:none"> 
                        </div>
                    </div>
                    <div class="form-group pil_img" style="display:none;">
                            <label class="col-sm-2 control-label">Pilihan {{ $a+1 }}</label>  
                            <div class="col-sm-8">
                                <input type="file" name="choise[]" class="form-control">
                            </div>  
                            <div class="col-sm-2">
                                <input type="radio" name="answer[]" value="1" tkp='0'> Benar
                                <input type="number" class="form-control" name="answer[]" tkp='1' placeholder="Range 1-5" style="display:none"> 
                            </div>
                        </div>
                    @endfor
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                    <button type="submit" class="btn btn-default">Cancel</button>
                    <button type="submit" class="btn btn-info pull-right">Sign in</button>
                    </div>
                    <!-- /.box-footer -->
                </form>
                </div>
    </section>
    <!-- /.content -->
  </div>
@endsection
@section('script')
  <script>
      $(document).ready(function(){
          $(document).on('click','input[name="sumber_soal"]',function(){
              var $val = $(this).val();
              $val==1? $('#question_img').hide() && $('#question_text').show() : $('#question_text').hide() && $('#question_img').show() ;
          })
          $(document).on('click','input[name="sumber_jawaban"]',function(){
              var $val = $(this).val();
              $val==1? $('.pil_img').hide() && $('.pil_text').show() : $('.pil_text').hide() && $('.pil_img').show() ;
          })
          $(document).on('change','select[name="question_group"]',function(){
            var $val = $(this).val();
            $val==3? $('input[tkp="1"]').show() && $('input[tkp="0"]').hide() : $('input[tkp="1"]').hide() && $('input[tkp="0"]').show() ;
          })
      })
  </script>
@endsection