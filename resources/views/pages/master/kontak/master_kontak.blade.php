@extends('layouts.layout_admin')
@section('content')


<div class="container">
    <h1 class="h1 font-weight-bold text-gray-800 mb-3">Kontak perusahaan</h1>

    <form method="post" action="{{ route('masterStoreKontak')}}">
    @csrf
        <div class="mb-3">
          <label class="form-label">Nama Perusahaan</label>
          <input type="text" value="1" name="id" class="form-control" hidden>
          <input type="text" value="{{ $data == null ? '' :$data->nama }}" name="nama" class="form-control">
        </div>

        <div class="mb-3">
          <label class="form-label">Deskripsi</label>
          <textarea class="form-control" id="exampleFormControlTextarea1" name="desc" rows="3">
            {{$data == null ? '' :$data->desc}}
          </textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Alamat</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" name="alamat" rows="3">
              {{$data == null ? '' :$data->alamat}}
            </textarea>
          </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" value="{{ $data == null ? '' :$data->email }}" name="email" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Telepon utama</label>
            <input type="tel" value="{{ $data == null ? '' :$data->telepon_1 }}" name="tel1" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Telepon partnership</label>
            <input type="tel" value="{{ $data == null ? '' :$data->telepon_2 }}" name="tel2" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Telepon bantuan</label>
            <input type="tel" value="{{ $data == null ? '' :$data->telepon_3 }}" name="tel3" class="form-control">
            <div id="emailHelp" class="form-text text-success">Nomor akan digunakan unutuk tombol bantuan WhatsApp disebelah pojok kanan bawah</div>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>



@endsection