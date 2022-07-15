@extends('layouts.layout_user')
@section('content')

<div class="page-content bg-gray">

    <div class="dlab-bnr-inr overlay-black-middle bg-pt" style="background-image:url(images/banner/bnr4.jpg);">
        <div class="container">
            <div class="dlab-bnr-inr-entry">
                <h1 class="text-white">Konsultasi</h1>
                <!-- Breadcrumb row -->
                <div class="breadcrumb-row">
                    <ul class="list-inline">
                        <li><a href="index.html">layanan</a></li>
                        <li>konsultasi</li>
                    </ul>
                </div>
                <!-- Breadcrumb row END -->
            </div>
        </div>
    </div>

    <div class="blog-page pt-lg--7 pb-lg--7 pt-5 pb-5 bg-white">
        <div class="container">
            <div class="row">

                <div class="col-6">
                    <div class="">
                        <h4 class="widget-title">Search</h4>
                        <form action="{{route('tipeKonsultasi')}}" class="searchform" id="searchform" method="get" role="search">
                            <div>
                                <label for="s" class="screen-reader-text">Search for:</label>
                                <input type="text" id="s" name="cari" value="">
                                <input type="submit" value="Search" id="searchsubmit">
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-4">
                    {{-- <div>
                        <div class="widget bg-white p-a20 monster-widget-placeholder-2 widget_archive">
                            <h4 class="widget-title">Archives Dropdown</h4>
                            <label for="archives-dropdown--1" class="screen-reader-text">Archives Dropdown</label>
                            <select onChange="document.location.href={{route('tipeKonsultasi',['tipe' => this.options[this.selectedIndex].value])}};" name="archive-dropdown" id="archives-dropdown--1" class="bs-select-hidden">
                                <option value="">Select Month</option>
                                <option value="date"> May 2016 (1)</option>
                            </select>
                        </div>
                    </div> --}}

                    <div class="form-group mb-1">
                        <h4 class="widget-title">Tipe</h4>
                    </div>
                    <div class="btn-group">
                        <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Jenis konsultasi
                        </button>
                        <ul class="dropdown-menu" style="width: 300px;">
                            <li><a class="fw-600 text-grey-800 font-xsss ps-2" href="{{route('tipeKonsultasi')}}">Semua</a></li>
                            @forelse ($layanans as $layanan)
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="fw-600 text-grey-800 font-xsss ps-2" href="{{route('tipeKonsultasi',['tipe' => $layanan->id])}}">{{ $layanan->nama }}</a></li>
                            @empty
                            @endforelse
                        </ul>
                    </div>
                </div>


                <h4 class="font-xs fw-700 text-grey-900 d-block mb-3 mt-5">{{$jenis}}</h4>

                <div class="row">
                    @forelse ($datas as $data)   
                    <a href="{{route('detailKonsultasi',$data->id)}}" class="col-lg-3 col-md-6 col-sm-6">
                        <div class="dlab-box m-b30 dlab-team3 shadow-xss">
                            <div class="dlab-media">
                                <img class="lozad" data-src="{{ $data->foto != null ? asset($data->foto) : 'https://asia.ifoam.bio/wp-content/uploads/2018/06/image-placeholder.jpeg'}}" alt="">
                            </div>
                            <div class="dlab-info">
                                <h4 class="dlab-title">
                                    {{$data->nama}}
                                </h4>
                                <span class="dlab-position">psikolog</span>
                                
                            </div>
                        </div>
                    </a>
                    @empty  
                    <div class="row">
                        <img data-src="https://img.freepik.com/free-vector/empty-concept-illustration_114360-1233.jpg?t=st=1656991365~exp=1656991965~hmac=880daf368824c3ea4c6a3cce69972436c9386f670f1cacfa5160c8d9231de87d&w=740" class="img-responsive lozad" alt="">
                    </div>
                    <h6 class="font-xs text-center fw-700 mb-0 text-grey-800">Tidak ada konsultan</h6>

                    @endforelse
                    
                </div>
                
            </div>
        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/lozad/dist/lozad.min.js"></script>
<script>
    const observer = lozad();
    observer.observe();
</script>

@endsection