@extends('layouts.layout_admin')
@section('content')


<div class="container">
  <div class="row page-titles mx-0">
      <div class="col-sm-6 p-md-0">
          <div class="welcome-text">
              <h4>Tambah Layanan</h4>
          </div>
      </div>
      <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
          
      </div>
  </div>

  <div class="card">
    <div class="card-body">
      <form method="post" action="{{ route('layananKonsultasiStore')}}">
        @csrf
          <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" value="{{ empty($produk) ? '' :$produk->id }}" name="id_produk" hidden>
            <input type="text" value="{{ $data == null ? '' :$data->id }}" name="id" class="form-control" hidden>
            <input type="text" value="{{ $data == null ? '' :$data->nama }}" name="nama" class="form-control">
          </div>

          <div class="mb-3">
              <label class="form-label">Harga</label>
              <input type="text" value="{{ $data == null ? '' :$data->harga }}" name="harga" class="form-control">
            </div>

          <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" name="desc">
              {{$data == null ? '' :$data->desc}}
            </textarea>
          </div>

          <div class="col-lg-12 col-md-12 col-sm-12">
              <button type="submit" class="btn btn-success text-white">Simpan</button>
              <a href="{{ url()->previous() }}" class="btn btn-light">Batal</a>
          </div>
      </form>
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
	            height: "1000",
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