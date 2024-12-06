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
            <div class="row">
                <label class="col-sm-4">Nama</label>
                <div class="col-sm-8">
                    {{ $data->name }}
                </div>
            </div>
            <div class="row">
                <label class="col-sm-4">Tanggal Lahir</label>
                <div class="col-sm-8">
                    {{ $data->user_detail->date_birth }}
                </div>
            </div>
            <div class="row">
                <label class="col-sm-4">Jenis Kelamin</label>
                <div class="col-sm-8">
                    {{ $data->user_detail->gender==1 ? "laki laki" : "perempuan" }}
                </div>
            </div>
            <div class="row">
                <label class="col-sm-4">Alamat</label>
                <div class="col-sm-8">
                    {{ $data->user_detail->address }}
                </div>
            </div>
            <div class="col-md-12">
                <div class="text-right">
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
                    @forelse($history as $key=>$item)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>{{ $item->skor_twk }}</td>
                            <td>{{ $item->skor_tiu }}</td>
                            <td>{{ $item->skor_tkp }}</td>
                            <td>{{ $item->skor_total }}</td>
                            <td>{{ $item->keterangan }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">No Data</td>
                        </tr>
                    @endforelse
                </table>
                <div align="right">{{ $history->links() }}</div>
            </div>
        </div>
    </div>
</div>
<!-- CONTENT-WRAPPER SECTION END-->
@endsection