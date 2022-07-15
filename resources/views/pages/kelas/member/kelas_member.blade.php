@extends('layouts.layout_user')
@section('content')


<div class="content-block">
    <div class="section-full content-inner bg-white wow fadeIn" data-wow-duration="2s" data-wow-delay="0.4s">
        <div class="container">
            <div class="row">
                <!-- Left part start -->
                <div class="col-lg-8 col-md-7 col-sm-12 ">
                    <div class="dlab-media m-b30 rounded-lg p-5 border">
                        
                        <img src="{{ $data->poster != null ? asset($data->poster) : 'https://images.unsplash.com/photo-1500989145603-8e7ef71d639e?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=876&q=80'}}" alt="">
                        
                    </div>
                    <h2 class="dlab-title">{{$data['judul']}}</h2>

                    <div class="dlab-post-text">
                        <h5>Tentang kelas</h5>

                        <div>
                            {{$data['tentang']}}
                        </div>

                        <h5 class="mt-4">Deskripsi</h5>

                        <div>
                            {!!$data['desc']!!}
                        </div>

                        <h5 class="mt-4">Materi</h5>

                        <div class="dlab-accordion box-sort-in m-b30 space active-bg" id="accordion002">
                            @forelse ($babs as $bab)
                            <div class="panel">
                                <div class="acod-head">
                                    <h6 class="acod-title"> 
                                        <a  href="javascript:void(0);" data-bs-toggle="collapse" aria-expanded="true" data-bs-target="#collapse-{{$bab['id']}}" >
                                        <i class="ti-user m-r10"></i> 
                                        {{$bab['nama']}}
                                        </a> 
                                    </h6>
                                </div>
                                <div id="collapse-{{$bab['id']}}" class="acod-body collapse show" data-bs-parent="#accordion002">
                                    <div class="acod-content">
                                        <ul class="list-chevron-circle primary">
                                            @forelse ($bab->isi_bab as $materi)
                                            
											<li>
                                                <a href="{{route('enrollMateriKelas',['id'=>$data->id, 'ids'=>$bab->id])}}"> {{$materi['judul']}}</a>
                                               
                                            </li>
											
                                            @empty 
                                            @endforelse
										</ul>
                                    </div>
                                </div>
                            </div>
                            @empty  
                            @endforelse
                        </div>

                    </div>
                </div>

                <div class="col-lg-4 col-md-5 col-sm-12 m-b30">
                    <div class="bx-style-1 p-a30 center m-b30 bg-white border">
                        <div class="icon-content">

                            <h6 class="dlab-tilte text-uppercase">
                                Kategori
                            </h6>

                            <p class="">
                                {{$data->kategori->nama}}
                                
                            </p>
                            
                            <h6 class="dlab-tilte text-uppercase">
                                Yang akan kamu pelajari
                            </h6>
                            
                            <ul  class="list-checked black">
                                {!!$data['poin_produk']!!}
                            </ul>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection