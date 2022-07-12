@extends('layouts.layout_admin')

@section('content')


<div class="container-fluid">

    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Tambah Materi - {{$data['nama_bab']->nama}}</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            
        </div>
    </div>
    
    <div class="card">
        <div class="card-body">
            <div class="row">
                @include('components.error.error_message')
                <div class="col-8">
                    <form action="{{route('materiStore')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="p-3">
                        <div class="mb-3">
                            <label class="fw-500 text-grey-600 display2-md-size">*Judul</label>
                            <input type="text" name="judul" class="form-control" required>
                            <input type="hidden" name="id_bab" value="{{$data['id_bab']}}" class="form-control">
                            <input type="hidden" name="id_kelas" value="{{$data['id_kelas']}}" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="fw-500 text-grey-600 display2-md-size">*Isi</label>
                            <textarea name="isi" class="form-control isi">  
                            </textarea required>
                        </div>

                        <div class="mb-3">
                            
                            <label class="fw-500 text-grey-600 font-xsss">Link URL Video</label>
                            <input type="text" name="link_video" placeholder="https://www.youtube.com/embed/......." class="form-control">
                            <div class="form-text text-warning">Jika tersedia link video pembelajaran, masukkan link video youtube</div>
                            <div class="form-text text-warning fw-bolder">Contoh : https://www.youtube.com/embed/YyQXQq1qHco</div>
                        </div>


                    </div>
                </div>
                <div class="col-4">
                    <div class="p-2">

                        <div class="card w-100 text-left border-0 shadow-xss rounded-lg p-3 mb-3">
                            <button type="submit" class="btn btn-success mb-2 text-white">Tambahkan</button>
                            <a href="{{ url()->previous() }}" class="btn btn-outline-primary mb-2">Kembali</a>
                        </div>

                        

                        <div class="card w-100 text-left border-0 shadow-xss rounded-lg p-3 mb-3">
                            <label class="fw-500 text-grey-600 font-xsss">Upload materi PDF</label>
                            <div class="custom-file">
                                <input type="file" name="file" class="dropify form-control">
                                <div class="form-text text-danger">Tipe file yang diterima : pdf,docx,doc,ppt,pptx | Max : 5Mb</div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.10.0/tinymce.min.js"
integrity="sha512-XNYSOn0laKYg55QGFv1r3sIlQWCAyNKjCa+XXF5uliZH+8ohn327Ewr2bpEnssV9Zw3pB3pmVvPQNrnCTRZtCg=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    $(document).ready(function() {
        tinymce.init({
                menubar: 'insert',
                selector: "textarea.isi",
                branding: false,
                width: "100%",
                height: "400",
                plugins: [
                    "advlist autolink lists charmap print preview anchor",
                    "searchreplace visualblocks code fullscreen",
                    "paste wordcount",
                    "media"
                ],
                toolbar: "undo redo | bold italic | bullist numlist outdent indent | media"
        });
    });
</script>

@endsection