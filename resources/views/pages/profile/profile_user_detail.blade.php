@extends('layouts.layout_user')
@section('content')

<section>
    <div class="page-nav bg-lightblue pt-lg--7 pb-lg--7 pb-5 pt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h1 class="text-grey-800 fw-700 display3-size">Profile 
                    </h1>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-4">
        <div class="row">
            <div class="">
                <div class="">
                    <div class="row flex-column-reverse flex-sm-row g-0">
                        <div class="col-12 col-md-8">
                            <form id="contact" action="{{route('profileUpdate')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body py-0">
                            <div class="row">
                                <fieldset>
                                    <label for="exampleInputEmail1" class="lh-30 font-xss mont-font text-grey-800 fw-600 mt-3 mb-0">Nama</label>
                                    <input type="text" name="name" value="{{$user->name}}" placeholder="Nama" autocomplete="on">
                                </fieldset>

                                <fieldset>
                                    <label for="exampleInputEmail1" class="lh-30 font-xss mont-font text-grey-800 fw-600 mt-3">Deskripsi</label>
                                    <textarea name="desc" placeholder="Deskripsi diri kamu">{{$user->desc}}</textarea>
                                </fieldset>

                                <fieldset>
                                    <label for="exampleInputEmail1" class="lh-30 font-xss mont-font text-grey-800 fw-600 mt-3">Email</label>
                                    <input type="email" value="{{$user->email}}" name="email" placeholder="Email" autocomplete="on">
                                </fieldset>

                                <fieldset>
                                    <label for="exampleInputEmail1" class="lh-30 font-xss mont-font text-grey-800 fw-600 mt-3">Telepon</label>
                                    <input type="tel" value="{{$user->telepon}}" name="telepon" placeholder="Telepon" autocomplete="on">
                                </fieldset>

                                <fieldset>
                                    <label for="exampleInputEmail1" class="lh-30 font-xss mont-font text-grey-800 fw-600 mt-3">Tanggal lahir</label>
                                    <input type="date" value="{{$user->tgl_lahir}}" name="tgl_lahir" placeholder="Tanggal lahir" autocomplete="on">
                                </fieldset>

                                <fieldset>
                                    <label for="exampleInputEmail1" class="lh-30 font-xss mont-font text-grey-800 fw-600 mt-3">Alamat</label>
                                    <input type="text" value="{{$user->alamat}}" name="alamat" placeholder="Alamat" autocomplete="on">
                                </fieldset>

                                <fieldset>
                                    <label for="exampleInputEmail1" class="lh-30 font-xss mont-font text-grey-800 fw-600 mt-3">Pekerjaan</label>
                                    <input type="text" value="{{$user->pekerjaan}}" name="pekerjaan" placeholder="Pekerjaan" autocomplete="on">
                                </fieldset>

                                <fieldset>
                                    <label for="exampleInputEmail1" class="lh-30 font-xss mont-font text-grey-800 fw-600 mt-3">Pendidikan</label>
                                    <input type="text" value="{{$user->pendidikan}}" name="pendidikan" placeholder="Pendidikan" autocomplete="on">
                                </fieldset> 

                                <fieldset>
                                    <label for="exampleInputEmail1" class="lh-30 font-xss mont-font text-grey-800 fw-600 mt-3">Password</label>
                                    <input type="password" name="password" placeholder="Password" autocomplete="on">
                                </fieldset>  
                            </div>

                            </div>
                        </div>
                        <div class="col-12 col-md-3">
                            <img src="{{$user->foto != null ? asset($user->foto) : 'https://via.placeholder.com/150'}}" class="img-fluid rounded-start" alt="...">
                            <div class="custom-file mt-3">
                                <input type="file" class="custom-file-input" name="foto">
                                <label class="custom-file-label" for="customFile">Upload foto</label>
                            </div>
                        </div>
                        
                        
                    </div>

                    <div class="col-10 my-3">
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </div>

                    </form>

                </div>
            </div>

            
        </div>
    </div>
    

</section>


@endsection