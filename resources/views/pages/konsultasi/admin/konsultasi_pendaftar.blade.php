@extends('layouts.layout_admin')

@section('content')

<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Pendaftaran Konsultasi</h1>

    <div class="table-responsive">
        <table class="table table-bordered tablePendaftaran" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Konsultan</th>
                    <th>Pasien</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

</div>

<!-- Modal -->
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
                    <div class="col-4">
                        <p>Nama Konsultan</p>
                        <p>Nama Pasien</p>
                        <p>Hari</p>
                        <p>Tanggal konsul</p>
                        <p>Jam Konsul</p>
                        <p>Lanjutan</p>
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
            ajax: "{{ route('pendaftaranKonsultasi') }}",
            columns: [
                {
                    data: 'DT_RowIndex', 
                    name: 'DT_RowIndex', 
                    nameorderable: true, 
                    searchable: true,
                    width: "5%"
                },
                {data: 'nama', name: 'nama',width:"20%"},
                {data: 'konsultan', name: 'konsultan',width:"10%"},
                {data: 'pasien', name: 'pasien',width: "10%"},
                {data: 'tanggal', name: 'tanggal',width: "10%"},
                {data: 'status', name: 'status',width: "5%"},
                {data: 'aksi', name: 'aksi',width: "10%"},
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

    function detail(id){
        console.log("hallo");
        $.ajax({
            type : 'GET',
            url  : "{{ route('pendaftaranKonsultasiDetail') }}",
            data : {
                id : id
            },
            dataType: 'json',
            success : (data)=>{
                let konsul = data.data;
                console.log(konsul);
                let element_konsul = ` 
                    <p>:  ${konsul.nama}</p>
                    <p>:  ${konsul.name}</p>
                    <p>:  ${konsul.hari}</p>
                    <p>:  ${konsul.tanggal}</p>
                    <p>:  ${konsul.jam}</p>
                    <p>:  ${konsul.lanjutan}</p>
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
        // $('.tablePendaftaran').DataTable().ajax.reload();
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
