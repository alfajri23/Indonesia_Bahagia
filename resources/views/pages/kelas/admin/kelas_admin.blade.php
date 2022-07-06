@extends('layouts.layout_admin')

@section('content')

<div class="container-fluid">

    <div class="row">
        <div class="col-7">
            <h2 class="text-grey-700 fw-700 display1-size">Kelas</h2>
        </div>
        <div class="col-5">
            <a href="{{route('kelasInit')}}" type="button" class="btn btn-sm btn-success mx-1">Tambah</a>
            <a href="{{route('kelasKategori')}}" type="button" class="btn btn-sm btn-secondary">Kategori</a>
        </div>
    </div>
    
    <div class="container d-flex mt-3">
        @forelse ($data as $dt) 
        <a href="{{route('kelasDetail',$dt->id)}}" class="card mx-2" style="width: 14rem;">
            <div class="card-image w-100 mb-3">
                <img src="{{asset($dt->poster)}}" alt="image" class="w-100">
            </div>
            <div class="card-body">
                @if ($dt->status == 1)
                    <span class="badge badge-success">Aktif</span>
                @else
                    <span class="badge badge-danger">Non aktif</span>
                @endif
              <p class="fw-700 text-grey-800 display2-md-size card-title">{{$dt->judul}}</p>
              {{-- <a href="{{route('produkDetail',$dt->id)}}" class="btn btn-primary">Go somewhere</a> --}}
            </div>
        </a>
        @empty
            
        @endforelse
    </div>
</div>




@endsection