@extends('layouts.layout_user')
@section('content')


<style>
    .text-desc{
        width: 100%;
        overflow: hidden;
        text-overflow: ellipsis;
        height: 72px;
    }
</style>

<div class="page-content bg-gray">
    <!-- inner page banner -->
    <div class="dlab-bnr-inr overlay-black-middle bg-pt">
        <div class="container">
            <div class="dlab-bnr-inr-entry">
                <h1 class="text-white">Blog</h1>
            </div>
        </div>
    </div>
    <!-- inner page banner END -->
    <!-- contact area -->
    <div class="content-area">
        <div class="container-sm">
            <div class="row">
                <!-- Left part start -->
                <div class="col-xl-9 col-lg-8">
                    @forelse ($blogs as $blog)
                        
                    <div class="blog-post blog-md clearfix shadow bg-white">
                        <div class="dlab-post-media dlab-img-effect zoom-slow"> 
                            <img src="{{ $blog->gambar != null ? asset($blog->gambar) : 'https://images.unsplash.com/photo-1500989145603-8e7ef71d639e?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=876&q=80'}}" class="lozad" alt="">
                            {{-- <div class="w-100 p-3">
                                <div 
                                   class="lozad back-img center-img rounded-lg"
                                   data-background-image="{{ $blog->gambar != null ? asset($blog->gambar) : 'https://images.unsplash.com/photo-1500989145603-8e7ef71d639e?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=876&q=80'}}"
                                >
                                </div>
                            </div> --}}
                        </div>
                        <div class="dlab-post-info">
                            <div class="dlab-post-meta">
                                <ul>
                                    <li class=""> 
                                        <i class="ti-folder mr-2"></i>{{$blog->kategori}}
                                    </li>
                                    <li class=""> 
                                        <i class="ti-time mr-1"></i> {{date_format(date_create($blog->updated_at),"d M Y")}} 
                                    </li>
                                    <li class=""> 
                                        <i class="ti-user mr-2"></i>{{$blog->penulis}}
                                    </li>
                                    <li class=""> 
                                        <i class="ti-eye mr-2"></i>{{$blog->pengunjung}}
                                    </li>
                                </ul>
                            </div>
                            <div class="dlab-post-title ">
                                <h4 class="post-title">
                                    <a href="{{route('blogDetailUser',['id'=>$blog->id, 'link'=>$blog->link])}}">
                                        {{$blog->judul}}
                                    </a>
                                </h4>
                            </div>
                            <div class="dlab-post-text text-desc">
                                {!!$blog->isi!!}
                            </div>
                        </div>
                    </div>
                    @empty

                    <h3 class="text-center">Blog tidak ditemukan</h3>
                    
                    @endforelse
                   
                    @empty(!$blogs)
                        {!! $blogs->links() !!}
                    @endempty

                </div>
                <!-- Left part END -->
                <!-- Side bar start -->
                <div class="col-xl-3 col-lg-4">
                    <aside class="side-bar sticky-top">
                        <div class="widget">
                            <h5 class="widget-title style-1">Search</h5>
                            <div class="search-bx style-1">
                                <form role="search" action="{{route('blogUser')}}" method="GET">
                                    <div class="input-group">
                                        <input name="key" class="form-control" placeholder="Enter your keywords..." type="text">
                                        <span class="input-group-btn">
                                            <button type="submit" class="fas fa-search site-button sharp radius-no"></button>
                                        </span> 
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="widget recent-posts-entry">
                            <h5 class="widget-title style-1">Blog popular</h5>
                            <div class="widget-post-bx">
                                @forelse ($populars as $popular)
                                <div class="widget-post clearfix">
                                    <div class="dlab-post-media"> 
                                        <div 
                                           class="lozad back-img center-img rounded-lg"
                                           data-background-image="{{ $popular->gambar != null ? asset($popular->gambar) : 'https://images.unsplash.com/photo-1500989145603-8e7ef71d639e?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=876&q=80'}}"
                                        >
                                        </div>
                                    </div>
                                    <div class="dlab-post-info">
                                        <div class="dlab-post-meta">
                                            <ul>
                                                <li class="post-date"> 
                                                    <i class="la la-clock"></i> 
                                                    {{date_format(date_create($popular->updated_at),"d M Y")}} 
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="dlab-post-header">
                                            <h6 class="post-title">
                                                <a href="{{route('blogDetailUser',['id'=>$popular->id, 'link'=>$popular->link])}}">{{$popular->judul}}</a>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                                @empty

                                @endforelse
                            </div>
                        </div>

                        <div class="widget widget_archive">
                            <h5 class="widget-title style-1">Kategori</h5>
                            <ul>
                                @forelse ($kategories as $kategori)
                                <li><a href="{{ route('filterByCategory',['kategori' => $kategori->id ]) }}">{{$kategori->nama}}</a></li>
                                @empty
                                <li><a href="">Tidak ada</a></li>
                                @endforelse
                            </ul>
                        </div>

                    </aside>
                </div>
                <!-- Side bar END -->
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