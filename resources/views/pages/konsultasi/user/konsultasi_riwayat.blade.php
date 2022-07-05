@extends('layouts.layout_user')
@section('content')

<style>
    .form-control{
        line-height: 1rem !important;
    }
</style>

<div class="page-nav pt-lg--7 pb-lg--7 pb-5 pt-5">
    <div class="container">
        <div class="row">
            <div class="col-12 shadow-xss">
                @include('components.tab.pembayaran.tab_pembayaran')
            </div>

            <div class="col-12 mt-5">
                @if(Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{Session::get('success')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @endif
                <div class="card d-block w-100 border-0 shadow-xss rounded-lg overflow-hidden p-4">
                    <div class="card-body pb-0">
                        <div class="row">
                            @forelse ($datas as $data)
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-4 border p-3 rounded-xxl">
                                <h6 class="font-md fw-700 text-grey-700 mb-0">{{$data->nama}}</h6>
                                <h6 class="font-xss fw-600 text-grey-700 mb-0">{{$data->nama_konsultan}}</h6>
                                <span class="badge bg-whatsup mb-3">{{$data->status}}</span>
                                
                                <h6 class="font-xssss text-grey-600 fw-600 mb-1"><i class="ti-time mr-1"></i> {{$data->jam}}</h6>
                                <h6 class="font-xssss text-grey-600 fw-600"><i class="ti-calendar mr-1"></i> {{date_format(date_create($data->tanggal),"d M Y")}}</h6> 
                                
                                <div class="text-end">
                                    <a onclick="testiModal('{{base64_encode($data->id_konsultan)}}')" class="cursor-pointer font-xsss text-primary fw-600">beri penilaian</a>
                                </div>
                            </div>  
                            @empty
                            <h2 class="font-xl fw-600 font-grey-700 text-center">Belum ada event yang kamu ikuti</h2>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="testiModal" tabindex="-1" aria-labelledby="testiModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="testiModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="contact" action="{{route('testimoniStore')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="text" name="id_k" id="id_k">
                <div class="mb-3">
                  <label for="message-text" class="col-form-label">Message:</label>
                  <textarea name="pesan" class="form-control" rows="6" id="message-text" required></textarea>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary btn-sm">Kirim</button>
                </div>
            </form>
        </div>
      </div>
    </div>
</div>


<script>
    function testiModal(id){
        $('#id_k').val(atob(id));
        $('#testiModal').modal('show');

    }
</script>

@endsection