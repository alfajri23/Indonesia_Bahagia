@extends('layouts.layout_admin')


@section('content')

<div class="container">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4 class="fs-3">Edit Event</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                <form action="{{route('saveEvent')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body mb-5">
                        <div class="row no-gutters align-items-center">
                            <img src="{{asset($data->poster)}}" style="max-width:100%" alt="Tidak ada poster">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Judul</label>
                        <input type="hidden" name="id" value="{{$data->id}}" class="form-control" id="exampleFormControlInput1" placeholder="">
                        <input type="hidden" name="id_produk" value="{{$produk->id}}" class="form-control" id="exampleFormControlInput1" placeholder="">
                        <input type="text" name="judul" value="{{$data->judul}}" class="form-control" id="exampleFormControlInput1" placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Tipe</label>
                        <select name="tipe" class="form-select" id="exampleFormControlSelect1">
                            <option value="{{$tipe}}" selected>Pilih tipe</option>
                            @forelse ($tipes as $tp)
                            <option value="{{$tp->id}}">{{$tp->nama}}</option>
                            @empty   
                            @endforelse
                        </select>
                    </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Waktu</label>
                            <input type="text" name="waktu" value="{{$data->waktu}}" class="form-control" id="exampleFormControlInput1" placeholder="">
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Tanggal</label>
                            <input type="date" name="tanggal" value="{{$data->tanggal}}" class="form-control" id="exampleFormControlInput1" placeholder="">
                        </div>
            
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Harga</label>
                            <input type="text" onkeyup="currencyFormat(this)" name="harga" value="{{$data->harga}}" class="form-control" placeholder="">
                        </div>
                
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Harga bias</label>
                            <input type="text" onkeyup="currencyFormat(this)" name="harga_bias" value="{{$data->harga_bias}}" class="form-control" placeholder="">
                            <div class="form-text text-primary">Harga yang dicoret atau yang digunakan unutuk memancing user</div>
                        </div>

                        <div class="form-group">
                            <label for="inputState">Status</label>
                            <select id="inputState" class="form-control" name="status">
                                <option value="{{$data->status}}" selected>Pilih status</option>
                                <option value="1">Aktif</option>
                                <option value="0">Nonaktif</option>
                            </select>
                            <div class="form-text text-primary">Event akan ditampilkan diuser jika Aktif dan tidak ditampilkan jika status nonaktif</div>
                        </div>
                </div>

                <div class="col-6 pt-3">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Poster</label><br>
                        <input type="file" name="poster" class="dropify form-control" id="exampleFormControlInput1" placeholder="">
                        <div class="form-text text-primary">Ukuran rasio rekomendasi poster 16:9</div>
                    </div>
            
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Link</label>
                        <textarea name="link">{{$data->link}}</textarea>
                    </div>

                    {{-- <div class="form-group">
                        <label for="exampleFormControlInput1">Grub WA</label>
                        <input type="text" name="grup_wa" value="{{$data->grup_wa}}" class="form-control" id="exampleFormControlInput1" placeholder="">
                    </div> --}}
                
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="exampleInputnama1">Deskripsi</label>
                        <textarea name="desc" class="form-control">
                            {{$data->desc}}
                        </textarea>
                    </div>

                    <div class="mb-3">
                        <label for="disabledSelect" class="form-label">Konsultan</label>
                        <select id="disabledSelect" name="id_konsultan" class="form-select">
                            <option value="{{$data->id_pemateri}}" selected>Pilih</option> 
                            @forelse ($pemateri as $pm)
                            <option value="{{$pm->id}}">{{$pm->nama}}</option>              
                            @empty
                            @endforelse
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputnama1">Deskripsi Pemateri</label>
                        <textarea name="pemateri" class="form-control">
                            {{$data->pemateri}}
                        </textarea>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12">
                    <button type="submit" class="btn btn-success text-white">Edit</button>
                    <button type="button" class="btn btn-light">Batal</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.10.0/tinymce.min.js"
integrity="sha512-XNYSOn0laKYg55QGFv1r3sIlQWCAyNKjCa+XXF5uliZH+8ohn327Ewr2bpEnssV9Zw3pB3pmVvPQNrnCTRZtCg=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script type="text/javascript">

	$(document).ready(function() {
		 tinymce.init({
	            selector: "textarea",
	            branding: false,
	            width: "100%",
	            height: "400",
	            plugins: [
	                "advlist autolink lists charmap print preview anchor",
	                "searchreplace visualblocks code fullscreen",
	                "paste wordcount link","directionality","media"
	            ],
	            toolbar: "link | undo redo | bold italic | bullist numlist outdent indent | ltr rtl"
	      
	    });
	});

</script>


@endsection