@extends('layouts.layout_admin')

@section('content')

<div class="container-fluid">

    <div class="row">
        <div class="col-10">
            <h2 class="text-grey-700 fw-700 display1-size">Layanan konsultasi</h2>
        </div>
        <div class="col-2">
            <a href="{{route('layananKonsultasiAdminAdd')}}" type="button" class="btn btn-sm btn-success text-white">Tambah</a>
        </div>
    </div>
    

    <div class="container d-flex mt-3">
        @forelse ($datas as $dt) 
        <a href="{{route('layananKonsultasiDetailAdmin',$dt->id)}}" class="card mx-2" style="width: 14rem;">
            <div class="card-body">
              <h4 class="fw-bold">{{$dt->nama}}</h4>
              <p class="card-title fw-bolder text-success">Rp.{{number_format($dt->harga)}}</p>
            </div>
        </a>
        @empty
            <h2 class="text-center">Tidak ada</h2>
        @endforelse
    </div>
</div>
@endsection