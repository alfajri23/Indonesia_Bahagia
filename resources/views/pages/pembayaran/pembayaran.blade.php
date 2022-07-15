@extends('layouts.layout_user')
@section('content')

<style>
    .list > p{
        margin-bottom : 0.1rem !important;
    }
</style>

<div class="page-nav pt-lg--7 pb-lg--7 pb-5 pt-5">
    <div class="container-md">
        <div class="row">
           
            <div class="card-body p-lg-5 p-4 w-100 border-0">
                @if($errors)
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger">{{ $error }}</div>
                    @endforeach
                @endif
                <div class="row">
                    <div class="col-lg-5 order-2 order-sm-1">
                        <div class="col-lg-12 pl-0">
                            <form action="{{route('pembayaranBank')}}" method="post" enctype="multipart/form-data">
                            @csrf

                            <input type="text" name="janji" value="{{$janji}}" hidden>

                            <h4 class="mb-0 font-lg fw-700 mont-font">Upload Bukti Pembayaran</h4>
                            <h4 class="mb-2 font-md fw-600 mont-font ">{{$pembayaran->deskripsi}}</h4>

                            <div class="font-14 list text-dark">
                                {!! $pembayaran->isi !!}

                            </div>

                            <div class="custom-file mt-3">
                                <div class="mb-3">
                                    <label for="formFile" class="form-label text-dark mt-3">Bukti pembayaran</label>
                                    <input class="form-control" name="bukti" type="file" id="formFile" required>
                                    <small class="form-text text-muted">
                                        Format file yang diterima pdf, jpg, png, jpeg | Max 2 Mb
                                    </small>
                                </div>
                                
                                @error('bukti')
                                    <span class="" role="alert alert-danger">
                                        <small  class="text-danger">{{ $message }}</small>
                                    </span>
                                @enderror
                            </div>

                        </div>
                        <div class="cleafrfix"></div>

                        <div class="w-100">

                            <button type="submit" class="btn btn-success rounded-lg w-100">Pesan</button>
                        </div>

                    </div>

                    <div class="col-lg-6 mb-5">
                        <div class="rounded-xxl bg-greylight h-100 px-0 px-sm-5">
                            <div class="col-lg-12 pl-0">
                                <!-- <h4 class="mb-4 font-xs fw-700 mont-font mt-0">Add Card </h4> -->
                            </div>
                            <div class="col-lg-12">
                                <img src="{{$data->poster != null ? asset($data->poster) : 'https://images.unsplash.com/photo-1573497620053-ea5300f94f21?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80'}}" alt="blog-image" class="img-fluid rounded-lg">
                            </div> 

                            <div class="row mt-4">
                                <div class="col-4">
                                    <h6>Nama</h6>
                                    <h6>Produk</h6>
                                    <h6>Harga</h6>
                                    <h6>Tanggal</h6>
                                </div>
                                <div class="col-8 text-end">
                                    <h6>{{auth()->user()->name}}</h6>
                                    <h6>{{$data->nama}}</h6>
                                    <h6>Rp. {{number_format($data->harga)}}</h6>
                                    <h6>{{now()}}</h6>
                                </div>
                            </div>

                            {{-- <div class="col-lg-12 mt-2">
                                <input type="text" name="id_produk" value="{{$data->id}}" hidden>
                                <div class="form-group mb-1">
                                    <label class="text-dark-color text-grey-600 font-xssss mb-2 fw-600" for="exampleInputPassword1">Nama</label>
                                    <h4 class="mb-2 font-sm fw-600 mont-font">{{$data->nama}}</h4>
                                </div>

                                <div class="form-group mb-1">
                                    <label class="text-dark-color text-grey-600 font-xssss mb-2 fw-600" for="exampleInputPassword1">Harga</label>
                                    <h4 class="mb-2 font-sm fw-600 mont-font">Rp. {{number_format($data->harga)}}</h4>
                                </div>

                                <div class="form-group mb-1">
                                    <label class="text-dark-color text-grey-600 font-xssss mb-2 fw-600" for="exampleInputPassword1">Tanggal</label>
                                    <h4 class="mb-2 font-sm fw-600 mont-font">{{now()}}</h4>
                                </div>

                            </div>    --}}

                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


@endsection