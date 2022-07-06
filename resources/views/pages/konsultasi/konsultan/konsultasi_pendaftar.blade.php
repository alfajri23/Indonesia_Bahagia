@extends('layouts.layout_konsultan')

@section('content')

<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Pendaftaran Konsultasi</h1>

    <div class="table-responsive">
        <table class="table table-bordered tablePendaftaran" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Pasien</th>
                    <th>Tanggal</th>
                    <th>Jam</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

</div>

<!-- Modal Detail -->
<div class="modal fade" id="modalDetail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Detail transaksi</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="card-body">
                <div class="row">
                    <div class="col-3">
                        <p>Nama Pasien</p>
                        <p>Hari</p>
                        <p>Tanggal konsul</p>
                        <p>Jam Konsul</p>
                        <p>Lanjutan</p>
                        <p>Catatan pasien</p>
                    </div>
                    <div class="col-8" id="modalKonsultasi">
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            'Authorization': `Bearer {{Session::get('token')}}`
        }
	});

    $(function (){

        $('.tablePendaftaran').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('pendaftaranKonsultasiKonsultan') }}",
            columns: [
                {
                    data: 'DT_RowIndex', 
                    name: 'DT_RowIndex', 
                    nameorderable: true, 
                    searchable: true,
                    width: "5%"
                },
                {data: 'nama', name: 'nama',width:"20%"},
                {data: 'pasien', name: 'pasien',width: "10%"},
                {data: 'tanggal', name: 'tanggal',width: "10%"},
                {data: 'jam', name: 'jam',width: "15%"},
                {data: 'status', name: 'status',width: "5%"},
                {data: 'aksi', name: 'aksi',width: "13%"},
            ],
            // dom: 'Bfrtlip',
            buttons: [
                {
                    extend: 'copyHtml5',
                    header : false,
                    title: '',
                    exportOptions: {
                        header : false,
                        columns : [ 0,1,2,3,4,5]
                    },
                },
                {
                    extend: 'excelHtml5',
                    title: 'Data Konsultasi',
                    exportOptions: {
                        columns : [ 0,1,2,3,4,5]
                    },
                },
                {
                    extend: 'csvHtml5',
                    title: 'Data Konsultasi',
                    exportOptions: {
                        columns : [ 0,1,2,3,4,5]
                    },
                },
            ]
        })
    })

    function doneStatus(id){
        const route = "{{ route('pendaftaranKonsultasiDoneStatusKonsultan') }}";
        const tabel = $('.tablePendaftaran');
        const pesan_hapus = "Konsultasi telah selesai";


        swal("Konsultasi telah selesai ?",{
            buttons: {
                selesai: "selesai",
                catch: {
                    text: "selesai dan beri catatan",
                    value: "catch",
                },
                cancel: "cancel",
            },
        })
        .then((value) => {
            switch (value) {
            
                case "catch":
                    swal({
                        text: 'Beri catatan ke pasien',
                        content: "input",
                        button: {
                            text: "Kirim",
                            closeModal: false,
                        },
                    })
                    .then(name => {
                        if (!name) throw null;

                        $.ajax({
                            type : 'GET',
                            url  : route,
                            data : {
                                id : id,
                                catatan : name
                            },
                            dataType: 'json',
                            success : (data)=>{
                                swal("Sukses", data.message, "warning");
                                tabel.DataTable().ajax.reload();
                            }
                        })
                    })
                    .catch(err => {
                        if (err) {
                            swal("Oh noes!", "The AJAX request failed!", "error");
                        } else {
                            swal.stopLoading();
                            swal.close();
                        }
                    });
                    break;
                
                case "selesai":
                    $.ajax({
                        type : 'GET',
                        url  : route,
                        data : {
                            id : id,
                            catatan : name
                        },
                        dataType: 'json',
                        success : (data)=>{
                            swal("Sukses", data.message, "warning");
                            tabel.DataTable().ajax.reload();
                        }
                    })
                    //swal("Selesai", "Tidak ada perubahan", "success");
                    break;
            
                default:
                    swal("Aman", "Tidak ada perubahan", "success");
            }
        });

    }

    function detail(id){
        $.ajax({
            type : 'GET',
            url  : "{{ route('pendaftaranKonsultasiDetailKonsultan') }}",
            data : {
                id : id
            },
            dataType: 'json',
            success : (data)=>{
                let konsul = data.data;

                let lanjutan = konsul.lanjutan == 0 ? 'tidak' : 'iya';
                let element_konsul = ` 
                    <p>:  ${konsul.name}</p>
                    <p>:  ${konsul.hari}</p>
                    <p>:  ${konsul.tanggal}</p>
                    <p>:  ${konsul.jam}</p>
                    <p>:  ${lanjutan}</p>
                    <p>:  ${konsul.masalah}</p>
                `;

                $('#modalKonsultasi')[0].innerHTML = element_konsul;

                $('#modalDetail').modal('show');
                
            }
        });

    }
    
    
    function tolak(id_transaksi,id_enroll){
        $.ajax({
            type : 'GET',
            url  : "{{ route('transaksiTolak') }}",
            data : {
                id : id_transaksi
            },
            dataType: 'json',
            success : (data)=>{
                console.log(data)
                $.ajax({
                    type : 'GET',
                    url  : "{{ route('deleteEnrollEvent') }}",
                    data : {
                        id : id_enroll
                    },
                    dataType: 'json',
                    success : (data)=>{
                        swal('datas', "Pembayaran telah dikonfirmasi", "success");
                        $('#modalDetail').modal('hide');
                        $('.tablePendaftaran').DataTable().ajax.reload();
                    }
                });
            }
        });



    }

    function konfirmasi_bank(id){
        $.ajax({
            type : 'GET',
            url  : "{{ route('transaksiBankKonfirmasi') }}",
            data : {
                id : id
            },
            dataType: 'json',
            success : (data)=>{
                let datas = data.data;
                swal(datas, "Pembayaran telah dikonfirmasi", "success");
                $('#modalDetail').modal('hide');
                $('.tablePendaftaran').DataTable().ajax.reload();
            }
        });
    }


</script>

@endsection
