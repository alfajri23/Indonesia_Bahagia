<!-- footer wrapper -->
<div class="footer-wrapper mt-0 bg-dark pt--lg-5">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="row">

                    <div class="col-12 col-md-6">
                        <a href="index.html">
                            <h1 class="fredoka-font ls-3 fw-700 text-white font-xxl">{{$data->nama}}
                            <span class="d-block font-xsssss ls-1 text-grey-500 open-font ">Online Learning Course</span>
                            </h1></a>
                        <p class="w-100 mt-5">{{$data->desc}} 
                            <br>{{$data->email}}
                        </p>

                        <p>{{$data->telepon_1}}</p>
                        <p>{{$data->telepon_2}}</p>
                        <p>{{$data->telepon_3}}</p>
                        
                    </div>


                    {{-- <div class="col-12 col-md-2">
                        <h5>Channel</h5>
                        <ul>
                            <li><a href="#">Makeup</a></li>
                            <li><a href="#">Dresses</a></li>
                            <li><a href="#">Girls</a></li>
                            <li><a href="#">Sandals</a></li>
                            <li><a href="#">Headphones</a></li>
                        </ul>
                    </div> --}}

                    {{-- <div class="col-12 col-md-2">
                        <h5>About</h5>
                        <ul>
                            <li><a href="#">FAQ</a></li>
                            <li><a href="#">Term of use</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Feedback</a></li>
                            <li><a href="#">Careers</a></li>
                        </ul>
                    </div> --}}

                    <div class="col-12 col-md-2">
                        <h5 class="mb-3">Alamat</h5>
                        <p class="w-100">{{$data->alamat}}
                    </div>

                </div>
                <div class="middle-footer mt-5 pt-4"></div>
            </div>
            
            <div class="col-sm-12 lower-footer pt-0"></div>
            <div class="col-sm-6 col-xs-12">
                <p class="copyright-text">© 2021 copyright. All rights reserved.</p>
            </div>
            <div class="col-sm-6 col-xs-12 text-right">
                <p class="copyright-text float-right">Design by <a href="#" class="">uitheme</a></p>
            </div>
        </div>
    </div>
</div>
<!-- footer wrapper -->