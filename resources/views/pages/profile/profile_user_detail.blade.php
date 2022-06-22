@extends('layouts.layout_user')
@section('content')

<section>
    <div class="container">
        <div class="row">
            <div class="card border-md shadow mb-5">
                <div class="card-body">
                    <div class="section-heading mb-3 text-start pt-1">
                        <h4>Provided <em>Profil</em></h4>
                    </div>
                 
                    <div class="row flex-column-reverse flex-sm-row g-0">
                        <div class="col-12 col-md-8">
                            <form id="contact" action="{{route('profileUpdate')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body py-0">
                            <div class="row">
                                <div class="col-3 d-none d-sm-block">
                                    <p class="card-text lh-40">Nama</p>
                                    <p class="card-text lh-140">Deskripsi</p>
                                    <p class="card-text lh-40">Email</p>
                                    <p class="card-text lh-40">Telepon</p>
                                    <p class="card-text lh-40">Tanggal lahir</p>
                                    <p class="card-text lh-40">Alamat</p>
                                    <p class="card-text lh-40">Pekerjaan</p>
                                    <p class="card-text lh-40">Pendidikan</p>
                                    <p class="card-text lh-40">Password</p>
                                </div>
                                <div class="col-sm-7 col-12">
                                    <fieldset>
                                        <input type="text" name="name" value="{{$user->name}}" placeholder="Nama" autocomplete="on">
                                    </fieldset>
                                    <fieldset>
                                        <textarea name="desc" placeholder="Deskripsi diri kamu">{{$user->desc}}</textarea>
                                    </fieldset>
                                    <fieldset>
                                        <input type="email" value="{{$user->email}}" name="email" placeholder="Email" autocomplete="on">
                                    </fieldset>
                                    <fieldset>
                                        <input type="tel" value="{{$user->telepon}}" name="telepon" placeholder="Telepon" autocomplete="on">
                                    </fieldset>
                                    <fieldset>
                                        <input type="date" value="{{$user->tgl_lahir}}" name="tgl_lahir" placeholder="Tanggal lahir" autocomplete="on">
                                    </fieldset>
                                    <fieldset>
                                        <input type="text" value="{{$user->alamat}}" name="alamat" placeholder="Alamat" autocomplete="on">
                                    </fieldset>
                                    <fieldset>
                                        <input type="text" value="{{$user->pekerjaan}}" name="pekerjaan" placeholder="Pekerjaan" autocomplete="on">
                                    </fieldset>
                                    <fieldset>
                                        <input type="text" value="{{$user->pendidikan}}" name="pendidikan" placeholder="Pendidikan" autocomplete="on">
                                    </fieldset> 
                                    <fieldset>
                                        <input type="password" name="password" placeholder="Password" autocomplete="on">
                                    </fieldset>  
                                </div>
                            </div>

                            </div>
                        </div>
                        <div class="col-12 col-md-3">
                            <img src="{{$user->foto != null ? asset($user->foto) : 'https://via.placeholder.com/150'}}" class="img-fluid rounded-start" alt="...">
                            <div class="custom-file mt-3">
                                <input type="file" class="custom-file-input" name="foto">
                                <label class="custom-file-label" for="customFile"></label>
                            </div>
                        </div>
                        
                        
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </div>
                    </form>

                </div>
            </div>

            
        </div>
    </div>
    

</section>


@endsection