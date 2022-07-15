@extends('layouts.layout_user')
@section('content')

<style>
    .edit{
        position: absolute;
        right: 10px;
        top: 10px;
        cursor: pointer;
    }

    .btn-search{
        position: absolute;
        right: 5px;
        top: 5px;
    }
</style>

<div class="course-details pt-lg--7 pb-lg--7 pt-5 pb-5">
    <div class="container-md">
        <div class="row">
            <div class="col-xl-8 col-xxl-9 col-lg-8">

                <h5 class="font-lg fw-500 text-center">{{$titles}}</h5>
                @include('components.error.error_message')

                <div class="col-12">
                    <div class="card d-block border-1 rounded-lg overflow-hidden p-4 shadow-xss mt-4">
                        <div class="row">
                            <div class="col-12 col-sm-10 mx-auto">
                                <form action="{{route('forum')}}" class="searchform" id="searchform" method="get" role="search">
                                    <div>
                                        <label for="s" class="screen-reader-text">Search for:</label>
                                        <input type="text" id="s" name="cari" value="">
                                        <input type="submit" value="Search" id="searchsubmit">
                                    </div>
                                </form>
                            </div>

                            <div class="col-12 col-sm-10 mx-auto mt-2">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                        <i class="ti-help"></i>
                                        Tanyakan sesuatu
                                    </button>

                                    <a href="{{route('forumMyQuestion')}}" class="btn btn-outline-dark my-1">
                                        <i class="ti-user"></i>
                                        Pertanyaan saya
                                    </a>
                                
                            </div>
                        </div>
                    </div>
                </div>
    
                <div class="col-12">
    
                    @forelse ($data as $dt)
                    <div class="card d-block border-1 rounded-lg overflow-hidden p-4 shadow-xss mt-4">
                        @auth
                            @if ($dt->id_user == auth()->user()->id)
                            <span class="edit">
                                <i onclick="edit({{$dt->id}})" class="fas fa-pencil mr-1"></i>
                                <i class="fa-solid fa-trash" onclick="event.preventDefault();
                                document.getElementById('form-delete-' + {{$dt->id}}).submit();"></i>
    
    
                                <form id="form-delete-{{$dt->id}}" class="d-none" action="{{route('forumDelete')}}" method="post">
                                    @csrf
                                    <input type="text" name="id" value="{{$dt->id}}" hidden>
                                </form>
                            </span>
                            @endif
                            
                        @endauth
                        
                        <div class="d-flex mb-3">
                            <div class="flex-shrink-0">
                              <img data-src="{{ $dt->user->foto != null ? asset($dt->user->foto) : 'https://asia.ifoam.bio/wp-content/uploads/2018/06/image-placeholder.jpeg'}}" class="rounded-circle w_40 lozad" alt="...">
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="text-uppercase author-name font-xsss fw-700 mb-0 text-grey-800">{{$dt->user->name}}</h6>
                                <p class="my-0 font-12">{{$dt->updated_at}}</p>
                            </div>
                        </div>
    
                        <a href="{{route('forumDetail',$dt->id)}}" class="text-dark fw-bolder mb-3 mt-1 pl-1 mb-3">{{$dt->judul}}</a>
    
                        @if ($dt->gambar != null)     
                        <div class="mb-2">
                            <img data-src="{{asset($dt->gambar)}}" class="img-responsive w-100 lozad rounded-xxl" alt="" srcset="">
                        </div>
                        @endif
    
                        <div class="font-15 text-dark mb-0 pl-2">
                            {!!$dt->isi!!}
                        </div>

                        <div class="post-footer mt-3">
                            <div class="dlab-post-meta text-dark">
                                <ul>
                                    
                                    <li>
                                        <i class="fas fa-eye mr-1 text-cyan"></i>{{$dt->lihat}}
                                    </li>
                                    <li>
                                        <i class="fas fa-comment-alt text-twiiter"></i>
                                        <a href="{{route('forumDetail',$dt->id)}}" class="text-decoration-none">{{count($dt->jawaban)}}</a>
                                    </li>
                                </ul>
                            </div>
                            
                        </div>
    
                    </div>
                        
                    @empty
                    <div class="card d-block border-0 rounded-lg overflow-hidden p-4 shadow-xss text-center mt-4">   
                        <h2 class="fw-700 font-sm mb-3 mt-1 pl-1 mb-3">Tidak ada pertanyaan</h2>
                    </div>
                    @endforelse
    
                    {!!$data->links()!!}
                </div>
            </div>
            
            <div class="col-xl-4 col-xxl-3 col-lg-4">
               
                    <h5 class="font-sm fw-500">Kategori</h5>
                    @if(\Auth::check()) 
                        <button type="button" class="btn btn-light" data-toggle="modal" data-target="#kategoriModal">
                            <i class="fa-solid fa-plus"></i>
                            Tambah kategori
                        </button>
                    @endif
                    
                    @forelse ($kategori as $kat)
                    <a href="{{route('forum',['kategori'=> $kat->nama])}}" class="d-flex align-items-center btn btn-light my-1">  
                        <p class="ml-2 mb-0">{{$kat->nama}}</p>
                    </a>
                    @empty
                        
                    @endforelse
                
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah pertanyaan</h5>
          <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal" aria-label="Close">
            <i class="fa-solid fa-xmark"></i>
          </button>
        </div>
        <div class="modal-body">
        <form class="border-0" action="{{route('forumStore')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <p class="mb-0 fw-700">Judul</p>
                <input type="hidden" name="id" class="form-control" id="ids" placeholder="">
                <input type="text" name="judul" class="form-control" id="judul" placeholder="">
            </div>

            <div class="form-group">
                <p class="mb-0 fw-700">Isi</p>
                <textarea name="isi" id="isi" class="">
                    
                </textarea>
            </div>

            <div class="form-group">
                <p class="mb-0 fw-700">Kategori</p>
                <select class="form-control" name="id_kategori" id="id_kat">
                    @foreach ($kategori as $kt)
                    <option value="{{$kt->id}}">{{$kt->nama}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <p class="mb-0 fw-700">Insert gambar</p>
                <div id="image">

                </div>
                <input type="file" name="gambar" id="exampleFormControlInput1" placeholder="">
            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Publish</button>
        </div>
        </form>
      </div>
    </div>
</div>

<!-- Modal kategori -->
<div class="modal fade" id="kategoriModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Buat kategori</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="post" class="border-0" action="{{route('forumStoreKategori')}}">
            @csrf
            <div class="form-group">
                <p class="mb-0 fw-700">Nama</p>
                <input type="text" name="nama" class="form-control" placeholder="">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-success">Tambah kategori</button>
        </form>
        </div>
      </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.10.0/tinymce.min.js"
integrity="sha512-XNYSOn0laKYg55QGFv1r3sIlQWCAyNKjCa+XXF5uliZH+8ohn327Ewr2bpEnssV9Zw3pB3pmVvPQNrnCTRZtCg=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/lozad/dist/lozad.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script type="text/javascript">

    const observer = lozad();
    observer.observe();

    $(document).ready(function() {
		tinymce.init({
	            selector: "textarea",
	            branding: false,
	            width: "100%",
	            height: "500",
	            plugins: [
	                "advlist autolink lists charmap print preview anchor",
	                "searchreplace visualblocks code fullscreen",
	                "paste wordcount link","directionality","media"
	            ],
	            toolbar: "link | undo redo | bold italic | bullist numlist outdent indent | ltr rtl"
	    });

        $('#kategoriModal').on('hidden.bs.modal', function(){
            $('#formKategori').trigger("reset");
        });
	});

    function edit(id){
        $.ajax({
            type : 'GET',
            url  : "{{ route('forumDetailAjax') }}",
            data : {
                id : id
            },
            dataType: 'json',
            success : (data)=>{
                let datas = data.data;
                $('#ids').val(datas.id);
                $('#judul').val(datas.judul);
                $('#id_kategori').val(datas.id_kategori);
                tinymce.get("isi").setContent(datas.isi);
                $('#image').html(`
                    <img src="${window.location.origin}'/public'/${datas.gambar}" style="width:200px" >  
                `);
                $('#exampleModal').modal('show');
            }
        });
    }



    

</script>


@endsection