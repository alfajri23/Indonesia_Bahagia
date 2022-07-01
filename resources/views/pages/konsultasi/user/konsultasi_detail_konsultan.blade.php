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

                <div class="row mt-5">
                    <h2 class="fw-600 font-sm mb-1">Pendidikan</h2>
                    @forelse ($data->pendidikans as $pendidikan)
                        <p class="font-xssss fw-500 lh-28 text-grey-600 mb-0 pl-2">{{$pendidikan->universitas}}</p>
                        <p class="font-xssss fw-500 lh-28 text-grey-600 mb-0 pl-2">{{$pendidikan->tahun}} - {{$pendidikan->jurusan}}</p>
                        
                    @empty
                        
                    @endforelse
                </div>


            </div>

        </div>
    </div>
</div>

@endsection