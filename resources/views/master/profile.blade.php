@extends('layout.index')
@section('content')
<!-- MENU SECTION END-->
<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="page-head-line">Informasi Akun</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <label>Nama</label> {{ $data->name }}<br> 
                <label>Tanggal Lahir</label> {{ $data->user_detail->date_birth }}<br>
                <label>Jenis Kelamin</label> {{ $data->user_detail->gender==1 ? "laki laki" : "perempuan" }}<br> 
                <label>Alamat</label> {{ $data->user_detail->address }}<br> 
                <div align="right">
                    <form action="{{ url('store') }}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{ $data->id }}">
                        <button type="submit" class="btn btn-primary">Mulai Ujian</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h4 class="page-head-line">History Test</h4>
            </div>
            <div class="col-md-12">
                <table class="table table-bordered">
                    <tr>
                        <th>#</th>
                        <th>Tanggal Test</th>
                        <th>Skor TWK</th>
                        <th>Skor TIU</th>
                        <th>Skor TKP</th>
                        <th>Skor Total</th>
                        <th>Keterangan</th>
                    </tr>
                    @foreach($history as $key=>$item)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>{{ $item->skor_twk }}</td>
                            <td>{{ $item->skor_tiu }}</td>
                            <td>{{ $item->skor_tkp }}</td>
                            <td>{{ $item->skor_total }}</td>
                            <td>{{ $item->keterangan }}</td>
                        </tr>
                    @endforeach
                </table>
                <div align="right">{{ $history->links() }}</div>
            </div>
        </div>
    </div>
</div>
<!-- CONTENT-WRAPPER SECTION END-->
@endsection