@extends('layouts.layout_user')
@section('content')

<div class="page-nav bg-pink pt-lg--7 pb-lg--7 pb-5 pt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center"><h1 class="text-grey-800 fw-700 display3-size">Event
                <span class="font-xsss text-grey-600 fw-600 d-block mt-2">Produk / Event</span></h1></div>
        </div>
    </div>
</div>

<div class="blog-page pt-lg--7 pb-lg--7 pt-5 pb-5 bg-white">
    <div class="container">
        <div class="row">
            @forelse ($datas as $data)
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 mb-4">
                <article class="post-article p-0 border-0 shadow-xss rounded-lg overflow-hidden h-100">
                    <div class="">
                        <div 
                            class="lozad back-img rounded-lg"
                            data-background-image="{{ $data->poster != null ? asset($data->poster) : 'https://images.unsplash.com/photo-1500989145603-8e7ef71d639e?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=876&q=80'}}"
                        >
                    </div>
                    <div class="post-content p-4"> 
                        <h6 class="font-xssss text-grey-600 fw-600 ml-3 float-right"><i class="ti-time mr-1"></i> {{$data->waktu}}</h6>
                        <h6 class="font-xsss fw-600 text-green fw-600 float-right"><i class="ti-calendar mr-1"></i> {{date_format(date_create($data->tanggal),"d M Y")}}</h6> 
                        <div class="clearfix"></div>

                        <h2 class="post-title mt-0 mb-2 pr-3">
                            <a href="{{route('produkDetail',$data->id_produk)}}" class="lh-30 font-md mont-font text-grey-800 fw-700">{{$data->judul}}</a>
                        </h2>                                
                        @if($data->harga_bias)
                        <p class="font-xss fw-400 text-grey-700 my-0 pr-3"><del>Rp.{{$data->harga_bias}}</del></p>
                        @endif
                        <p class="font-xs fw-700 text-freen my-0 pr-3">
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
                
            @endforelse
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/lozad/dist/lozad.min.js"></script>
<script>
    const observer = lozad();
    observer.observe();
</script>


@endsection