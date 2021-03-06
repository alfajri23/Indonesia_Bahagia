@extends('layouts.layout_user')


@section('content')

@if(count($banners)<1)
  <div class="banner-wrapper vh-md-100 layer-after app-shape ">
    <div class="container">
      <div class="section-full">
          <div class="row py-4">
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
@endif

@empty(!$banners)
  <div class="banner-wrapper vh-md-100 layer-after app-shape mb-4">
    <div class="container-fluid">
      <div class="section-full">
        <div class="row">
            <div class="owl-carousel px-0">
              @forelse ($banners as $banner)
              <div class="px-0">
                <div class="container-fluid back-img" 
                style="background-image: url('{{asset($banner->foto)}}')">
                </div>
              </div>  
              @empty 
              @endforelse
            </div>
        </div>
      </div>
    </div>
  </div>
@endempty


{{-- Paralax --}}
{{-- <div class="section-full bg-white content-inner-2 kinder-about-content bg-img-fix" 
style="background-image:url('https://images.unsplash.com/photo-1527174744973-fc9ce02c141d?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=874&q=80');">
  <div class="about-overlay-box"></div>
          <div class="container-md">
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-12 col-12"></div>
      <div class="col-lg-6 col-md-12 col-sm-12 col-12 wow fadeIn" data-wow-delay="0.2s"  data-wow-duration="2s">
        <div class="section-head kinder-head">
          <h2 class="head-title text-yellow"></h2>
          <p class="text-white"></p>
        </div>
      </div>
    </div>
  </div>
</div> --}}

{{-- Seberapa bahagia --}}
<div class="section-full content-inner bg-white">
  <div class="container">
    <div class="row edu-about align-items-center">
      <div class="col-lg-6 m-b30">
        <div class="section-head m-b20">
          <h2 class="title">
            Bahagia bersama
          </h2>
          <h5 class="title-small">Seberapa bahagiakah kamu hari ini</h5>
          <div class="dlab-separator bg-primary"></div>
        </div>
        <p>
          Kebahagiaan atau kegembiraan adalah suatu keadaan pikiran atau 
          perasaan yang ditandai dengan kecukupan hingga kesenangan, cinta,
           kepuasan, kenikmatan, atau kegembiraan yang intens.
        </p>
       
      </div>
      <div class="col-lg-6">
        <div class="row features-area-one">
          <div class="col-lg-6 col-md-6">

            <div class="features-box style1 bg-primary m-b30 wow bounceInUp fly-box" data-wow-duration="2s" data-wow-delay="0.3s">
              <div class="dlab-info">
                <i class="fa-solid fa-face-grin"></i>
                <h3 class="info"></h3>
                <span>Sangat bahagia</span>
              </div>
            </div>

            <div class="features-box style1 bg-secondry wow bounceInUp fly-box" data-wow-duration="2s" data-wow-delay="0.3s"">
              <div class="dlab-info">
                <i class="fa-solid fa-face-frown"></i>
                <h3 class="info"></h3>
                <span>Biasa</span>
              </div>
            </div>

          </div>

          <div class="col-lg-6 col-md-6 m-t30">

            <div class="features-box style1 bg-secondry m-b30 wow bounceInUp fly-box" data-wow-duration="2s" data-wow-delay="0.3s">
              <div class="dlab-info">
                <i class="fa-solid fa-face-smile"></i>
                <h3 class="info"></h3>
                <span>Bahagia</span>
              </div>
            </div>

            <div class="features-box style1 bg-primary m-b30 wow bounceInUp fly-box" data-wow-duration="2s" data-wow-delay="0.3s"">
              <div class="dlab-info">
                <i class="fa-solid fa-face-sad-tear"></i>
                <h3 class="info"></h3>
                <span>Sedih</span>
              </div>
            </div>

          </div>

        </div>
      </div>
    </div>
  </div>
</div>

{{-- Produk --}}
<div class="section-full content-inner bg-gray">
  <div class="container">
    <div class="section-head text-black text-center">
      <h2 class="title">Kami siap membantumu</h2>
      <p>Dengan berbagai pengalaman dan keahlian kami, kami siap membantumu</p>
    </div>
    <div class="row justify-content-center">
      <div class="col-lg-4 col-md-6 col-sm-12 m-b30 wow bounceInUp" data-wow-duration="2s" data-wow-delay="0.3s">
        <div class="icon-bx-wraper bx-style-1 p-a30 center fly-box bg-white">
          <div class="icon-lg m-b20"> 
            <span class="icon-cell text-primary">
              <i class="fa-solid fa-calendar"></i>
            </span> 
          </div>
          <div class="icon-content">
            <h5 class="dlab-tilte text-uppercase">Event</h5>
            <p>Mempertemukan kamu dengan ahli untuk saling berdiskusi</p>
            <a href="{{route('event')}}" class="site-button btnhover6">Lihat</a>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 col-sm-12 m-b30 wow bounceInUp" data-wow-duration="2s" data-wow-delay="0.6s">
        <div class="icon-bx-wraper bx-style-1 p-a30 center fly-box bg-white">
          <div class="icon-lg m-b20"> 
            <span class="icon-cell text-primary">
              <i class="fas fa-heart"></i>
            </span> 
          </div>
          <div class="icon-content">
            <h5 class="dlab-tilte text-uppercase">Konsultasi</h5>
            <p>Ngobrol bersama ahli untuk selesaikan masalahmu</p>
            <a href="{{route('tipeKonsultasi')}}" class="site-button btnhover6">Lihat</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

{{-- Motivasi --}}
<div class="section-full call-action bg-primary wow fadeIn" data-wow-duration="2s" data-wow-delay="0.9s">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-white">
        <p class="m-b0 fs-5 font-poppins text-start">
          "Kebahagiaan lebih merupakan keterampilan yang dapat kita kerjakan<br> 
          setiap hari dengan secara aktif memilih pikiran, koneksi,<br>
          dan keyakinan yang membuat kita merasa baik,??? <br> 
          <strong>Benton.</strong>
        </p>
      </div>
      
    </div>
  </div>
</div>

{{-- Testimoni --}}
<div class="section-full bg-white content-inner">
  <div class="container-md">
    <div class="row">
      <div class="col-lg-12">
        <div class="section-head text-center">
          <h5 class="text-primary">Kata mereka</h5>
          <h3 class="title">Testimoni kami</h2>
        </div>
        <div class="section-content">
          <div class="testimonial-six owl-carousel owl-btn-center-lr owl-btn-2 primary testimonial-13-area dots-style-3 owl-theme">
            @forelse ($testimonis as $testi)
            <div class="item">
              <div class="testimonial-13">
                <div class="testimonial-text">
                  <div class="quote-left"></div>
                  <p>{{$testi->pesan}}</p>
                </div>
                <div class="testimonial-detail clearfix">
                  <div class="testimonial-pic radius shadow">
                    <img src="{{ $testi->user->foto != null ? asset($testi->user->foto) : 'https://asia.ifoam.bio/wp-content/uploads/2018/06/image-placeholder.jpeg'}}" alt="">
                  </div>
                  <h5 class="testimonial-name m-t10 m-b5">{{$testi->user->name}}</h5> 
                  <span class="testimonial-position text-primary">Student</span> 
                </div>
              </div>
            </div>
            @empty    
            @endforelse
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<script>
  $(document).ready(function(){
    $(".owl-carousel").owlCarousel({
      center: true,
    items:1,
    loop:true,
    });
  });
</script>




@endsection
