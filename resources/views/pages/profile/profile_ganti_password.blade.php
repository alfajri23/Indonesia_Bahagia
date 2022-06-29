@extends('layouts.layout_user')
@section('content')

<section>
    <div class="page-nav bg-lightblue pt-lg--7 pb-lg--7 pb-5 pt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h1 class="text-grey-800 fw-700 display3-size">Ubah Password
                    </h1>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-4">
        <div class="row flex-column-reverse flex-sm-row g-0">
            <div class="col-12 col-md-8">
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if($errors)
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger">{{ $error }}</div>
                    @endforeach
                @endif
                <form id="contact" action="{{route('passwordUpdate')}}" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="card-body py-0">
                <div class="row">
                    <fieldset>
                        <label for="exampleInputEmail1" class="lh-30 font-xss mont-font text-grey-800 fw-600 mt-3 mb-0">Password Lama</label>
                        <input class="input-profile" type="password" name="current-password" placeholder="" autocomplete="on">
                    </fieldset>

                    <fieldset>
                        <label for="exampleInputEmail1" class="lh-30 font-xss mont-font text-grey-800 fw-600 mt-3 mb-0">Password Baru</label>
                        <input class="input-profile" type="password" name="password" placeholder="" autocomplete="on">
                    </fieldset>

                    <fieldset>
                        <label for="exampleInputEmail1" class="lh-30 font-xss mont-font text-grey-800 fw-600 mt-3 mb-0">Konfirmasi Password Baru</label>
                        <input class="input-profile" type="password" name="password_confirmation" placeholder="" autocomplete="on">
                    </fieldset>

                    <div class="mb-5 mt-1">
                        <button type="submit" class="btn btn-primary">Ganti password</button>
                    </div>
                </div>
            </div>
                </form>
        </div>
    </div>

</section>

@endsection
            