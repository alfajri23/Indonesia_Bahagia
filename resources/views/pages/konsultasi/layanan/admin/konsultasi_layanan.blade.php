@extends('layouts.layout_admin')

@section('content')

<div class="container-fluid">

    <div class="row">
        <div class="col-10">
            <h2 class="text-grey-700 fw-700 display1-size">Layanan konsultasi</h2>
        </div>
        <div class="col-2">
            <a href="{{route('layananKonsultasiAdminAdd')}}" type="button" class="btn btn-sm btn-success">Tambah</a>
        </div>
    </div>
    

    <div class="container d-flex mt-3">
        @forelse ($datas as $dt) 
        <div class="card mx-2" style="width: 14rem;">
            <div class="card-body">
              <p class="fw-bold text-grey-800 display2-md-size card-title">{{$dt->nama}}</p>
              <p class="fw-700 text-grey-800 display2-md-size card-title">Rp.{{number_format($dt->harga)}}</p>
              
              <div>
                <a href="{{route('layananKonsultasiAdminEdit',$dt->id)}}" class="btn btn-primary btn-sm">Edit</a>
                <a type="button" class="btn btn-secondary btn-sm">Detail</a>
              </div>
            </div>
        </div>
        @empty
            <h2 class="text-center">Tidak ada</h2>
        @endforelse
    </div>
</div>
@endsection