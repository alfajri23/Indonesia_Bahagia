@extends('layouts.layout_user')
@section('content')

<style>
    .edit{
        position: absolute;
        right: 10px;
        top: 10px;
        cursor: pointer;
    }
</style>

<div class="course-details pt-lg--7 pb-lg--7 pt-5 pb-5">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-xxl-9 col-lg-8">
                <div class="card d-block border-0 rounded-lg overflow-hidden p-4 shadow-xss mt-4">
                    @if ($data->id_user == auth()->user()->id)
                    <span class="edit">
                        <i class="fa-solid fa-trash text-instagram" onclick="event.preventDefault();
                        document.getElementById('form-delete-' + {{$data->id}}).submit();"></i>


                        <form id="form-delete-{{$data->id}}" class="d-none" action="{{route('forumDelete')}}" method="post">
                            @csrf
                            <input type="text" name="id" value="{{$data->id}}" hidden>
                        </form>
                    </span>
                    @endif
                    
                    <div class="d-flex mb-3">
                        <div class="flex-shrink-0">
                          <img data-src="{{ $data->user->foto != null ? asset($data->user->foto) : 'https://upload.wikimedia.org/wikipedia/commons/7/7c/Profile_avatar_placeholder_large.png?20150327203541'}}" class="rounded-circle w_40 lozad " alt="...">
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h6 class="text-uppercase author-name font-xsss fw-700 mb-0 text-grey-800">{{$data->user->name}}</h6>
                            <h6 class="d-block font-xsssss fw-500 text-grey-500 mt-2 mb-0">{{$data->updated_at}}</h6>
                        </div>
                    </div>

                    <h2 class="fw-700 font-sm mb-3 mt-1 pl-1 mb-3">{{$data->judul}}</h2>

                    @if ($data->gambar != null)     
                    <div class="mb-2">
                        <img data-src="{{asset($data->gambar)}}" class="lozad img-responsive w-100 rounded-xxl" alt="" srcset="">
                    </div>
                    @endif

                    <div class="font-xsss fw-400 lh-28 text-grey-700 mb-0 pl-2">
                        {!!$data->isi!!}
                    </div>

                    <div class="row px-3 mt-3">
                    
                        <div class="clearfix mr-3">
                            <small class="cursor-pointer">
                            <i class="fas fa-eye mr-1 text-cyan"></i>{{$data->lihat}}  View
                            </small>
                        </div>
                    </div>
                </div>

                <div class="container mt-4">
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <h4 class="mb-1 text-grey-900 fw-700 font-md">Leave a Comment</h4>
                            <form class="" action="{{route('forumStoreKomentar')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group mb-3"> 
                                            <input type="hidden" value="{{$data->id}}" name="id_pertanyaan">
                                            <textarea class="w-100 border-0 h125 p-3" name="jawaban"></textarea>
                                        </div>        
                                        <div class="form-group">
                                            <button type="submit" class="form-control style2-input bg-info text-white font-xss fw-500 p-0 w175">Submit</button>
                                        </div>
                                    </div>
                                </div>
                                
                            </form>
                        </div>
                    </div>
                </div>

                <div class="comments-list">
                    <h4 class="text-grey-900 font-sm fw-700 mt-5 mb-5">Comments</h4>
                    @forelse ($komentars as $komentar)
                    <div class="section full mb-5">
                        <div class="row">
                            <div class="col-3 col-sm-2">
                                <figure class="avatar mr-0 text-center">
                                    <div class="profile-detail-bttn">
                                        <img data-src="{{ $komentar->user->foto != null ? asset($komentar->user->foto) : 'https://asia.ifoam.bio/wp-content/uploads/2018/06/image-placeholder.jpeg'}}" class="rounded-circle w50 lozad" alt="image">
                                    </div>
                                </figure>
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-9 col-xs-9 pl-1 pr-0 clearfix">
                                @auth
                                @if ($komentar->id_user == auth()->user()->id)
                                <div class="float-end me-3">
                                    <a onclick="event.preventDefault();
                                    document.getElementById('logout-form-'+{{$loop->iteration}}).submit();
                                    
                                    " >
                                    <i class="ti-trash font-md text-instagram cursor-pointer"></i>
                                    </a>

                                    
                                    <i onclick="edit({{$komentar->id}})" class="ti-pencil font-md mx-2 cursor-pointer"></i>

                                    <form id="logout-form-{{$loop->iteration}}" action="{{ route('forumDeleteKomentar') }}" method="POST" class="d-none">
                                        @csrf
                                        <input type="text" name="id" value="{{$komentar->id}}" hidden>
                                    </form>

                                </div>
                                @endif
                                @endauth
                                
                                <h4 class="mt-1 font-xss text-grey-900 fw-700">{{$komentar->user->nama}}</h4>
                                <h6 class="text-grey-500 mb-1 mt-0 d-block fw-500 mb-0 ls-2">{{date_format(date_create($komentar->updated_at),"d M Y")}}</h6>
                                <div class="font-xsss fw-400 lh-26 text-grey-700 mb-1 mt-2">{!!$komentar->jawaban!!}</div>
                            </div>
                        </div>
                    </div>
                    @empty   
                    <div class="font-xss text-grey-900">Jadilah penjawab pertama</div>             
                    @endforelse

                </div>
            </div>

            <div class="col-xl-4 col-xxl-3 col-lg-4">
            </div>
        </div>
    </div>
</div>

<!-- Modal Komentar-->
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
        <form class="border-0" action="{{route('forumStoreKomentar')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <p class="mb-0 fw-700">jawaban</p>
                <input type="text" hidden name="id_komentar" id="id_komentar">
                <input type="text" hidden name="id_pertanyaan" value="{{$data->id}}">
                <textarea name="jawaban" id="jawaban" class="">
                    
                </textarea>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.10.0/tinymce.min.js"
integrity="sha512-XNYSOn0laKYg55QGFv1r3sIlQWCAyNKjCa+XXF5uliZH+8ohn327Ewr2bpEnssV9Zw3pB3pmVvPQNrnCTRZtCg=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/lozad/dist/lozad.min.js"></script>

<script type="text/javascript">

    const observer = lozad();
    observer.observe();

    $(document).ready(function() {
		tinymce.init({
	            selector: "textarea",
	            branding: false,
	            width: "100%",
	            height: "200",
	            plugins: [
	                "advlist autolink lists charmap print preview anchor",
	                "searchreplace visualblocks code fullscreen",
	                "paste wordcount link","directionality","media"
	            ],
	            toolbar: "link | undo redo | bold italic | bullist numlist outdent indent | ltr rtl"
	    });
	});

    function edit(id){
        $.ajax({
            type : 'GET',
            url  : "{{ route('forumShowKomentar') }}",
            data : {
                id : id
            },
            dataType: 'json',
            success : (data)=>{
                let datas = data.data;
                $('#id_komentar').val(id);
                tinymce.get("jawaban").setContent(datas.jawaban);
                $('#exampleModal').modal('show');
            }
        });
    }
</script>



@endsection