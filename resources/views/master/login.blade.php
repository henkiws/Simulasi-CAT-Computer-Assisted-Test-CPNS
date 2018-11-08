@extends('layout.index')
@section('content')
<div class="navbar navbar-inverse set-radius-zero">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html">

                <img src="assets/img/logo.png" />
            </a>

        </div>

        <div class="left-div">
            <i class="fa fa-user-plus login-icon" ></i>
    </div>
        </div>
    </div>
<!-- LOGO HEADER END-->

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
                    <button type="submit" class="btn btn-info">Masuk</button>
                    <a href="{{ url('register') }}" class="btn btn-info">Daftar</a>
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