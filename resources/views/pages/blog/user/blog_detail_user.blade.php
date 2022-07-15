@extends('layouts.layout_user')
@section('content')

<div class="post-title page-nav pt-lg--7 pt-lg--7 pt-5 pb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h6 class="text-uppercase fw-600 ls-3 text-success font-xsss">{{$blog->kategori}}</h6>
                <h2 class="mt-3 mb-2">
                    <a href="#" class="lh-2 display2-size display2-md-size mont-font text-grey-900 fw-700">{{$blog->judul}}</a>
                </h2>                                
                <h6 class="font-xssss text-grey-500 fw-600 ml-3 mt-3 d-inline-block"><i class="ti-time mr-2"></i> {{date_format(date_create($blog->updated_at),"d M Y")}}</h6> 
                <h6 class="font-xssss text-grey-500 fw-600 ml-3 mt-3 d-inline-block"><i class="ti-user mr-2"></i> {{$blog->penulis}}</h6>
                <h6 class="font-xssss text-grey-500 fw-600 ml-3 mt-3 d-inline-block"><i class="ti-comments mr-2"></i> {{$blog->komentar}} Comments</h6>
            </div>
        </div>
    </div>
</div>

<div class="post-image">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-10 text-center mx-auto">
                <img data-src="{{ $blog->gambar != null ? asset($blog->gambar) : 'https://images.unsplash.com/photo-1500989145603-8e7ef71d639e?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=876&q=80'}}" alt="blog-image" class="img-fluid rounded-lg lozad">
            </div>
        </div>
    </div>
</div>

<div class="post-content pt-lg--7 pt-lg--7 pt-5 pb-5">
    <div class="container-md">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-left">
                <div class="card shadow-none w-100 border-0 mb-5">
                    
                    <ul class="mt-0 list-inline">
                        <!-- <h4 class="list-inline-item mr-5 text-grey-900 font-xs fw-700">Share this article: </h4> -->
                        <li class="list-inline-item"><a  target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{url()->full()}}" class="btn-round-md bg-facebook"><i class="font-xs ti-facebook text-white"></i></a></li>
                        <li class="list-inline-item"><a target="_blank" href="https://twitter.com/intent/tweet?text={{url()->full()}}" class="btn-round-md bg-twiiter"><i class="font-xs ti-twitter-alt text-white"></i></a></li>
                        <li class="list-inline-item"><a target="_blank" href="https://wa.me/?text={{url()->full()}}" class="btn-round-md bg-linkedin"><i class="font-xs fa-brands fa-whatsapp text-white"></i></a></li>
                    </ul>
                </div>
                
                <div class="isi">
                    {!! $blog->isi !!}
                </div>
                
            </div>

            <div class="col-lg-10">
                <div class="bg-transparent side-wrap rounded-lg p-4 mb-4">
                    <div class="form-group mb-3">
                        <label class="fw-700 text-grey-900">Related Blog</label>
                    </div>

                    <div class="d-flex flex-wrap gap-10">
                        @forelse ($populars as $popular)
                        <div class="card shadow-none bg-light border-0 mb-3 basis-50 p-3">
                            <div class="row">
                                <div class="col-4">
                                    <img data-src="{{ $popular->gambar != null ? asset($popular->gambar) : 'https://images.unsplash.com/photo-1500989145603-8e7ef71d639e?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=876&q=80'}}" alt="blog-image" class="img-fluid rounded-lg lozad">
                                </div>
                                <div class="col-8 pl-1">
                                    <h6 class="font-xssss text-grey-500 fw-600 my-0">{{$popular->kategori}}</h6>
                                    <a href="{{route('blogDetailUser',['id'=>$popular->id, 'link'=>$popular->link])}}" class="fw-600 text-grey-800 font-xsss lh-3">{{$popular->judul}}</a>
                                </div>
                            </div>
                        </div>
                        @empty
                        @endforelse
        
                    </div>

                </div>
            </div>

            <div class="col-lg-10 comments-section bottom-border">
                <div class="comments-list">
                    <h4 class="text-grey-900 font-sm fw-700 mt-5 mb-5">Comments</h4>
                    @forelse ($komentars as $komentar)
                    <div class="section full mb-5">
                        <div class="row">
                            <div class="col-3 col-sm-1">
                                <figure class="avatar mr-0 text-center">
                                    <div class="profile-detail-bttn">
                                        <img data-src="{{ $komentar->user->foto != null ? asset($komentar->user->foto) : 'https://asia.ifoam.bio/wp-content/uploads/2018/06/image-placeholder.jpeg'}}" class="rounded-circle w50 lozad" alt="image">
                                    </div>
                                </figure>
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-9 col-xs-9 pl-1 pr-0 clearfix">
                                @auth
                                @if ($komentar->id_user == auth()->user()->id)
                                    <a onclick="event.preventDefault();
                                    document.getElementById('logout-form-'+{{$loop->iteration}}).submit();
                                    
                                    " class="float-end">
                                    <i class="ti-trash cursor-pointer"></i>
                                    </a>
                                    <form id="logout-form-{{$loop->iteration}}" action="{{ route('blogDeleteKomentar') }}" method="POST" class="d-none">
                                        @csrf
                                        <input type="text" name="id" value="{{$komentar->id}}" hidden>
                                    </form>
                                @endif
                                @endauth
                                
                                <h4 class="mt-1 font-xss text-grey-900 fw-700">{{$komentar->user->nama}}</h4>
                                <h6 class="text-grey-500 mb-1 mt-0 d-block fw-500 mb-0 ls-2">{{date_format(date_create($komentar->updated_at),"d M Y")}}</h6>
                                <p class="font-xsss fw-400 lh-26 text-grey-700 mb-1 mt-2">{{$komentar->isi}}</p>
                            </div>
                        </div>
                    </div>
                    @empty                
                    @endforelse

                </div>
            </div>

        </div>
    </div>
</div>

<div class="post-comment pt-7 pb-7 bg-greyblue">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8  text-center">
                <h4 class="mb-4 pb-3 text-grey-900 fw-700 font-xl">Leave a Comment</h4>
                @include('components.error.error_message')
                <form action="{{route('blogStoreKomentar')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group mb-3"> 
                                <input type="hidden" value="{{$blog->id}}" name="id_blog">
                                <textarea name="isi" rows="5" class="form-control" placeholder="Beri komentar anda" required>
                                    
                                </textarea>
                               
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
</div>

<script src="https://cdn.jsdelivr.net/npm/lozad/dist/lozad.min.js"></script>
<script>
    const observer = lozad();
    observer.observe();

    function copyText() {
        navigator.clipboard.writeText
            ("{{url()->full()}}");
        let copy = document.getElementById("copy");
        copy.innerHTML = "Copied";
    }
</script>


@endsection