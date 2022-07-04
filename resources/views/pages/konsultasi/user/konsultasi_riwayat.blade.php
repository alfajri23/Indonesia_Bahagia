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
                    <div class="card-body pb-0">
                        <div class="row">
                            @forelse ($datas as $data)
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-4 border p-3 rounded-xxl">
                                <h6 class="font-md fw-700 text-grey-700 mb-0">{{$data->nama}}</h6>
                                <h6 class="font-xss fw-600 text-grey-700 mb-3">{{$data->nama_konsultan}}</h6>
                                
                                <h6 class="font-xssss text-grey-600 fw-600 mb-1"><i class="ti-time mr-1"></i> {{$data->jam}}</h6>
                                <h6 class="font-xssss text-grey-600 fw-600"><i class="ti-calendar mr-1"></i> {{date_format(date_create($data->tanggal),"d M Y")}}</h6> 
                                <span class="badge bg-whatsup float-end">{{$data->status}}</span>
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