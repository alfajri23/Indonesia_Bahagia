@extends('layouts.layout_user')
@section('content')

<div class="banner-wrapper vh-md-100 layer-after app-shape bg-bluesoft">
  <div class="container">
      <div class="row">
          <div class="col-xxxl-7 col-xl-7 vh-md-100 pt-7 pb-7 align-items-center d-flex">
              <div class="card w-100 border-0 bg-transparent">
                  <h2 class="fw-700 text-grey-800 display5-size display4-xs-size lh-1 mb-0 aos-init" data-aos="fade-up" data-aos-delay="200" data-aos-duration="500">
                    # Semua Orang <br>Berhak <span class="text-green">Bahagia</span>
                  </h2>
                  <h3 class="font-xl font-md-xs mt-4 text-grey-700 fw-400">
                    Mari temukan kebahagiaanmu bersama kami<br>
                    Menuju Indonesia bahagia 100%
                  </h3>
                  
              </div>
          </div>
          <div class="col-xxxl-5 col-xl-4 vh-md-100 align-items-center d-flex ">
              <div class="card w-100 border-0 bg-transparent text-center d-block">
                  <img src="https://images.unsplash.com/photo-1524293568345-75d62c3664f7?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=411&q=80" alt="app-bg" class="w-100 rounded-xl os-init" data-aos="zoom-in" data-aos-delay="300" data-aos-duration="500">    
              </div>
          </div>
      </div>
  </div>
</div>

<div class="feature-wrapper layer-after pb-lg--7 py-5">
  <div class="container">
      <div class="row justify-content-center">
        <h2 class="text-grey-900 fw-700 font-md pb-3 mb-0 mt-3 d-block lh-3 text-center mb-5">We help not one,But many Companies</h2>
          <div class="col-xl-10 col-lg-12 pb-lg--5">
              <div class="row">
                  <div class="col-lg-3 col-md-3 col-xss-6 text-center">
                      <img src="{{asset('images/4.jpg')}}" class="w_150" alt="" srcset="">
                      {{-- <h4 class="font-xssss text-grey-900 fw-700 mt-2">433 rating Based</h4> --}}
                  </div>

                  <div class="col-lg-3 col-md-3 col-xss-6 text-center">
                      <img src="{{asset('images/3.jpg')}}" class="w_150" alt="" srcset="">
                      {{-- <h4 class="font-xssss text-grey-900 fw-700 mt-2">433 rating Based</h4> --}}
                  </div>

                  <div class="col-lg-3 col-md-3 col-xss-6 text-center">
                    <img src="{{asset('images/2.jpg')}}" class="w_150" alt="" srcset="">
                    {{-- <h4 class="font-xssss text-grey-900 fw-700 mt-2">433 rating Based</h4> --}}
                </div>

                <div class="col-lg-3 col-md-3 col-xss-6 text-center">
                  <img src="{{asset('images/1.jpg')}}" class="w_150" alt="" srcset="">
                  {{-- <h4 class="font-xssss text-grey-900 fw-700 mt-2">433 rating Based</h4> --}}
              </div>

                  
              </div>
          </div>
      </div>


      
  </div>
</div>

@endsection