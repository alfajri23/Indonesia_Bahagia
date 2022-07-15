@extends('layouts.layout_user')
@section('content')

<div class="page-nav pt-lg--7 pb-lg--7 pb-5 pt-5">
    <div class="container-md">
        <div class="row">

            <div class="col-12 shadow-xss">
                @include('components.tab.pembayaran.tab_pembayaran')
            </div>

            <div class="col-12 mt-5">
                <h4 class="mb-4 font-lg fw-700 mont-font mb-2">Riwayat Transaksi</h4>
                <div class="w-100">
                    @forelse ($datas as $data)
                    <div class="card shadow-xss border my-2 p-4 p-sm-5 rounded-lg">
                        <div class="">
                            @if ($data->status == 'ditolak')
                                <span class="font-xsss fw-700 pl-3 pr-3 ls-2 lh-32 badge bg-danger float-right">Ditolak</span>
                            @elseif ($data->status == 'pending')
                                <span class="font-xsss fw-700 pl-3 pr-3 ls-2 lh-32 badge bg-warning float-right">Menunggu</span>
                            @else
                                <span class="font-xsss fw-700 pl-3 pr-3 ls-2 lh-32 badge bg-success float-right">Lunas</span>
                            @endif

                            
                            <h2 class="fw-700 font-sm text-grey-900 mb-0">{{$data->nama}}</h2>
                        </div>
                        <p class="font-xsss text-grey-500 fw-500 mb-2">{{date_format(date_create($data->tanggal),"d M Y")}}</p>
                        <p class="font-xsss text-grey-700 fw-500 ">Rp. {{number_format($data->harga)}}</p>

                        <div>
                            @if($data->produk->id_kategori == 1)
                            <a href="{{route('produkDetailEnroll',$data->id_produk)}}" class="btn btn-info btn-sm fw-700 font-xsss text-white me-3">Masuk</a>
                            @endif
                            <a href="{{route('pembayaranRiwayatDetail',$data->id)}}" class="fw-700 font-xsss text-primary">Detail</a>
                        </div>
                    </div>
                        
                    @empty

                    <div class="card shadow-xss border-0 p-5 rounded-lg">
                        <h2 class="fw-700 font-sm mt-4 mb-3 text-grey-900">Belum ada transaksi</h2>
                    </div>
                        
                    @endforelse
                </div>
            </div>
            


        </div>
    </div>
</div>

@endsection