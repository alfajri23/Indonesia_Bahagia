@extends('layouts.layout_user')
@section('content')

<div class="blog-page pt-lg--7 pb-lg--7 pt-5 pb-5 bg-white">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-xxl-9 col-lg-8 mx-auto">
                <div class="row">
                    <div class="col-lg-2">
                        <figure class="avatar ml-0 mb-4 position-relative w100 z-index-1">
                            <img src="{{ $data->foto != null ? asset($data->foto) : 'https://asia.ifoam.bio/wp-content/uploads/2018/06/image-placeholder.jpeg'}}" alt="image" class="float-right p-1 bg-white w-100">
                        </figure>
                    </div>
                    <div class="col-lg-6">                   
                        <h4 class="fw-700 font-lg text-dark mt-3 mb-1">{{$data->nama}}<i class="ti-check font-xssss btn-round-xs bg-success text-white ml-1"></i></h4>
                        <p class="font-xsss fw-600 text-grey-600 mb-0">STR : {{$data->STR}}</p>
                        <p class="font-xsss fw-600 text-grey-600 mb-1">SIPP : {{$data->SIPP}}</p>
                    </div>
                </div>

                <div class="row mt-5 pt-3">
                    <h2 class="fw-600 font-sm mb-1">Pendidikan</h2>
                    @forelse ($data->pendidikans as $pendidikan)
                        <p class="font-xsss fw-500 text-grey-600 mb-0 pl-3">{{$pendidikan->universitas}}</p>
                        <p class="font-xssss fw-500 text-grey-600 mb-2 pl-3">{{$pendidikan->tahun}} - {{$pendidikan->jurusan}}</p> 
                    @empty   
                    @endforelse

                    <h2 class="fw-600 font-sm mb-1 mt-3">Tentang psikolog</h2>
                    <div class="font-xsss fw-400 text-grey-700 mb-0 pl-3">{!!$data->tentang!!}</div>
                </div>

                <div class="row mt-4 pt-3">
                    <h2 class="fw-600 font-sm mb-3">Layanan</h2>
                    <div class="container">

                        @forelse ($layanans as $layanan)
                        <div class="card p-4 mb-4 border-1 shadow-xss rounded-lg">
                            <div class="card-body">
                                <h2 class="text-grey-700 font-xsssss fw-700 text-uppercase ls-3 ">Starter</h2>
                                <h1 class="font-lg text-grey-700 fw-700">{{$layanan->nama }}</h1>
                                <h4 class="text-grey-700 fw-400 mb-4 lh-24 font-xsss">{!!$layanan->desc !!}</h4>
                                <div>
    
                                    <a href="{{route('buatJanji',['id_konsultan'=>$data->id, 'id_layanan'=>$layanan->id])}}" class="btn p-2 text-grey-900 fw-600 rounded-lg font-xssss btn-outline-info">Atur jadwal</a>
                                </div>
    
                            </div>
                        </div>
                        @empty
                            
                        @endforelse
                    </div>
                </div>


            </div>

        </div>
    </div>
</div>

@endsection