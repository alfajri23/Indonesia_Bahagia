@extends('layouts.layout_admin')

@section('content')

<div class="container">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Tambah Event</h4>
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
                        <div class="form-group">
                            <label for="exampleFormControlInput1">*Judul</label>
                            <input type="text" name="judul" class="form-control" id="exampleFormControlInput1" placeholder="">
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlSelect1">*Tipe</label>
                            <select name="tipe" class="form-select" id="exampleFormControlSelect1">
                                @forelse ($tipes as $tp)
                                <option value="{{$tp->id}}">{{$tp->nama}}</option>
                                @empty   
                                @endforelse
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">*Harga</label>
                            <input type="text" onkeyup="currencyFormat(this)" name="harga" class="form-control" placeholder="Kosongkan jika gratis">
                        </div>
            
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Harga bias</label>
                            <input type="text" onkeyup="currencyFormat(this)" name="harga_bias" class="form-control" placeholder="Kosongkan tidak ada">
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">*Tanggal</label>
                            <input type="date" name="tanggal" class="form-control" id="exampleFormControlInput1" placeholder="">
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Waktu</label>
                            <input type="text" name="waktu" class="form-control" id="exampleFormControlInput1" placeholder="">
                        </div>

                        {{-- <div class="form-group">
                            <label for="exampleFormControlInput1">Grub WA</label>
                            <input type="text" name="grup_wa" class="form-control" id="exampleFormControlInput1" placeholder="">
                        </div> --}}
            
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Poster</label><br>
                            <input type="file" name="poster" class="dropify form-control" required>
                            <div id="emailHelp" class="form-text text-danger">Ukuran rasio rekomendasi poster 16:9</div>
                        </div>
                
                </div>

                <div class="col-6">
            
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Link</label>
                        <textarea name="link"></textarea>
                        
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="exampleInputnama1">Deskripsi</label>
                        <textarea name="desc" class="form-control">
                            
                        </textarea>
                    </div>

                    <div class="mb-3">
                        <label for="disabledSelect" class="form-label">Konsultan</label>
                        <select id="disabledSelect" name="id_konsultan" class="form-select">
                            <option value="">Tidak ada</option>   
                            @forelse ($pemateri as $pm)
                            <option value="{{$pm->id}}">{{$pm->nama}}</option>              
                            @empty
                            @endforelse
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputnama1">Deskripsi Pemateri</label>
                        <textarea name="pemateri" class="form-control">
                            
                        </textarea>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12">
                    <button type="submit" class="btn btn-success text-white">Tambah</button>
                    <a href="{{ url()->previous() }}" class="btn btn-light">Batal</a>
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