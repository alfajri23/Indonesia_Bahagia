@extends('layouts.layout_admin')

@section('content')

<div class="container-fluid">

    <div class="row page-titles mx-0">
            <div class="welcome-text">
                <h4 class="mb-2">Form pendaftaran</h4>
                <p class="mb-0">Form pendaftaran digunakan jika Anda akan menambahkan sebuah kuisioner sebelum user melakukan checkout produk</p>
                <p>Jawaban dari user akan disimpan dan dapat dijadikan pertimbangan marketing Anda</p>
            </div>
        
            <div>
                <a href="{{route('formSettingAdd')}}" class="btn btn-primary">Tambah pertanyaan</a>
            </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h4 class="mb-3">Daftar produk yang diberi kuisioner</h4>
            <div class="row">
                @forelse ($data as $dt)
                

                <div class="col-xl-3 col-xxl-3 col-sm-6">
                    <div class="widget-stat card bg-warning">
                        <div class="card-body">
                            <a href="{{route('formSettingAdd',['id'=>$dt->id])}}">
                                <div class="media ai-icon">
                                    <span class="me-3">
                                        <svg id="icon-database-widget" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-database">
											<ellipse cx="12" cy="5" rx="9" ry="3"></ellipse>
											<path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path>
											<path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path>
										</svg>
                                    </span>
                                    <div class="media-body text-white">
                                        
                                        <h5 class="mb-0 fw-bolder text-white">{{$dt->kategori->nama}}</h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                    
                @empty
                    
                @endforelse
            </div>
        </div>
    </div>




@endsection