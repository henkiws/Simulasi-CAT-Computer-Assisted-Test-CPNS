@extends('layout.index')
@section('content')

<!-- MENU SECTION END-->
<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <h4 class="page-head-line">Selamat Mengerjakan!</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-9">
                <form action="{{ url('answer') }}" method="POST" name="form">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" >
                    {{-- <input type="hidden" name="question" > --}}
                    <input type="hidden" name="page">
                    <input type="hidden" name="ljk" value="{{ $data[0]->ljk_id }}">
                    <div class="soal">
                        {{-- @if($question->istext==1)
                           {{ $page }}. {{ $question->question }}
                        @else
                        {{ $page }}. <img src="{{url('img/question')}}/{{ $question->question }}" class='img'>
                        @endif --}}
                        <div id="res_soal"></div>
                    </div>
                    <div class="pilihan">
                    {{-- @foreach($question->option->shuffle() as $val)
                        @if($data[0]->answer_id == $val->id)
                            <input type="radio" name="answer" value="{{ $val->id }}" checked> {{ $val->choise }}<br>
                        @else
                            <input type="radio" name="answer" value="{{ $val->id }}"> {{ $val->choise }}<br>
                        @endif
                    @endforeach --}}
                        <div id="res_pilihan"></div>
                    </div>
                    <div align="right">
                        <a name="lewat" data='1' class="btn btn-primary">Lewatkan soal ini</a>
                        <button type="button" name="simpan" class="btn btn-primary">Simpan dan Lanjutkan</button>
                    </div>
                </form>
            </div>
            <div class="col-md-3" style="top:-130px;">
                <div align="center" class="alert alert-info" style="padding:0">
                        <table class="table table-condensed" style="margin-bottom:0px;" align="center">
                            <tbody>
                                Lembar Jawaban
                                {{ $data->total() }}
                                <?php 
                                    $end=1;
                                    $jawab_tot=0;
                                    $blm_jawab_tot=0;
                                ?>
                                @foreach(range(1,20) as $num)
                                <?php
                                    $start= $end==1 ? $end : $end+1;
                                    $end=$num*5;
                                ?>
                                <tr>
                                    <?php
                                        $jawab = 0;
                                        $blm_jawab = 0;
                                    ?>
                                    @for($b=$start;$b<=$end;$b++)
                                        @if($sheet[$b-1]->answer_id)
                                        <?php $jawab++; ?>
                                        <td><a name="ljk_num" id="ljk_{{ $b }}" data="{{ $b }}" href="#" class="nav-soal text-center" style="background-color: green;">{{ $b }}</a></td>
                                        @else
                                        <td><a name="ljk_num" id="ljk_{{ $b }}" data="{{ $b }}" href="#" class="nav-soal text-center" style="background-color: red;">{{ $b }}</a></td>
                                        @endif
                                    @endfor
                                </tr>
                                <?php $jawab_tot+=$jawab; ?>
                                @endforeach
                            </tbody>
                        </table>                   
                </div>
            </div>

        </div>
    </div>
</div>
<!-- CONTENT-WRAPPER SECTION END-->
@endsection

@section('script')
    <script>
        var counter = {{ $jawab_tot }};
        var deadline = new Date(Date.parse(new Date({{ $date.'000' }})) + 1.5 * 60 * 60 * 1000);
        initializeClock('clockdiv', deadline);
    </script>
@endsection
