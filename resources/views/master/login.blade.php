@extends('layout.index')
@section('content')
<!-- MENU SECTION END-->
<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="page-head-line">Please Login To Enter </h4>

            </div>

        </div>
        <div class="row">
            <div class="col-md-6">
            <form method="POST" action="{{ url('login') }}">
                {{ csrf_field() }}
                    <label>Email : </label>
                    <input type="email" class="form-control" name="email"/>
                    <label>Password :  </label>
                    <input type="password" class="form-control" name="password"/>
                    <hr />
                    <a href="forget"><span class="forget-password">Lupa password ?</span></a>
                    <button type="submit" class="btn btn-info">Masuk</button>
                    <a href="{{ url('register') }}" class="btn btn-info">Buat Akun</a>
                </form>
            </div>
            <div class="col-md-6">
                <div class="alert alert-info">
                    Silahkan melakukan login kedalam sistem CAT
                    <br />
                     <strong>Apa Yang Kami Tawarkan ?</strong>
                    <ul>
                        <li>
                            Data soal yang banyak
                        </li>
                        <li>
                            Tampilan kami buat semirip mungkin dengan aplikasi CAT BKN
                        </li>
                        <li>
                            Anda akan mengetahui hasil ujian langsung
                        </li>
                        <li>
                            Tiap user berhak mendapat TRIAL untuk 2 kali test
                        </li>
                        <li>
                            Kami beri trial untuk 2 kali test
                        </li>
                        <li>
                            Aplikasi masih dalam tahap beta
                        </li>
                    </ul>
                   
                </div>
            </div>

        </div>
    </div>
</div>
<!-- CONTENT-WRAPPER SECTION END-->
@endsection