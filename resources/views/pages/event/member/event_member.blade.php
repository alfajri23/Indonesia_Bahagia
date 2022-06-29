@extends('layouts.layout_user')
@section('content')

<div class="post-title page-nav pt-lg--7 pt-lg--7 pt-5 pb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                
                <h2 class="mt-3 mb-2">
                    <a href="#" class="lh-2 display2-size display2-md-size mont-font text-grey-900 fw-700">{{$data->judul}}</a>
                </h2>                                
            </div>
        </div>
    </div>
</div>

<div class="post-image">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-10 text-center mx-auto">
                <img src="{{ $data->poster != null ? asset($data->poster) : 'https://images.unsplash.com/photo-1500989145603-8e7ef71d639e?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=876&q=80'}}" alt="blog-image" class="img-fluid rounded-lg lozad">
            </div>
        </div>
    </div>
</div>

<div class="post-content pt-lg--7 pt-lg--7 pt-5 pb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-left clearfix">
                <div class="float-right col-4 text-right">
                    @if($data->harga_bias)
                    <h3 class="font-xs fw-600 text-grey-700 my-0 pr-3"><del>Rp.{{$data->harga_bias}}</del></h3>
                    @endif
                    <h3 class="font-md fw-600 text-grey-700 my-0 pr-3">
                        @if ($data->harga == null)
                            GRATIS
                        @else
                            Rp. {{number_format($data->harga)}}
                        @endif
                    </h3>
                </div>

                <div class="font-xss mb-4">
                    <p class="mb-0 text-grey-700 fw-500"><i class="ti-calendar mr-2"></i>{{date_format(date_create($data->tanggal),"d M Y")}}</p>
                    <p class="mb-0 text-grey-700 fw-500"><i class="ti-time mr-1"></i> {{$data->waktu}}</p>
                </div>

                @isset($data->grup_wa)
                <p class="font-xs text-grey-800 fw-700 mb-0">Grup Wa</p>
                <div class="isi font-xss text-grey-700 mb-3">
                    {{$data->grup_wa}}
                </div>
                @endisset

                <p class="font-xs text-grey-800 fw-700 mb-0">Link</p>
                <div class="isi font-xss text-grey-700 mb-3">
                    {!!$data->link!!}
                </div>
                
                <p class="font-xs text-grey-800 fw-700 mb-0">Pemateri</p>
                <div class="isi font-xss text-grey-700 mb-3">
                    {!!$data->pemateri!!}
                </div>

                <p class="font-xs text-grey-800 fw-700 mb-0">Deskripsi</p>
                <div class="isi font-xss text-grey-700">
                  {!!$data->desc!!}
                </div>
                
            </div>
        </div>
    </div>
</div>


@endsection