@extends('layouts.layout_admin')
@section('content')

<div class="container">
    <div class="row justify-content-between flex-row">
        <div class="col-5">
            <h4 class="text-gray-800 mb-3">Informasi</h4>
        </div>

        <div class="col-2">
            <a href="{{route('masterAddInformasi')}}" class="btn btn-primary btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-flag"></i>
                </span>
                <span class="text">Tambah</span>
            </a>
        </div>

    </div>

    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Isi</th>
          </tr>
        </thead>

        <tbody>
            @forelse ($data as $dt)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$dt->nama}}</td>
                <td>{{$dt->isi}}</td>
              </tr>
            @empty
                
            @endforelse
          
          
        </tbody>
      </table>
</div>



@endsection