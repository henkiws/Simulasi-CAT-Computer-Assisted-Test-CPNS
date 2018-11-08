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
                @foreach ($data as $item)
                    <div class="soal">
                        {{ $item->question }}<br>
                    </div>
                    <div class="pilihan">
                    @foreach($item->option->shuffle() as $val)
                        {{ $val->choise }}<br>
                    @endforeach
                    </div>
                @endforeach
            </div>
            <div class="col-md-3" style="top:-110px;">
                <div class="alert alert-info">
                    This is a free bootstrap admin template with basic pages you need to craft your project. 
                    Use this template for free to use for personal and commercial use.
                    <br />
                     <strong> Some of its features are given below :</strong>
                    <ul>
                        <li>
                            Responsive Design Framework Used
                        </li>
                        <li>
                            Easy to use and customize
                        </li>
                        <li>
                            Font awesome icons included
                        </li>
                        <li>
                            Clean and light code used.
                        </li>
                    </ul>
                   
                </div>
            </div>

        </div>
    </div>
</div>
<!-- CONTENT-WRAPPER SECTION END-->
@endsection