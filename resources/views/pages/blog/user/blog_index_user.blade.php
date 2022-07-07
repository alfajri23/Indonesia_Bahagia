@extends('layouts.layout_user')
@section('content')

<style>
    .text-desc{
        width: 100%;
        overflow: hidden;
        text-overflow: ellipsis;
        height: 80px;
    }

    .back{
        background-repeat: no-repeat;
        background-origin: content-box;
        background-size: cover;
        aspect-ratio: 16 / 9;
        background-position: center;
        margin: auto;
    }
</style>

<div class="page-nav bg-lightblue pt-lg--7 pb-lg--7 pb-5 pt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="text-grey-800 fw-700 display3-size">Blog 
                </h1>
            </div>
        </div>
    </div>
</div>

<div class="blog-page pt-lg--7 pb-lg--7 pb-5 pt-5 bg-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="bg-greyblue side-wrap rounded-lg p-4 mb-4">
                    <div class="form-group mb-1">
                        <label class="fw-700 text-grey-900">Search by Keyword</label>
                    </div>
                    <div class="form-group icon-input mb-0">
                        <form action="{{route('blogUser')}}" method="GET">
                        <input type="text" name="key" class="form-control style1-input pl-5 border-size-md border-light font-xsss" placeholder="To search type and hit enter">
                        <i class="ti-search text-grey-500 font-xs"></i>
                        </form>
                    </div>
                </div>

                <div class="bg-greyblue side-wrap rounded-lg p-4 mb-4">
                    <div class="form-group mb-0">
                        <label class="fw-700 text-grey-900">Kategories</label>
                    </div>
                    <ul class="recent-post mt-2 list-style-disc pl-4">
                        @forelse ($kategories as $kategori)
                        <li><a href="{{ route('filterByCategory',['kategori' => $kategori->id ]) }}" class="fw-500 lh-24 font-xsss text-grey-600 ">{{$kategori->nama}}</a></li>
                        @empty
                        @endforelse
                    </ul>
                </div>

                <div class="bg-greyblue side-wrap rounded-lg p-4 mb-4">
                    <div class="form-group mb-3">
                        <label class="fw-700 text-grey-900">Popular Posts</label>
                    </div>

                    @forelse ($populars as $popular)
                    <div class="card w-100 shadow-none bg-transparent border-0 mb-3">
                        <div class="row">
                            <div class="col-4">
                                <div class="w-100">
                                    <div 
                                       class="lozad back rounded-lg"
                                       data-background-image="{{ $popular->gambar != null ? asset($popular->gambar) : 'https://images.unsplash.com/photo-1500989145603-8e7ef71d639e?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=876&q=80'}}"
                                    >
                                    </div>
                                </div>

                                {{-- <img data-src="{{ $popular->gambar != null ? asset($popular->gambar) : 'https://images.unsplash.com/photo-1500989145603-8e7ef71d639e?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=876&q=80'}}" alt="blog-image" class="img-fluid rounded-lg lozad"> --}}
                            </div>
                            <div class="col-8 pl-1">
                                <h6 class="font-xssss text-grey-500 fw-600 my-0">{{$popular->kategori}}</h6>
                                <a href="{{route('blogDetailUser',$popular->id)}}" class="fw-600 text-grey-800 font-xsss lh-3">{{$popular->judul}}</a>
                            </div>
                        </div>
                    </div>
                    @empty
                    <h3 class="font-lg fw-700 text-grey-900">Blog tidak ditemukan</h3>
                    @endforelse


                </div>
                
            </div>
            <div class="col-lg-8">
                <div class="row">
                    @forelse ($blogs as $blog)
                    <div class="col-lg-12 col-md-12 col-sm-12 mb-4">
                        <article class="post-article p-0 border-0 shadow-xss rounded-lg overflow-hidden">
                            <a href="{{route('blogDetailUser',$blog->id)}}" class="row">
                                <div class="col-4 col-xs-12 d-flex aligh-items-center">
                                    <div class="w-100 p-3">
                                        <div 
                                           class="lozad back center-img rounded-lg"
                                           data-background-image="{{ $blog->gambar != null ? asset($blog->gambar) : 'https://images.unsplash.com/photo-1500989145603-8e7ef71d639e?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=876&q=80'}}"
                                        >
                                        </div>
                                        {{-- <img data-src="{{ $blog->gambar != null ? asset($blog->gambar) : 'https://images.unsplash.com/photo-1500989145603-8e7ef71d639e?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=876&q=80'}}" alt="blog-image" class="w-100 rounded-lg lozad center-img"> --}}
                                    </div>
                                </div>
                                <div class="col-8 col-xs-12 pl-md--0">
                                    <div class="post-content p-3">
                                        <h6 class="font-xssss text-grey-500 fw-600 float-left"><i class="ti-folder mr-2"></i>{{$blog->kategori}}</h6> 
                                        <h6 class="font-xssss text-grey-500 fw-600 ml-3 float-left"><i class="ti-time mr-1"></i> {{date_format(date_create($blog->updated_at),"d M Y")}}</h6> 
                                        <h6 class="font-xssss text-grey-500 fw-600 ml-3 float-left"><i class="ti-user mr-2"></i>{{$blog->penulis}}</h6>
                                        <h6 class="font-xssss text-grey-500 fw-600 ml-3 float-left"><i class="ti-eye mr-2"></i>{{$blog->pengunjung}}</h6>
                                        <div class="clearfix"></div>
                                        <h2 class="post-title mt-2 mb-2 pr-3">
                                            <span class="lh-30 font-sm mont-font text-grey-800 fw-700">{{$blog->judul}}</span>
                                        </h2>                                
                                        <div class="font-xsss fw-400 text-grey-500 lh-26 mt-0 mb-2 pr-3 text-desc">{!!$blog->isi!!}</div>
                                    </div>                              
                                </div>
                            </a>
                        </article>
                    </div>
                    @empty
                    <h3 class="font-lg fw-500 text-grey-900 text-center">Blog tidak ditemukan</h3>
                    
                    @endforelse
                     
                </div>
            </div>    
            
            <div>
                @empty(!$blogs)
                    
                {!! $blogs->links() !!}
                @endempty
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/lozad/dist/lozad.min.js"></script>
<script>
    const observer = lozad();
    observer.observe();
</script>



@endsection