@extends('layout.index')
@section('content')
<!-- MENU SECTION END-->
<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="page-head-line">Please Enter Your Email </h4>

            </div>

        </div>
        <div class="row">
            <div class="col-md-6">
            <form method="POST" action="{{ url('forget') }}">
                {{ csrf_field() }}
                    <label>Email : </label>
                    <input type="email" class="form-control" name="email"/>
                    <hr />
                    
            </div>
            <div class="col-md-6">
                    <div class="btn-forget">
                        <button type="submit" class="btn btn-info">Kirim</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<!-- CONTENT-WRAPPER SECTION END-->
@endsection