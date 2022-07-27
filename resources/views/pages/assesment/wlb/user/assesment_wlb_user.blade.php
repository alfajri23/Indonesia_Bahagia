<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Swiper demo</title>
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1"
    />
    <!-- Link Swiper's CSS -->
    <link
      rel="stylesheet"
      href="https://unpkg.com/swiper/swiper-bundle.min.css"
    />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Demo styles -->
    <style>
      html,
      body {
        position: relative;
        height: 100%;
      }

      body {
        background: #eee;
        font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
        font-size: 14px;
        color: #000;
        margin: 0;
        padding: 0;
      }

      .swiper {
        width: 100%;
        height: 100%;
      }

      /* .swiper-btn-next{
        background-color: #007aff;
      }

      .swiper-btn-prev{
        background-color: #007aff;
      } */

      .swiper-container{
        position: absolute;
        bottom: 50px;
        color: rgb(37, 39, 39);
        font-size: 40px;
        z-index: 5;
        display: flex;
        justify-content: center;
        width: 100%;
      }

      .swiper-slide {
        text-align: center;
        font-size: 18px;
        background: #fff;

        /* Center slide text vertically */
        display: -webkit-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        -webkit-justify-content: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        -webkit-align-items: center;
        align-items: center;
      }

      .swiper-slide img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
      }

      .swiper-pagination-bullet {
        width: 20px;
        height: 20px;
        text-align: center;
        line-height: 20px;
        font-size: 12px;
        color: #000;
        opacity: 1;
        background: rgba(0, 0, 0, 0.2);
      }

      .swiper-pagination-bullet-active {
        color: #fff;
        background: #007aff;
      }
    </style>
  </head>

  <body>
    {{-- <div class="container"> --}}

      <!-- Swiper -->
      <div class="swiper mySwiper">
        <div class="swiper-wrapper">
          @forelse ($datas as $dt)
          <div class="swiper-slide">
            <div class="container">
              <p class="fw-bold">{{$loop->iteration}}. {{$dt->pertanyaan}}</p>
              <div class="d-flex flex-column">
                <button onclick="change({{$loop->iteration}},'{{$dt->tipe}}',1)" id="{{$loop->iteration}}.1" data-btn="{{$dt->tipe}}" class="btn btn-md btn-outline-dark px-5 py-3 shadow-sm swiper-next" style="display: block; margin: 5px 0;">
                  Setuju
                </button>
                <button onclick="change({{$loop->iteration}},'{{$dt->tipe}}',0)" id="{{$loop->iteration}}.0" data-btn="{{$dt->tipe}}" class="btn btn-md btn-outline-dark px-5 py-3 shadow-sm swiper-next" style="display: block;">
                  Tidak Setuju
                </button>
              </div>
            </div>
          </div>

          @empty
          @endforelse
  
          <div class="swiper-slide">
            <form id="formTest" action="{{ route('doneWLB')}}" method="post">
              @csrf
              <input type="hidden" id="resultTest" name="values" value="">
            </form>
            <button onclick="send()" class="btn btn-md d-block btn-outline-success px-5 py-3 shadow-sm">
              Selesai
            </button>
          </div>
          
        </div>
  
        <div class="swiper-container">
          {{-- <div class="btn mx-1 btn-sm btn-primary text-white swiper-btn-prev">
            <i class="fa-solid fa-arrow-left"></i> 
            Sebelumnya
          </div> --}}
          {{-- <div class="btn mx-1 btn-lg btn-dark swiper-btn-next swiper-next btn-next disabled"><i class="fa-solid fa-arrow-right"></i></div> --}}
        </div>
  
        <div class="swiper-pagination"></div>
      </div>
    {{-- </div> --}}

    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
      var swiper = new Swiper(".mySwiper", {
        allowTouchMove: false,
        navigation: {
          nextEl: ".swiper-next",
          prevEl: ".swiper-btn-prev",
        },
        pagination: {
          el: ".swiper-pagination",
          // type: "progressbar",
          // type: "fraction",
        }
      });
    </script>

    <script>
      let data = [];
      let ids;

                    //loop,value,(1/2)
      function change(index,value,id){

        ids = id == 1 ? 0 : 1;

        let main = document.getElementById( index +"." +id );
        let second = document.getElementById( index +"."+ids ); 

        if(second.classList.contains("btn-secondary")){
          second.classList.toggle("btn-secondary");
        }
        
        main.classList.toggle("btn-secondary"); 

        if(value == 0 && id == 1){  //jika mines tapi dipilih
            data[index-1] = 1;
        }else if(value == 0 && id == 0){
            data[index-1] = 0;
        }else{
            data[index-1] = 0;
        }
        console.log(data);

      }

      function send(){
        let dataTidakSeimbang = 0;
        let arr = document.getElementById('resultTest');
        let result_data;

        for(let i = 0; i < data.length; i++){
            if(data[i] == 1){
                dataTidakSeimbang++;
            }
        }

        arr.setAttribute('value',dataTidakSeimbang);

        console.log(dataTidakSeimbang);
        
        document.getElementById('formTest').submit();
      }

      

    </script>
  </body>

  
</html>
