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
                <div class="alert alert-success">
                     <strong> Instructions To Use:</strong>
                    <ul>
                        <li>
                           Lorem ipsum dolor sit amet ipsum dolor sit ame
                        </li>
                        <li>
                             Aamet ipsum dolor sit ame
                        </li>
                        <li>
                           Lorem ipsum dolor sit amet ipsum dolor
                        </li>
                        <li>
                             Cpsum dolor sit ame
                        </li>
                    </ul>
                   
                </div>
            </div>

        </div>
    </div>
</div>
<!-- CONTENT-WRAPPER SECTION END-->
@endsection