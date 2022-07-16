@extends('layouts.layout_user')
@section('content')

<style>
    .radio {
        display: inline-block;
        border-radius: 0;
        box-sizing: border-box;
        cursor: pointer;
        color: #000;
        font-weight: 500;
        -webkit-filter: grayscale(100%);
        -moz-filter: grayscale(100%);
        -o-filter: grayscale(100%);
        -ms-filter: grayscale(100%);
        filter: grayscale(100%);
    }

    .radio:hover {
        box-shadow: 2px 2px 2px 2px rgba(10, 48, 67, 0.1);
    }

    .radio.selected {
        box-shadow: 0px 8px 16px 0px #EEEEEE;
        -webkit-filter: grayscale(0%);
        -moz-filter: grayscale(0%);
        -o-filter: grayscale(0%);
        -ms-filter: grayscale(0%);
        filter: grayscale(0%);
        background-color: #E0F2F1;
    }

    .selected {
        
    }
</style>

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
                    <h3 class="mb-1">{{$layanans->nama}}</h3>
                    <p class="mb-0">Bersama</p>
                    <p class="mb-1">{{$data->nama}}</p>
                </div>
            </div>

            <div class="row mt-3 pt-3">
                <div class="card">
                    <div class="card-body p-3">
                        <h5 class="mb-2">Jadwal</h5>
                        <form action="{{route('createJanji')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <input type="text" value="{{$layanans->id}}" name="id_layanan" id="id_layanan" hidden>
                            <input type="text" value="{{$data->id}}" name="id_konsultan" id="id_konsultan" hidden>
                            <input type="text" name="jam" id="jam" hidden>
                            <input type="text" name="tanggal" id="tanggal" hidden>
                            <input type="text" name="hari" id="hari" hidden>
                        </div>
                        <div class="row radio-group ">
                            @forelse ($jadwal_final as $key => $jadwal)
                            <div class="my-4">
                                <h6 class="mt-1 mb-3">
                                    <i class="ti-calendar mr-2 border"></i>
                                    {{$jadwal['hari']}},{{$jadwal['tanggal_full']}}
                                </h6>
                                    <div class="row">
                                        @forelse ($jadwal['jadwal'] as $jam)
                                        <a class="col-6 col-sm-2 cursor-pointer" onclick="selectJadwal('{{$jadwal['tanggal']}}','{{$jadwal['hari']}}','{{$jam['jam']}}')">
                                            <div class="card radio w-100">
                                                <div class="card-body p-2">
                                                <p class="card-title mb-0 text-center">{{$jam['jam']}}</p>
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
                <h5 class="mb-2">Tulis keluhan awal Anda</h5>
                <div class="container-md">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" name="lanjutan" id="defaultCheck1">
                        <label class="form-check-label" for="defaultCheck1">
                            Saya klien lanjutan
                        </label>
                    </div>
                    <div class="input-group">
                        <textarea name="dzMessage" name="masalah" rows="10" class="form-control" placeholder="Tuliskan keluhan anda"></textarea>
                    </div>

                </div>
                <div>
                    <button type="submit" class="btn btn-info mt-2">Pesan sekarang</button>
                    
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('.radio-group .radio').click(function () {
            $('.selected .fa').removeClass('fa-check');
            $('.radio').removeClass('selected');
            $(this).addClass('selected');
        });
    });

    function selectJadwal(tanggal,hari,jam){
        $('#tanggal').val(tanggal);
        $('#hari').val(hari);
        $('#jam').val(jam);
    }

    
</script>

@endsection