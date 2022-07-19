@extends('layouts.layout_user')
@section('content')

<div class="page-content bg-gray">
    <!-- inner page banner -->
    <div class="dlab-bnr-inr overlay-black-middle bg-pt" style="background-image:url(images/banner/bnr4.jpg);">
        <div class="container">
            <div class="dlab-bnr-inr bg-pt">
                <div class="container">
                    <div class="dlab-bnr-inr-entry">
                        <h1 class="text-white">Event</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- inner page banner END -->
    <div class="section-full bg-white content-inner">
        <div class="container">
            <div class="row">
                @forelse ($datas as $data)
                <div class="col-lg-4 col-md-6 col-sm-6 m-b30 d-flex">
                    <a href="{{route('produkDetail',$data->id_produk)}}" class="dlab-box service-box-2 w-100 shadow-md">
                        <div class="dlab-media radius-sm dlab-img-overlay1"> 
                            {{-- <img data-src="{{ $data->poster != null ? asset($data->poster) : 'https://images.unsplash.com/photo-1500989145603-8e7ef71d639e?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=876&q=80'}}" class="lozad" alt=""> --}}
                            <div class="col-12" style="width:100%">
                                <div 
                                    class="lozad back-img rounded-lg"
                                    data-background-image="{{ $data->poster != null ? asset($data->poster) : 'https://images.unsplash.com/photo-1500989145603-8e7ef71d639e?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=876&q=80'}}"
                                >
                                </div>
                            </div>
                        </div>
                        <div class="dlab-info">
                            <div class="dlab-post-meta text-blue">
                                <ul>
                                    <li class="post-date">
                                        <i class="ti-time mr-1"></i>
                                        <small> {{$data->waktu}}</small> 
                                    </li>
                                    <li class="post-author mt-1">
                                        <i class="ti-calendar mr-1"></i><small> {{date_format(date_create($data->tanggal),"d M Y")}}</small> 
                                    </li>
                                </ul>
                            </div>
                            <h4 class="post-title">
                                {{$data->judul}}
                            </h4>

                            @if($data->harga_bias)
                            <div class="dlab-post-title text-dark mb-0">
                                <div class="post-title mb-0 font-12"><del>Rp.{{$data->harga_bias}}</del></div>
                            </div>
                            @endif

                            <div class="dlab-post-title text-dark">
                                <p class="post-title mt-0">
                                    @if ($data->harga == null)
                                    GRATIS
                                @else
                                    Rp. {{number_format($data->harga)}}
                                @endif
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
                @empty
                <h4 class="text-center">Tidak ada event</h4>
                @endforelse
            </div>
        </div>
    </div>
    <!-- Events End -->
</div>
<!-- Content END-->

<script src="https://cdn.jsdelivr.net/npm/lozad/dist/lozad.min.js"></script>
<script>
    const observer = lozad();
    observer.observe();
</script>


@endsection