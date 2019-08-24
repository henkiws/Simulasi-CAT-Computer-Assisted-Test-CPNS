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
                <form method="POST" action="{{ url('register/store') }}">
                    {{ csrf_field() }}
                    <label>Nama : </label>
                    <input type="text" class="form-control" name="nama"/>
                    <label>Email :  </label>
                    <input type="email" class="form-control" name="email"/>
                    <label>Tanggal Lahir : </label>
                    <input type="date" class="form-control" name="date_birth"/>
                    <label>Jenis Kelamin : </label><br>
                    <input type="radio" name="gender" value="1">Laki laki
                    <input type="radio" name="gender" value="0">Perempuan<br>
                    <label>Address : </label>
                    <textarea class="form-control" name="address"></textarea>
                    <label>Password :  </label>
                    <input type="password" class="form-control" name="password"/>
                    <hr />
                    <button type="submit" class="btn btn-info">Daftar</button>
                </form>
            </div>
            <div class="col-md-6">
                <div class="alert alert-info">
                    Silahkan melakukan pendaftaran kedalam sistem CAT
                    <br />
                     <strong><i>Apa Yang Kami Tawarkan ?</i></strong>
                    <ul>
                        <li>
                            <b>Pastikan alamat email anda benar, untuk aktivasi akun</b><br>
                            <i>Apabila tidak mendapatkan email, silahkan WA ke 085725626073 dengan format: nama_email_tanggal registrasi, contoh: budi santoso_budi@mail.com_1-sep-2019</i>
                        </li>
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
                <div class="alert alert-success">
                     <strong>Petunjuk Penggunaan :</strong>
                    <ul>
                        <li>
                            Silahkan isi form pendaftaran disamping dengan benar!
                        </li>
                        <li>
                            Kami akan mengirimkan email aktivasi akun
                        </li>
                        <li>
                            Setelah diaktivasi anda dapat melakukan login dengan email dan password anda
                        </li>
                        <li>
                            Anda dapat melakukan test dengan banyak soal yang telah kami sediakan
                        </li>
                        <li>
                            Riwayat test anda dapat anda lihat dihalaman profile user
                        </li>
                    </ul>
                   
                </div>
            </div>

        </div>
    </div>
</div>
<!-- CONTENT-WRAPPER SECTION END-->
@endsection