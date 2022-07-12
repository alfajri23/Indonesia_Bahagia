@extends('layouts.layout_admin')

@section('content')

<div class="container-fluid">

    <div class="row">
        <div class="col-8">
            <h2 class="text-grey-700 fw-700 display1-size">Kelas</h2>
        </div>
        <div class="col-4">
            <a href="{{route('kelasInit')}}" type="button" class="btn btn-sm btn-success mx-1 text-white">Tambah</a>
            <a href="{{route('kelasKategori')}}" type="button" class="btn btn-sm btn-outline-dark">Setting Kategori</a>
        </div>
    </div>
    
    <div class="container mt-3">
        <div class="row">
            @forelse ($data as $dt) 
            <div class="col-xl-3 col-xxl-4 col-lg-4 col-md-6 col-sm-6">
                <a href="{{route('kelasDetail',$dt->id)}}" class="card">
                    <img class="img-fluid" src="{{asset($dt->poster)}}" alt="">
                    <div class="card-body">
                        <h4 class="fw-bolder">{{$dt->judul}}</h4>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item px-0 border-top-0 d-flex justify-content-between">
                                <span class="mb-0 text-muted">Status</span>
                                @if ($dt->status == 1)
                                    <span class="badge badge-success">Aktif</span>
                                @else
                                    <span class="badge badge-danger">Non aktif</span>
                                @endif
                            </li>
                            <li class="list-group-item px-0 d-flex justify-content-between">
                                <span class="mb-0">Harga :</span>
                                <strong>{{$dt->harga}}</strong>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            @empty
                <h4 class="text-center my-3">Tidak ada kelas</h4>
            @endforelse
        </div>
        {{-- @forelse ($data as $dt) 
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
            </div>
        </a>
        @empty
            
        @endforelse --}}
    </div>
</div>




@endsection