@extends('layouts.layout_user')
@section('content')

<div class="page-nav pt-lg--7 pb-lg--7 pb-5 pt-5">
    <div class="container">
        <div class="row">
            <div class="col-12 shadow-xss">
                @include('components.tab.pembayaran.tab_pembayaran')
            </div>

            <div class="col-12 mt-5">
                <div class="card d-block w-100 border-0 shadow-xss rounded-lg overflow-hidden p-4">
                    <div class="card-body mb-3 pb-0"><h2 class="fw-400 font-lg d-block">Kelas saya <a href="#" class="float-right"><i class="feather-edit text-grey-500 font-xs"></i></a></h2></div>
                    <div class="card-body pb-0">
                        <div class="row">
                            @forelse ($datas as $data)
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-4">
                                <article class="post-article p-0 border-0 shadow-xss rounded-lg overflow-hidden">
                                    <a href="">
                                        <img src="{{asset($data->poster)}}" alt="blog-image" class="w-100">
                                    </a>
                                    <div class="post-content p-4"> 
                                        <h6 class="font-xssss text-grey-600 fw-600 ml-3 float-right"><i class="ti-time mr-1"></i> {{$data->waktu}}</h6>
                                        <h6 class="font-xsss fw-600 text-green fw-600 float-right"><i class="ti-calendar mr-1"></i> {{date_format(date_create($data->tanggal),"d M Y")}}</h6> 
                                        <div class="clearfix"></div>
    
                                        <h2 class="post-title mt-0 mb-2 pr-3">
                                            <a href="{{route('produkDetailEnroll',$data->id_produk)}}" class="lh-30 font-md mont-font text-grey-800 fw-700">{{$data->judul}}</a>
                                        </h2>                                
                                        @if($data->harga_bias)
                                        <p class="font-xss fw-400 text-grey-700 my-0 pr-3"><del>Rp.{{$data->harga_bias}}</del></p>
                                        @endif
                                        <p class="font-xs fw-700 text-freen mt-0 pr-3">
                                            @if ($data->harga == null)
                                                GRATIS
                                            @else
                                                Rp. {{number_format($data->harga)}}
                                            @endif
                                        </p>
    
                                    </div>                            
                                </article>
                            </div>  
                            @empty
                            <h2 class="font-xl fw-600 font-grey-700 text-center">Belum ada event yang kamu ikuti</h2>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection