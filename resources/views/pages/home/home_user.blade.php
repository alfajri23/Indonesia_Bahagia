@extends('layouts.layout_user')
@section('content')

<div class="banner-wrapper vh-md-100 layer-after app-shape ">
  <div class="container">
    <div class="section-full">
      <div class="row">
          <div class="col-xxxl-7 col-xl-7 vh-md-100 pt-7 pb-7 align-items-center d-flex order-2 order-sm-1">
            <div class="">
              <h2 class="font-50">Expand Your Knowledge & Acheive Your Goal</h2>
              <p class="font-16">There are many variations of passages of Lorem Ipsum typesetting industry has been the industry's standard dummy text ever since the been when an unknown printer.</p>
            </div>
          </div>
          <div class="col-xxxl-5 col-xl-4 vh-md-100 align-items-center d-flex order-1 order-sm-2">
              <div class="card w-100 border-0 bg-transparent text-center d-block">
                  <img src="https://images.unsplash.com/photo-1524293568345-75d62c3664f7?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=411&q=80" alt="app-bg" class="w-100 rounded-xl os-init" data-aos="zoom-in" data-aos-delay="300" data-aos-duration="500">    
              </div>
          </div>
      </div>
    </div>
  </div>
</div>

<div class="feature-wrapper layer-after pb-lg--7 py-5">
  <div class="container">
      <div class="row justify-content-center">
        <h2 class="text-grey-700 fw-700 display1-size display1-sm-size pb-3 mb-0 mt-3 d-block lh-3 text-center mb-5">
          Seberapa <span class="text-green">bahagiakah</span>
          <br>kamu hari ini
        </h2>
          <div class="col-xl-10 col-lg-12 pb-lg--5">
              <div class="row">
                  <div class="col-lg-3 col-md-3 col-xss-6 text-center">
                      <img src="{{asset('images/4.jpg')}}" class="w_150" alt="" srcset="">
                      <h4 class="font-xs text-success fw-700 mt-2">100</h4>
                  </div>

                  <div class="col-lg-3 col-md-3 col-xss-6 text-center">
                      <img src="{{asset('images/3.jpg')}}" class="w_150" alt="" srcset="">
                      <h4 class="font-xs text-messenger fw-700 mt-2">80</h4>
                  </div>

                  <div class="col-lg-3 col-md-3 col-xss-6 text-center">
                    <img src="{{asset('images/2.jpg')}}" class="w_150" alt="" srcset="">
                    <h4 class="font-xs text-ornage fw-700 mt-2">60</h4>
                </div>

                <div class="col-lg-3 col-md-3 col-xss-6 text-center">
                  <img src="{{asset('images/1.jpg')}}" class="w_150" alt="" srcset="">
                  <h4 class="font-xs text-danger fw-700 mt-2">40</h4>
              </div>

                  
              </div>
          </div>
      </div>


      
  </div>
</div>

<div class="feature-wrapper layer-after pb-lg--7 pb-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="page-title style1 col-xl-6 col-lg-8 col-md-10 text-center mb-5">
          <h2 class="text-grey-900 fw-700 font-xxl pb-3 mb-0 mt-3 d-block lh-3 text-center">Selalu ada cara untuk bahagia</h2>
      </div>
    </div>

    <div class="row">
      @forelse ($layanans as $layanan)
      <div class="col-lg-4 col-md-6">
          <div class="card mb-4 w-100 border-0 pt-4 pb-4 pr-4 pl-7 shadow-xss rounded-lg aos-init" data-aos="zoom-in" data-aos-delay="100" data-aos-duration="500">
              <i class="fas fa-laugh-wink text-success font-xl position-absolute left-15 ml-2"></i>
              <a href="{{route('tipeKonsultasi',['tipe' => $layanan->id])}} " class="fw-700 font-xss text-grey-900 mt-1">{{$layanan->nama}}</a>
              
          </div>
      </div>
        
      @empty  
      @endforelse
    </div>


  </div>
</div>

<div class="feature-wrapper layer-after my-5  pt-lg--7 pt-5 mt-4">
  <div class="container">
        <div class="row">
          <div class="col-lg-4 order-lg-2 offset-lg-1">
            <img src="https://images.unsplash.com/photo-1623121181613-eeced17aea39?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=580&q=80" alt="image" class="img-fluid pr-5 rounded-xl">
          </div>

          
          <div class="col-lg-6 order-lg-1">
              <span class="font-xsssss mt-2 fw-700 pl-3 pr-3 lh-32 text-uppercase rounded-xl ls-2 alert-success d-inline-block text-success aos-init" data-aos="fade-up" data-aos-delay="200" data-aos-duration="500">Event</span>
              <h2 class="poppins text-grey-900 fw-700 display1-size display1-sm-size pb-3 mb-0 mt-3 d-block lh-3 aos-init" data-aos="fade-up" data-aos-delay="200" data-aos-duration="500">Event konsultasi mental</h2>
              <p class="fw-400 font-xss lh-28 text-grey-600 aos-init" data-aos="fade-up" data-aos-delay="300" data-aos-duration="500">Kamu Bisa Ngobrol Langsung Sama Psikolog dan berkonsultasi atas masalahmu selama ini</p>
              <a href="{{route('event')}}" class="btn border-0 bg-warning p-2 text-white fw-600 rounded-lg d-inline-block font-xssss btn-light mt-3 w150 aos-init" data-aos="fade-up" data-aos-delay="100" data-aos-duration="200">Yuk daftar sekarang</a>
          </div>
          
        </div>
  </div>
</div>

<div class="feedback-wrapper  pb-5 pt-5">
  <div class="container">
      <div class="row">
          <div class="col-lg-6 text-left mb-5 pb-0">
              <h2 class="text-grey-800 fw-700 display1-size display2-md-size lh-2">Apa kata mereka</h2>
          </div>
      
          <div class="col-lg-12">
              <div class="feedback-slider owl-carousel owl-theme overflow-visible dot-none right-nav pb-4">
                @forelse ($testimonis as $testi)
                <div class="owl-items text-center">
                    <div class="card w-100 p-5 text-left border-0 shadow-xss rounded-lg">
                        <div class="card-body pl-0 pt-0">
                            <img src="{{ $testi->user->foto != null ? asset($testi->user->foto) : 'https://asia.ifoam.bio/wp-content/uploads/2018/06/image-placeholder.jpeg'}}" alt="user" class="w45 float-left mr-3">
                            <h4 class="text-grey-900 fw-700 font-xsss mt-0 pt-1">{{$testi->user->name}}</h4>    
                        </div>
                        <p class="font-xsss fw-400 text-grey-600 lh-28 mt-0 mb-0 ">{{$testi->pesan}}</p>
                    </div>
                </div>            
                @empty    
                @endforelse
              </div>
          </div>
      </div>
  </div>
</div>

@endsection