@extends('layouts.layout_admin')

@section('content')

<div class="container-fluid">

    <div class="row">
        <div class="col-10">
            <h2 class="text-grey-700 fw-700 display1-size">Konsultan</h2>
        </div>
        <div class="col-2">
            <a href="{{route('konsultanAdminCreate')}}" type="button" class="btn btn-sm btn-success">Tambah</a>
        </div>
    </div>
    

    <div class="container d-flex mt-3">
        @forelse ($datas as $dt) 
        <a href="{{route('konsultanAdminDetail',$dt->id)}}" class="card mx-2" style="width: 14rem;">
            <div class="card-image w-100 mb-3">
                <img src="{{asset($dt->foto)}}" alt="image" class="w-100">
            </div>
            <div class="card-body">
              <p class="fw-700 text-grey-800 display2-md-size card-title">{{$dt->nama}}</p>
              {{-- <a href="{{route('produkDetail',$dt->id)}}" class="btn btn-primary">Go somewhere</a> --}}
            </div>
        </a>
        @empty
            <h2 class="text-center">Tidak ada</h2>
        @endforelse
    </div>
</div>
@endsection