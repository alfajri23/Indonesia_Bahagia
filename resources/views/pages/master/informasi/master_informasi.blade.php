@extends('layouts.layout_admin')
@section('content')

<style>
    .text-desc{
          width: 80%;
          overflow: hidden;
          text-overflow: ellipsis;
          height: 80px;
      }
</style>

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
            <th scope="col">Aksi</th>
          </tr>
        </thead>

        <tbody>
            @forelse ($data as $dt)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$dt->nama}}</td>
                <td>
                    <a type="button" href="{{route('masterAddInformasi',['id'=>$dt->id])}}" class="btn btn-primary btn-sm">Edit</a>
                    <a type="button" href="{{route('masterDeleteInformasi',$dt->id)}}" class="btn btn-danger btn-sm">Hapus</a>
                </td>
              </tr>
            @empty
                
            @endforelse
          
          
        </tbody>
      </table>
</div>



@endsection