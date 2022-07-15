@extends('layouts.layout_user')
@section('content')


<div class="content-block">
    <div class="section-full content-inner bg-white wow fadeIn" data-wow-duration="2s" data-wow-delay="0.4s">
        <div class="container">
            <div class="row">
                <!-- Left part start -->
                <div class="col-lg-8 col-md-7 col-sm-12 ">
                    <div class="dlab-media m-b30 rounded-lg">
                        
                        <img src="{{ $data->poster != null ? asset($data->poster) : 'https://images.unsplash.com/photo-1500989145603-8e7ef71d639e?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=876&q=80'}}" alt="">
                        
                    </div>
                    <h2 class="dlab-title">{{$data->judul}}</h2>

                    <div class="dlab-post-text">
                        <h5>Pemateri</h5>

                        <div>
                            {!!$data->pemateri!!}
                        </div>

                        <h5 class="mt-4">Deskripsi</h5>

                        <div>
                            {!!$data->desc!!}
                        </div>

                    </div>
                </div>

                <div class="col-lg-4 col-md-5 col-sm-12 m-b30">
                    <div class="bx-style-1 p-a30 center m-b30 bg-white border">
                        <div class="icon-content">
                            <p class="mb-0">
                                Tanggal
                                
                            </p>
                            <h6 class="dlab-tilte text-uppercase">
                                <i class="ti-calendar mr-2"></i>
                                {{date_format(date_create($data->tanggal),"d M Y")}}
                            </h6>
                            
                            <p class="mb-0">
                                Waktu
                            </p>
                            <h6 class="dlab-tilte text-uppercase">
                                <i class="ti-time mr-1"></i> {{$data->waktu}}
                            </h6>

                            <p class="mb-0">
                                Link
                            </p>
                            <h6 class="dlab-tilte text-uppercase">
                                <i class="fa-solid fa-link mr-1"></i> {!!$data->link!!}
                            </h6>

                            @isset($data->grup_wa)
                            <p class="mb-0">
                                Grub WA
                            </p>
                            <h6 class="dlab-tilte text-uppercase">
                                <i class="fa-brands fa-whatsapp mr-1"></i> {{$data->grup_wa}}
                            </h6>
                            @endisset
                            
                            <p class="mb-0">
                                Harga
                            </p>
                            <h6 class="dlab-tilte text-uppercase">
                                
                                @if ($data->harga == null)
                                    GRATIS
                                @else
                                    Rp. {{number_format($data->harga)}}
                                @endif
                            </h6>
                            
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection