@extends('layouts.layout_user')
@section('content')

<div class="blog-page pt-lg--7 pb-lg--7 pt-5 pb-5 bg-white">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-xxl-9 col-lg-8 mx-auto">
                <div class="row mt-5 pt-3">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-lg-2">
                                <figure class="avatar ml-0 mb-4 position-relative w100 z-index-1">
                                    <img src="{{ $data->foto != null ? asset($data->foto) : 'https://asia.ifoam.bio/wp-content/uploads/2018/06/image-placeholder.jpeg'}}" alt="image" class="float-right p-1 bg-white w-100">
                                </figure>
                            </div>
                            <div class="col-lg-6">                 
                                <h4 class="fw-700 font-lg text-dark mb-1">{{$layanans->nama}}</h4>  
                                <h6 class="fw-400 font-xsss">Bersama</h6>
                                <h4 class="fw-500 font-xs text-dark my-1">{{$data->nama}}<i class="ti-check font-xssss btn-round-xs bg-success text-white ml-1"></i></h4>
        
                            </div>
                        </div>
                    </div>
                </div>
                </div>

                <div class="row mt-3 pt-3">
                    <div class="card">
                        <div class="card-body p-3">
                            <h2 class="fw-600 font-sm mb-2">Jadwal</h2>
                            <form action="{{route('createJanji')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div>
                                <input type="text" value="{{$layanans->id}}" name="id_layanan" id="id_layanan" hidden>
                                <input type="text" value="{{$data->id}}" name="id_konsultan" id="id_konsultan" hidden>
                                <input type="text" name="jam" id="jam" hidden>
                                <input type="text" name="tanggal" id="tanggal" hidden>
                                <input type="text" name="hari" id="hari" hidden>
                            </div>
                            <div class="container">
                                @forelse ($jadwal_final as $key => $jadwal)
                                <div class="my-4">
                                    <h4 class="fw-600 font-xss mt-1 mb-3">
                                        <i class="ti-calendar mr-2 border"></i>
                                        {{$jadwal['hari']}},{{$jadwal['tanggal_full']}}</h4>
                                        <div class="row">
                                            @forelse ($jadwal['jadwal'] as $jam)
                                            <a class="col-6 col-sm-2 cursor-pointer" onclick="selectJadwal('{{$jadwal['tanggal']}}','{{$jadwal['hari']}}','{{$jam['jam']}}')">
                                                <div class="card">
                                                    <div class="card-body p-2">
                                                    <h5 class="card-title mb-0 text-center">{{$jam['jam']}}</h5>
                                                    </div>
                                                </div>
                                            </a> 
                                            @empty 
                                            @endforelse
                                        </div>
                                    </div>
                                @empty 
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-5 pt-3">
                    <h2 class="fw-600 font-sm mb-2">Tulis keluhan awal Anda</h2>
                    <div class="container">
                        <div class="form-check ms-1">
                            <input class="form-check-input" type="checkbox" value="1" name="lanjutan" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">
                              Saya klien lanjutan
                            </label>
                        </div>
                        <textarea class="form-control textarea" name="masalah" rows="10"></textarea>

                    </div>
                    <div>
                        <button type="submit" class="ml-1 mr-1 rounded-lg alert-primary text-primary font-xss border-size-md border-0 fw-600 open-font p-3 w200 btn">Pesan sekarang</button>
                    </div>
                    </form>
                </div>


                
            </div>
        </div>
    </div>
</div>

<script>
    function selectJadwal(tanggal,hari,jam){
        $('#tanggal').val(tanggal);
        $('#hari').val(hari);
        $('#jam').val(jam);
    }
</script>

@endsection