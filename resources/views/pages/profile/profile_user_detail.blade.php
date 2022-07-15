@extends('layouts.layout_user')
@section('content')

<div class="page-content bg-gray">

    <div class="dlab-bnr-inr overlay-black-middle bg-pt">
        <div class="container">
            <div class="dlab-bnr-inr-entry">
                <h1 class="text-white">Profile saya</h1>
            </div>
        </div>
    </div>

    <div class="section-full content-inner-2 contact-style-3">
        <div class="container-md">
            <div class="row m-lr0 contact-form-box">

                <div class="col-lg-4 col-md-5 p-lr0 align-items-start p-5 bg-pink">
                    <div class="contact-info-inner text-white">
                        <form class="dzForm" id="contact" action="{{route('profileUpdate')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="dlab-post-media dlab-img-effect zoom-slow rounded-lg"> 
                            
                            <img src="{{$user->foto != null ? asset($user->foto) : 'https://via.placeholder.com/150'}}" alt="">
                            
                        </div>
                        <h3 class="text-uppercase mt-3">{{$user->name}}</h3>
                       
                        
                        <div class="mb-3">
                            <label for="formFile" class="form-label">
                                Foto
                            </label>
                            
                            <input type="file" class="form-control" name="foto">
                            <small id="emailHelp" class="form-text text-white">File yang diterima png,jpg,jpeg | ukuran max. 2Mb</small>
                            
                            @error('foto')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="col-lg-8 col-md-7 p-lr0">
                    <div class="contact-form bg-white">
                        <div class="section-head text-left">
                            <h3 class="title">Profil saya</h3>
                            <div class="dlab-separator bg-primary"></div>
                        </div>

                        @include('components.error.error_message')
                        <div class="dzFormMsg"></div>
                        
                            <input type="hidden" value="Contact" name="dzToDo">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label for="">Nama</label>
                                        <div class="input-group">
                                            <input type="text" name="name" value="{{$user->name}}" placeholder="Nama" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <div class="input-group"> 
                                            <input type="email" value="{{$user->email}}" name="email" placeholder="Email" class="form-control" >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label for="">Tanggal lahir</label>
                                        <div class="input-group">
                                            <input type="date" name="tgl_lahir" value="{{$user->tgl_lahir}}" placeholder="Telepon" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label for="">Pendidikan</label>
                                        <div class="input-group">
                                            <input type="text" name="pendidikan" value="{{$user->pendidikan}}" placeholder="Pendidikan" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="">Deskripsi</label>
                                        <div class="input-group">
                                            <textarea name="desc" rows="4" class="form-control" placeholder="Deskripsi">
                                                {{$user->desc}}
                                            </textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="">Telepon</label>
                                        <div class="input-group">
                                            <input type="tel" name="telepon" value="{{$user->telepon}}" placeholder="Telepon" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="">Pekerjaan</label>
                                        <div class="input-group">
                                            <input type="text" name="pekerjaan" value="{{$user->pekerjaan}}" placeholder="Telepon" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="">Alamat</label>
                                        <div class="input-group">
                                            <textarea name="alamat" rows="4" class="form-control" placeholder="Alamat">
                                                {{$user->alamat}}
                                            </textarea>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-12">
                                    <button name="submit" type="submit" value="Submit" class="site-button"> Submit </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- contact area  END -->
</div>





@endsection