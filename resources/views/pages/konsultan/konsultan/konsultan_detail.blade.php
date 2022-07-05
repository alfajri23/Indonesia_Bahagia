@extends('layouts.layout_konsultan')

@section('content')

<div class="container-fluid">
    <div class="card shadow mb-4 p-3">
        <div class="row">
            <div class="col-4">
                <img src="{{asset($data->foto)}}" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-8">
                <button onclick="reset({{$data->id}})" type="button" class="btn btn-warning btn-sm float-end ">Reset password</button>
                <a href="{{route('konsultanEdit')}}" class="btn btn-success btn-sm float-end mx-1">Edit</a>
                
                <div class="card-body">
                    <h5 class="card-title fw-bold text-dark mb-0">{{$data->nama}}</h5>
                    <span class="badge {{$data->status == 1 ? 'bg-success' : 'bg-danger mb-4'}}">{{$data->status == 1 ? 'aktif' : 'nonaktif'}}</span>
                    <p class="text-gray-800 mb-0">STR   : {{$data->STR}}</p>
                    <p class="text-gray-800 mb-0">SIPP  : {{$data->SIPP}}</p>
                    <p class="text-gray-800 mb-0">Email : {{$data->email}}</p>
                    <p class="text-gray-800 mb-0">Tel   :{{$data->telepon}}</p>
                    <p class="card-text">{!!$data->tentang!!}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4 p-3">
        <div class="row">
            <div class="container">
                <div class="mb-5">
                    <div>
                        <button onclick="add()" type="button" class="btn btn-success btn-sm float-end ">Tambah</button>
                    </div>
                    <h4 class="font-weight-bold">Pendidikan</h4>
                </div>

                @forelse ($data->pendidikans as $pendidikan)
                <div class="ms-2 my-2">
                    <i onclick="edit({{$pendidikan->id}})" style="cursor:pointer" class="fa fa-pencil float-end" aria-hidden="true"></i>
                    <h4 class="small font-weight-bold mb-1">{{$pendidikan->universitas}}</h4>
                    <p><span></span>{{$pendidikan->jurusan}} {{$pendidikan->tambahan}} | <span class="fw-light">{{$pendidikan->tahun}}</span></p>
                </div>
                @empty   
                @endforelse
            </div>
        </div>
    </div>

    <div class="card shadow mb-4 p-3">
        <div class="row">
            <div class="container">
                <div class="mb-5">
                    <div>
                        <button onclick="add_layanan({{$data->id}})" type="button" class="btn btn-success btn-sm float-end ">Tambah</button>
                    </div>
                    <h4 class="font-weight-bold">Layanan</h4>
                </div>

                @forelse ($data->layanans as $layanan)
                <div class="ms-2 my-3" id="layanan-{{ $layanan->id }}"> 
                    <i onclick="deleteLayanan({{$layanan->id}})" style="cursor:pointer" class="fas fa-trash float-end" aria-hidden="true"></i>
                    <h6 class="font-weight-bold mb-1">{{$layanan->layanan->nama}}</h6>
                </div>
                @empty   
                @endforelse
            </div>
        </div>
    </div>

    <div class="card shadow mb-4 p-3">
        <div class="row">
            <div class="container">
                <div class="mb-5">
                    <div>
                        <button onclick="add_jadwal({{$data->id}})" type="button" class="btn btn-success btn-sm float-end ">Tambah</button>
                    </div>
                    <h4 class="font-weight-bold">Jadwal</h4>
                </div>

                @forelse ($jadwals as $key => $hari)
                <div class="ms-2 my-3"> 
                    <h6 class="font-weight-bold mb-2 text-gray-800">{{$key}}</h6>

                    
                    <div class="row">
                        @forelse ($hari as $jam)
                        <div class="col-2" id="jadwal-{{$jam->id}}">
                            <div class="card">
                                <div class="card-body p-2">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                {{$jam->jam}}
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i onclick="deleteJadwal({{$jam->id}})" style="cursor:pointer" class="fas fa-trash text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty    
                        @endforelse
                    </div>
                    
                        
                    
                </div>
                @empty   
                @endforelse
            </div>
        </div>
    </div>

</div>

{{-- Modal Detail --}}
<div class="modal fade" id="modalDetail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Detail pendidikan</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body py-4">
            <div class="card-body">
                <div class="row">
                    <form action="{{route('storePendidikan')}}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label class="fw-700 text-grey-800 display2-md-size">Universitas</label>
                        <input type="text" name="id" id="id" hidden>
                        <input type="text" name="id_konsultan" value="{{$data->id}}" hidden>
                        <input type="text" name="universitas" id="univ" class="form-control">
                    </div>
    
                    <div class="mb-3">
                        <label class="fw-700 text-grey-800 display2-md-size">Jurusan</label>
                        <input type="text" name="jurusan" id="jurusan" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="fw-700 text-grey-800 display2-md-size">Tambahan</label>
                        <input type="text" name="tambahan" id="tambahan" class="form-control">
                    </div>
    
                    <div class="mb-3">
                        <label class="fw-700 text-grey-800 display2-md-size">Tahun</label>
                        <input type="year" name="tahun" id="tahun" class="form-control">
                    </div>

                    <div>
                        <button type="submit" class="btn btn-success mb-2">Tambahkan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>

{{-- Modal Layanan --}}
<div class="modal fade" id="modalLayanan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah layanan</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body py-4">
            <div class="card-body">
                <div class="row">
                    <form action="{{route('addLayananKonsultan')}}" method="post">
                    @csrf
                    <input type="text" name="id_konsultan" value="{{$data->id}}" hidden>
                    <div id="layananKonsultan">

                    </div>
                    

                    <div>
                        <button type="submit" class="btn btn-success mb-2">Tambahkan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>

{{-- Modal Jadwal --}}
<div class="modal fade" id="modalJadwal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Jadwal</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body py-4">
            <div class="card-body">
                <div class="row">
                    <form action="{{route('addJadwalKonsultan')}}" method="post">
                    @csrf
                    <input type="text" name="id_konsultan" value="{{$data->id}}" hidden>

                    <label for="exampleInputEmail1" class="form-label">Hari</label>
                    <select class="form-select" aria-label="Default select example" name="hari">
                        <option selected>Open this select menu</option>
                        <option value="senin">senin</option>
                        <option value="selasa">selasa</option>
                        <option value="rabu">rabu</option>
                        <option value="kamis">kamis</option>
                        <option value="jumat">jumat</option>
                        <option value="sabtu">sabtu</option>
                        <option value="minggu">minggu</option>
                    </select>

                    <div class="row my-3">
                        <div class="col">
                            <label for="exampleInputEmail1" class="form-label">Jam mulai</label>
                            <input type="time" class="form-control" name="time_start">
                        </div>
                        <div class="col">
                            <label for="exampleInputEmail1" class="form-label">Jam selesai</label>
                            <input type="time" class="form-control" name="time_end">
                        </div>
                    </div>

                    <div>
                        <button type="submit" class="btn btn-success mb-2">Tambahkan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    function reset(id){
        $.ajax({
            type : 'GET',
            url  : "{{ route('konsultanAdminReset') }}",
            data : {
                id : id
            },
            dataType: 'json',
            success : (data)=>{
               alert("Password baru : " + data.data);
            }
        });
    }

    function nonaktif(id){
        $.ajax({
            type : 'POST',
            url  : "{{ route('konsultanAdminNonaktif') }}",
            data : {
                id : id
            },
            dataType: 'json',
            success : (data)=>{
               alert(data.data);
            }
        });
    }

    function aktif(id){
        $.ajax({
            type : 'POST',
            url  : "{{ route('konsultanAdminAktif') }}",
            data : {
                id : id
            },
            dataType: 'json',
            success : (data)=>{
               alert(data.data);
            }
        });
    }

    function add_layanan(id){
        $.ajax({
            type : 'GET',
            url  : "{{ route('showKonsultanLayanan') }}",
            data : {
                id : id
            },
            dataType: 'json',
            success : (data)=>{
                let layanan = data.data;
                console.log(layanan);

                if(layanan != null) {
                    function mapFile(item) {
                        return `
                        <div class="form-check my-1">
                            <input class="form-check-input" name="id_layanan[]" type="checkbox" value="${item.id}" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                ${item.nama}
                            </label>
                        </div>
                        `;
                    }
                    layanans = layanan.map(mapFile);
                }else{
                    layanans = 'tidak ada';
                }

                $('#layananKonsultan')[0].innerHTML = layanans;

                $('#modalLayanan').modal('show');




            }
        });

    }

    function deleteLayanan(id){
        // let route = "{{ route('deleteLayananKonsultan') }}";
        // let status = swalActionWithoutTable(route,id,'hapus layanan untuk konsultan ini ?')
        // if(status){
        //     $('#layanan-' + id).remove();
        // }

        $.ajax({
            type : 'GET',
            url  : "{{ route('deleteLayananKonsultan') }}",
            data : {
                id : id
            },
            dataType: 'json',
            success : (data)=>{
                swal("Sukses", data.message, "warning");
                $('#layanan-' + id).remove();
            }
        });
    }

    function add_jadwal(){
        $('#modalJadwal').modal('show');
    }

    function deleteJadwal(id){
        //let route = "{{ route('deleteJadwalKonsultan') }}";
        $.ajax({
            type : 'GET',
            url  : "{{ route('deleteJadwalKonsultan') }}",
            data : {
                id : id
            },
            dataType: 'json',
            success : (data)=>{
                swal("Sukses", data.message, "warning");
                $('#jadwal-' + id).remove();
            }
        });

        // let status = swalActionWithoutTable(route,id,'hapus jadwal untuk konsultan ini ?');
        // console.log(status);
        

        // setTimeout(()=>{
        //     console.log(status);
        //     if(status){
        //         $('#jadwal-' + id).remove();
        //     }
        // }, 9000);


    }

    function add(){
        $('#modalDetail').modal('show');
    }

    function edit(id){
        $.ajax({
            type : 'GET',
            url  : "{{ route('getPendidikan') }}",
            data : {
                id : id
            },
            dataType: 'json',
            success : (data)=>{
                $('#id').val(data.data.id);
                $('#univ').val(data.data.universitas);
                $('#jurusan').val(data.data.jurusan);
                $('#tambahan').val(data.data.tambahan);
                $('#tahun').val(data.data.tahun);

                $('#modalDetail').modal('show');
            }
        });
    }
</script>

@endsection