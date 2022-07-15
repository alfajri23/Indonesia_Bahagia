@extends('layouts.layout_user')
@section('content')

<div class="section-full content-inner-2 contact-style-3">
    <div class="container-md">
        <div class="row m-lr0 contact-form-box">
            <div class="col-lg-8 col-md-7 p-lr0">
                <div class="contact-form bg-white">
                    <div class="section-head text-left">
                        <h3 class="title">Ganti password</h3>
                        <div class="dlab-separator bg-primary"></div>
                    </div>
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @include('components.error.error_message')

                    <div class="dzFormMsg"></div>
                    <form id="contact" action="{{route('passwordUpdate')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="Contact" name="dzToDo">
                        <div class="row">
                            
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="">Password Lama</label>
                                    <div class="input-group">
                                        <input type="password" name="current-password" placeholder="" autocomplete="on" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="">Password</label>
                                    <div class="input-group">
                                        <input type="password" name="password" placeholder="" autocomplete="on" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="">Konfirmasi Password</label>
                                    <div class="input-group">
                                        <input type="password" type="password" name="password_confirmation" placeholder="" autocomplete="on" class="form-control">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <button name="submit" type="submit" value="Submit" class="site-button"> Ganti password </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection