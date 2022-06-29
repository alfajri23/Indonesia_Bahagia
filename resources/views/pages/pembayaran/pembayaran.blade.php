@extends('layouts.layout_user')
@section('content')

<div class="page-nav pt-lg--7 pb-lg--7 pb-5 pt-5">
    <div class="container">
        <div class="row">
            <div class="card w-100 border-0 bg-white shadow-xs p-0 mb-4">
                <div class="card-body p-lg-5 p-4 w-100 border-0">
                    <div class="row">
                        <div class="col-lg-5 order-2 order-sm-1">
                            <div class="col-lg-12 pl-0">
                                <h4 class="mb-4 font-lg fw-700 mont-font mb-2">Upload Bukti Pembayaran</h4>

                                <ul class="font-xssss text-grey-800 fw-600">
                                    <li>BCA : No. Rek. 8030112343 A. N. Tri Astuti</li>
                                    <li>BRI : No. Rek. 144701001148505 A. N. Tri Astuti</li>
                                    <li>BNI : No. Rek. 0850844796 A. N. Tri Astuti</li>
                                    <li>Mandiri : No. Rek. 1360010201660 A. N. Tri Astuti</li>
                                    <li>EWALLET= GOPAY, OVO, DANA : 08579993240 A.N. Tri Astuti</li>
                                </ul>


                                <div class="custom-file mt-3">
                                    <label class="font-weight-bold text-grey-800" for="customFile">Bukti pembayaran</label><br>
                                    <input type="file" name="bukti" class="" id="customFile" required>
                                    <small class="form-text text-muted">
                                        Format file yang diterima pdf, jpg, png, jpeg | Max 5 Mb
                                    </small>
                                </div>

                            </div>
                            <div class="cleafrfix"></div>

                            <a href="#" class="rounded-lg bg-success mb-2 mt-4 p-3 w-100 fw-600 fw-700 text-center font-xssss mont-font text-uppercase ls-3 text-white d-block">Pesan</a>

                        </div>

                        <div class="col-lg-6 offset-lg-1 mb-5">
                            <div class="rounded-xxl bg-greylight h-100 p-5">
                                <div class="col-lg-12 pl-0">
                                    <!-- <h4 class="mb-4 font-xs fw-700 mont-font mt-0">Add Card </h4> -->
                                </div>
                                <div class="col-lg-12">
                                    <img src="https://images.unsplash.com/photo-1500989145603-8e7ef71d639e?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=876&q=80" alt="blog-image" class="img-fluid rounded-lg">
                                </div> 

                                <div class="col-lg-12 mt-2">
                                    <form>
                                        <div class="form-group mb-1">
                                            <label class="text-dark-color text-grey-600 font-xssss mb-2 fw-600" for="exampleInputPassword1">Nama</label>
                                            <h4 class="mb-2 font-sm fw-600 mont-font">{{$data->nama}}</h4>
                                        </div>

                                        <div class="form-group mb-1">
                                            <label class="text-dark-color text-grey-600 font-xssss mb-2 fw-600" for="exampleInputPassword1">Harga</label>
                                            <h4 class="mb-2 font-sm fw-600 mont-font">Rp. {{number_format($data->harga)}}</h4>
                                        </div>

                                        <div class="form-group mb-1">
                                            <label class="text-dark-color text-grey-600 font-xssss mb-2 fw-600" for="exampleInputPassword1">Tanggal</label>
                                            <h4 class="mb-2 font-sm fw-600 mont-font">{{now()}}</h4>
                                        </div>

                                    </form>
                                </div>       
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection