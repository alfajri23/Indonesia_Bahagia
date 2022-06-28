<!-- footer wrapper -->
<div class="footer-wrapper mt-0 bg-dark pt--lg-5">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="row">

                    <div class="col-12 col-md-6">
                        <a href="index.html">
                            <h1 class="font-xs ls-3 fw-700 text-white font-xxl">{{$data->nama}}
                            <span class="d-block font-xsssss ls-1 text-grey-500 open-font ">Menuju indonesia bahagia seutuhnya</span>
                            </h1></a>
                        <p class="w-100 mt-3">{{$data->desc}} 
                            <br>{{$data->email}}
                        </p>

                        <p>{{$data->telepon_1}}</p>
                        <p>{{$data->telepon_2}}</p>
                        <p>{{$data->telepon_3}}</p>
                        
                    </div>


                    <div class="col-md-3 col-12">
                        <h5 class="font-xs">Bantuan</h5>
                        <ul>
                            <li><a href="{{route('about')}}">Tentang</a></li>
                            <li><a href="{{route('termCondition')}}">Syarat dan kebijakan</a></li>
                            <li><a href="{{route('privacy')}}">Privacy Policy</a></li>
                        </ul>
                    </div>

                    <div class="col-md-3 col-12">
                        <h5 class="mb-3 font-xs">Kantor</h5>
                        <p class="w-100">{{$data->alamat}}</p>
                    
                        <h5 class="mb-3 font-xs">Kontak</h5>
                        <p class="mb-0">Telepon : {{$data->telepon_1}}</p>
                        <p class="mb-0">Whatsapp : <a href="https://api.whatsapp.com/send?phone=6285856561200">+6285856561200</a></p>
                        <p>Email : <a href="mail:{{$data->email}}">{{$data->email}}</a></p>

                    </div>

                </div>
                <div class="middle-footer mt-5 pt-4"></div>
            </div>
            
            <div class="col-sm-12 lower-footer pt-0"></div>
            <div class="col-sm-6 col-xs-12">
                <p class="copyright-text">© 2022 copyright. All rights reserved.</p>
            </div>
            
        </div>
    </div>
</div>
<!-- footer wrapper -->