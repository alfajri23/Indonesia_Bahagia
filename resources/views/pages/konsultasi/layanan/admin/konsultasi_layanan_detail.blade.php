@extends('layouts.layout_admin')
@section('content')

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="container my-3">
            <a href="{{route('layananKonsultasiAdminEdit',$data->id)}}" class="btn btn-success text-white btn-sm float-end">Edit</a>
            <h2 class="fw-bold">{{$data->nama}}</h2>

            <h6>Harga</h6>
            <div class="fw-700 text-grey-800 display2-md-size">Rp.{{number_format($data->harga)}}</div>

            <h6 class="mt-4">Deskripsi</h6>
            <div class="fw-700 text-grey-800 display2-md-size">{!!$data->desc!!}</div>

        </div>
    </div>
</div>


<div class="card shadow mb-4">
    <div class="card-body">
        <div class="container">
            <h1 class="h4 mb-2 text-gray-800">Daftar konsultan</h1>
            
            <div class="table-responsive">
                <table class="table table-bordered tablePendaftaran" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

<script>
    $(function (){
        $('.tablePendaftaran').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('layananKonsultasiDetailAdmin',$data->id) }}",
            data : {
                    id : "{{$data->id}}"
            },
            columns: [
                {
                    data: 'id', 
                    name: 'id', 
                    nameorderable: true, 
                    searchable: true,
                    width: "5%"
                },
                {data: 'nama', name: 'nama',width:"20%"},
                {data: 'aksi', name: 'aksi',width: "5%"},
            ],
            // dom: 'Bfrtlip',
        })
    });
</script>


@endsection