@extends('layouts.layout_user')
@section('content')

<div class="blog-page pt-lg--7 pb-lg--7 pt-5 pb-5 bg-white">
    <div class="container">
        <div class="row">
            <div class="row align-items-center">
                <div class="col-lg-3">
                    <figure class="avatar ml-0 mb-4 position-relative w100 z-index-1">
                        <img src="{{ $data->foto != null ? asset($data->foto) : 'https://asia.ifoam.bio/wp-content/uploads/2018/06/image-placeholder.jpeg'}}" alt="image" class="float-right p-1 bg-white w-100">
                    </figure>
                </div>
                <div class="col-lg-6">                   
                    <h3 class="mb-1">{{$data->nama}}</h3>
                    <p class="mb-0">STR : {{$data->STR}}</p>
                    <p class="mb-1">SIPP : {{$data->SIPP}}</p>
                </div>
            </div>

            <h2 class="dlab-title">{{$data['judul']}}</h2>

            <div class="dlab-post-text">
                <h5>Pendidikan</h5>

                <ul class="list-cup green">
                @forelse ($data->pendidikans as $pendidikan)
                    <li>
                        <p class="mb-0 fw-bolder">{{$pendidikan->universitas}}</p>
                        <p>{{$pendidikan->tahun}} - {{$pendidikan->jurusan}}</p>
                        
                    </li>
                    @empty   
                    @endforelse
                </ul>

                <h5 class="mt-3">Tentang psikolog</h5>
                <div>{!!$data->tentang!!}</div>

                <h5 class="mt-3">Layanan</h5>
                <div class="row dzseth">
                    @forelse ($layanans as $layanan)
                <div class="col-lg-6 col-md-6 col-sm-6 m-b30 rich-list">
                        <div class="icon-bx-wraper bx-style-1 bg-white p-lr20 p-tb30 seth radius-sm">
                            <div class="icon-lg text-primary m-b20"> <a href="javascript:void(0);" class="icon-cell"><i class="ti-location-pin"></i></a> </div>
                            <div class="">
                                <h5 class="dlab-tilte text-uppercase">{{$layanan->nama }}</h5>
                                <div>{!!$layanan->desc !!}</div>
                                <div>

                                    <a href="{{route('buatJanji',['id_konsultan'=>$data->id, 'id_layanan'=>$layanan->id])}}" class="btn p-2 text-grey-900 fw-600 rounded-lg font-xssss btn-outline-info">Atur jadwal</a>
                                </div>
                                
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

@endsection