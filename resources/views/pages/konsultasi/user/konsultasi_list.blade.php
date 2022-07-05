@extends('layouts.layout_user')
@section('content')

<div class="blog-page pt-lg--7 pb-lg--7 pt-5 pb-5 bg-white">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-xxl-9 col-lg-8 mx-auto">

                <div class="row">
                    <div class="col-6">
                        <div class="form-group mb-1">
                            <label class="fw-700 text-grey-900">Cari</label>
                        </div>
                        <div class="form-group icon-input mb-0">
                            <input type="text" class="form-control style1-input pl-5 border-size-md border-light font-xsss" placeholder="To search type and hit enter">
                            <i class="ti-search text-grey-500 font-xs"></i>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group mb-1">
                            <label class="fw-700 text-grey-900">Tipe</label>
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
                </div>

                <h4 class="font-xs fw-700 text-grey-900 d-block my-3">{{$jenis}}</h4>
                <div class="mt-3">
                    @forelse ($datas as $data)   
                    <div class="card shadow-xss rounded-lg border-0 p-4 mb-4">
                        <div class="d-flex">
                            <div class="col-4 col-sm-2 text-left">
                              <img class="lozad avatar rounded-circle w-100" data-src="{{ $data->foto != null ? asset($data->foto) : 'https://asia.ifoam.bio/wp-content/uploads/2018/06/image-placeholder.jpeg'}}" alt="...">
                            </div>
                            <div class="col-8 col-sm-10 pl-4 d-flex aligh-items-center">
                                <div class="content">
                                    <h6 class="author-name font-xs fw-700 mb-0 text-grey-800">{{$data->nama}}</h6>
                                    <a href="{{route('detailKonsultasi',$data->id)}}" class="comment-text lh-24 fw-500 font-xssss text-grey-500 mt-2">Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty  
                    <div class="row">
                        <img data-src="https://img.freepik.com/free-vector/empty-concept-illustration_114360-1233.jpg?t=st=1656991365~exp=1656991965~hmac=880daf368824c3ea4c6a3cce69972436c9386f670f1cacfa5160c8d9231de87d&w=740" class="img-responsive lozad" alt="">
                    </div>
                    <h6 class="font-xs text-center fw-700 mb-0 text-grey-800">Tidak ada konsultan</h6>

                    @endforelse

                </div>
            </div>
{{-- 
            <div class="col-xl-4 col-xxl-3 col-lg-4">

            </div> --}}

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