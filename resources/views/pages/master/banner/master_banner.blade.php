@extends('layouts.layout_admin')
@section('content')


<div class="container-fluid">

    <div class="row page-titles mx-0">
        <h2 class="fw-bolder">Banner</h1>
        <h5>Gambar-gambar pada banner akan ditampilkan dihalaman utama menjadi slide gambar</h5>
    </div>

    <div class="card">
        <div class="card-body">
            
                <div class="row">
                    @forelse ($datas as $data)
                    <div class="media mb-3 align-items-center border-bottom pb-3">
                        <img class="me-3 " alt="image" width="100" src="{{asset($data->foto)}}">
                        <div class="media-body">
                            <h5 class="mb-0 text-pale-sky">Banner {{$loop->iteration}} 
                            </h5>
                            <small class="text-primary mb-0">Available</small>
                        </div>
                        <div>
                            <a href={{route('masterBannerDelete',$data->id)}} class="btn btn-danger btn-sm">Hapus</a>
                        </div>
                    </div>
                    @empty
                        
                    @endforelse
                    
                </div>

                <div>
                    <div class="mb-3">
                        @include('components.error.error_message')
                        <form method="post" action="{{ route('masterBannerStore')}}" enctype="multipart/form-data">
                        @csrf
                        <label for="exampleFormControlInput1">Tambah Banner</label><br>
                        <div class="container">

                            <img class="img-thumbnail" id="output" src="https://via.placeholder.com/240"/>
                        </div>
                        <br>
                        <input onchange="loadFile(event)" type="file" name="foto" class="dropify form-control" id="exampleFormControlInput1" placeholder="">
                        <div id="emailHelp" class="form-text text-danger">File yang diterima : jpeg,png,jpg | Max : 1Mb | Rekomendasi rasio ukuran : 16:9</div>
                    
                        <div>
                            <button type="submit" class="btn btn-success text-white">Simpan</button>
                            <a href="{{ url()->previous() }}" class="btn btn-light">Batal</a>
                        </div>
                        </form>
                    </div>
                </div>
        </div>
    </div>
</div>


<script>
    var loadFile = function(event) {
        var reader = new FileReader();
        reader.onload = function(){
        var output = document.getElementById('output');
        output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    };
</script>

@endsection