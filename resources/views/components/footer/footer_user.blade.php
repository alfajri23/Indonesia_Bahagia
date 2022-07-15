<!-- Footer -->
<footer class="site-footer text-uppercase footer-white">
    <div class="footer-top">
      <div class="container-md saf-footer">
        <div class="row">
          <div class="col-md-6 col-lg-6 col-sm-6 footer-col-4">
            <div class="widget widget_getintuch">
              <h5 class="m-b30 ">{{$data->nama}}</h5>
              <p>{{$data->desc}}</p>
              <ul>
                <li>
                  <i class="ti-location-pin"></i>
                  <strong>Alamat</strong>
                  {{$data->alamat}}
                </li>
                <li>
                  <i class="ti-mobile"></i>
                  <strong>Telepon</strong>
                  <a class="text-dark" href="https://api.whatsapp.com/send?phone=6285856561200">
                    {{$data->telepon_1}} (24/7 Support Line)
                  </a>
                </li>
                <li>
                  <i class="ti-email"></i>
                  <strong>email</strong>
                  <a class="text-dark text-lowercase" href="mail:{{$data->email}}">{{$data->email}}</a>
                </li>
              </ul>
            </div>
          </div>
          
          <div class="col-md-6 col-lg-3 col-sm-6 footer-col-4 my-5 my-sm-0">
            <div class="widget widget_services border-0">
              <h5 class="m-b30">Bantuan</h5>
              <ul>
                <li><a href="{{route('about')}}">Tentang</a></li>
                <li><a href="{{route('termCondition')}}">Syarat dan kebijakan</a></li>
                <li><a href="{{route('privacy')}}">Privacy Policy</a></li>
              </ul>
            </div>
          </div>
          
          <div class="col-md-6 col-lg-3 col-sm-6 footer-col-4">
            <div class="widget widget_services border-0">
              <h5 class="m-b30">Layanan</h5>
              <ul>
                <li><a href="{{route('blogUser')}}">Blog</a></li>
                <li><a href="{{route('tipeKonsultasi')}}">Konsultasi</a></li>
                <li><a href="{{route('forum')}}">Forum</a></li>
                <li><a href="{{route('event')}}">Event</a></li>
                <li><a href="{{route('kelas')}}">Kelas</a></li>
              </ul>
            </div>
          </div>

          
        </div>
      </div>
    </div>
    
  </footer>
  <!-- Footer END -->
  