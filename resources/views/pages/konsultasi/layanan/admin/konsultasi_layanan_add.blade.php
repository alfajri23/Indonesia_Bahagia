@extends('layouts.layout_admin')
@section('content')


<div class="container">
    <h1 class="h1 font-weight-bold text-gray-800 mb-3">Tambah layanan</h1>

    <form method="post" action="{{ route('layananKonsultasiStore')}}">
    @csrf
        <div class="mb-3">
          <label class="form-label">Nama</label>
          <input type="text" value="{{ $produk == null ? '' :$produk->id }}" name="id_produk" hidden>
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
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
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