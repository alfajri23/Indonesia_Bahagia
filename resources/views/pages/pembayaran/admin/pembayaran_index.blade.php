@extends('layouts.layout_admin')

@section('content')

<style>
    p{
        color: black;
    }

    .btn-group, .btn-group-vertical {
        position: absolute;
        display: inline-flex;
        vertical-align: middle;
        z-index: 5;
    }
</style>

<div class="card">
    <div class="card-body">
    <h1 class="fw-bolder mb-4">Transaksi {{$_GET['tipe']}}</h1>

    <div class="table-responsive">

        <div class="row justify-content-center">
            <div class="col-6">
                @if ($_GET['tipe'] == 'ditolak' || $_GET['tipe'] == 'belum_bayar')
                <div class="btn-group" role="group" aria-label="Basic example">
                    <button onclick="check_all()" class="btn btn-secondary btn-sm">Check all</button>
                    <button onclick="deleteMulti()" class="btn btn-danger btn-sm">Delete All</button>
                </div>
                @endif
            </div>
        </div>


        <table class="table table-bordered display tableTransaksi" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>v</th>
                    <th>No</th>
                    <th>Tipe</th>
                    <th>Nama</th>
                    <th>Member</th>
                    <th>Nominal</th>
                    <th>Tanggal</th>
                    <th>Status bayar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
    </div>

</div>

{{-- Modal Detail --}}
<div class="modal fade" id="modalDetail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Detail transaksi</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body py-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="row">
                            <div class="col-4">
                                <p>Nama</p>
                                <p>Status bayar</p>
                                <p>Nominal</p>
                                <p>Tanggal bayar</p>
                                <p>Bukti</p>
                                <p>File tambahan</p>
                            </div>
                            <div class="col-8" id="modalBody">
                            </div>
                        </div>
                    </div>

                    <div class="col-6" id="detailKonsultasi">
                        <div class="row">
                            <div class="col-6">
                                <p>Nama Konsultan</p>
                                <p>Nama Pasien</p>
                                <p>Hari</p>
                                <p>Tanggal konsul</p>
                                <p>Jam Konsul</p>
                                <p>Lanjutan</p>
                            </div>
                            <div class="col-6" id="modalKonsultasi">
    
                            </div>
                        </div>
                    </div>

                </div>

                <div class="mt-3 row">
                    <div id="konfirmasiSection">
                        <button type="button" class="btn btn-primary btn-sm">Small button</button>
                        <button type="button" class="btn btn-secondary btn-sm">Small button</button>
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

    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    let ajax = urlParams.get('tipe');

    
    $(function (){
        let tabel = $('.tableTransaksi');

        tabel.DataTable({
            order: [[7, 'desc']],
            processing: true,
            serverSide: true,
            ajax: {
                url : "{{ route('transaksiAdmin')}}",
                data : {
                    tipe : "{{$_GET['tipe']}}"
                }
            },
            columns: [
                {data: 'checkbox', name: 'checkbox',width: "5%"},
                {
                    data: 'DT_RowIndex', 
                    name: 'DT_RowIndex', 
                    nameorderable: true, 
                    searchable: true,
                    width: "5%"
                },
                {data: 'tipe', tipe: 'tipe'},
                {data: 'nama', name: 'nama',width: "40%"},
                {data: 'user', name: 'user',width: "10%"},
                {data: 'nominal', name: 'nominal'},
                {data: 'tanggal_bayar', name: 'tanggal_bayar'},
                {data: 'bayar', name: 'bayar',width: "5%"},
                {data: 'aksi', name: 'aksi',width: "15%"},
            ],
            dom: 'Bfrtlip',

        })
    })

    function detail(id){
        $.ajax({
            type : 'GET',
            url  : "{{ route('transaksiDetail') }}",
            data : {
                id : id
            },
            dataType: 'json',
            success : (data)=>{
                let datas = data.data;
                let modalBody = $('#modalBody');
                let bukti,file_tambahan;
                let asset,konfirmasi;

                //asset = window.location.origin + '/public';
                asset = window.location.origin;
        
                //Bukti bayar
                bukti = `<a target="_blank" href="${asset}/${datas.bukti}">Bukti</a>`;

                //JIka ada file tambahan
                if(datas.file_tambahan != null && datas.file_tambahan != ""){
                    file_tambahan = datas.file_tambahan.split(",");
                    function mapFile(item) {
                        return `<a href="${asset}/${item}" target="_blank">File</a>`;
                    }
                    file_tambahan = file_tambahan.map(mapFile);
                }


                if(datas.status != 'lunas'){
                    konfirmasi = `
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button onclick="tolak(${datas.id})" class="btn btn-danger btn-sm">Tolak</button>
                        <button onclick="konfirmasi_bank(${datas.id})" class="btn btn-success">Konfirmasi</button>
                    </div>
                    `;    
                }else{
                    konfirmasi = `
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button onclick="tolak(${datas.id})" class="btn btn-danger btn-sm">Tolak</button>
                    </div>
                    `; 
                }


                let element = ` 
                    <p>:  ${datas.nama}</p>
                    <p>:  ${datas.status}</p>
                    <p>:  Rp. ${datas.harga}</p>
                    <p>:  ${datas.tanggal_bayar}</p>
                    <p>:  ${bukti}</p>
                    <p>:  ${file_tambahan}</p>
                `;
            
                modalBody[0].innerHTML = element;
                $('#konfirmasiSection')[0].innerHTML = konfirmasi;


                //Menghilangkan detail konsultai
                let detailKonsul = $('#detailKonsultasi');
                detailKonsul.attr('class', 'd-none');
                

                $('#modalDetail').modal('show');
                
            }
        });

    }

    function detailKonsultasi(id){
        let konfirmasi_konsultasi;

        $.ajax({
            type : 'GET',
            url  : "{{ route('transaksiDetail') }}",
            data : {
                id : id
            },
            dataType: 'json',
            success : (data)=>{
                let datas = data.data;
                let modalBody = $('#modalBody');
                let bukti,file_tambahan;
                let asset;
                

                //asset = window.location.origin + '/public';
                asset = window.location.origin;
        
                //Bukti bayar
                bukti = `<a target="_blank" href="${asset}/${datas.bukti}">Bukti</a>`;

                //JIka ada file tambahan
                if(datas.file_tambahan != null && datas.file_tambahan != ""){
                    file_tambahan = datas.file_tambahan.split(",");
                    function mapFile(item) {
                        return `<a href="${asset}/${item}" target="_blank">File</a>`;
                    }
                    file_tambahan = file_tambahan.map(mapFile);
                }


                if(datas.status != 'lunas'){
                    konfirmasi_konsultasi = `
                    
                        <button onclick="tolak(${datas.id})" class="btn btn-danger btn-sm">Tolak</button>
                        <button onclick="konfirmasi_bank(${datas.id})" class="btn btn-info btn-sm">Konfirmasi</button>
                   
                    `;    
                }else{
                    konfirmasi_konsultasi = `
                    
                        <button onclick="tolak(${datas.id})" class="btn btn-danger btn-sm">Tolak</button>
                    
                    `; 
                }

                let element = ` 
                    <p>:  ${datas.nama}</p>
                    <p>:  ${datas.status}</p>
                    <p>:  Rp. ${datas.harga}</p>
                    <p>:  ${datas.tanggal_bayar}</p>
                    <p>:  ${bukti}</p>
                    <p>:  ${file_tambahan}</p>
                `;
            
                modalBody[0].innerHTML = element;  
               
                  
                let detailKonsul = $('#detailKonsultasi');
                detailKonsul.attr('class', 'col-6');
            }
        });

        $.ajax({
            type : 'GET',
            url  : "{{ route('pendaftaranDetailTransaksi') }}",
            data : {
                id : id
            },
            dataType: 'json',
            success : (data)=>{
                let konsul = data.data;
                let element_konsul = ` 
                    <p>:  ${konsul.nama}</p>
                    <p>:  ${konsul.name}</p>
                    <p>:  ${konsul.hari}</p>
                    <p>:  ${konsul.tanggal}</p>
                    <p>:  ${konsul.jam}</p>
                    <p>:  ${konsul.lanjutan}</p>
                `;

                konfirmasi_konsultasi += `
                    <a href="https://wa.me/${konsul.telepon}?text=Hallo%20${konsul.nama}%0AAda%20tawaran%20konsultasi%20atas%20nama%20${konsul.name}%0AHari%20${konsul.hari}%0ATanggal%20${konsul.tanggal}%0AJam%20${konsul.jam}%0ALanjutan%20${konsul.lanjutan}%0AApakah%20Anda%20bersedia%0A%0A%0A%0A%0AAdmin%2C%0AHallo%20Bahagia%0A" target="_blank" class="btn btn-success btn-sm">
                        Chat konsultan
                        <i class="fa-brands fa-whatsapp"></i>
                    </a>
                `;

                $('#modalKonsultasi')[0].innerHTML = element_konsul;
                $('#konfirmasiSection')[0].innerHTML = konfirmasi_konsultasi;

                $('#modalDetail').modal('show');

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
                console.log(data);
                swal('datas', "Pembayaran telah dikonfirmasi", "success");
                $('#modalDetail').modal('hide');
                $('.tableTransaksi').DataTable().ajax.reload();
            }
        });
    }

    function tolak(id){
        $.ajax({
            type : 'GET',
            url  : "{{ route('transaksiTolak') }}",
            data : {
                id : id
            },
            dataType: 'json',
            success : (data)=>{
                let datas = data.data;
                swal(datas, "Pembayaran telah ditolak", "success");
                $('#modalDetail').modal('hide');
                $('.tableTransaksi').DataTable().ajax.reload();
            }
        });
    }

    function deletes(id){
        const route = "{{ route('transaksiDelete') }}";
        const tabel = $('.tableTransaksi');
        const pesan_hapus = "Jika dihapus data akan hilang";

        swalAction(route,tabel,id,pesan_hapus);
    }

    function deleteMulti(){
        swal({
            title: "Are you sure?",
            text: "Jika dihapus maka data akan hilang",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                let check = document.querySelectorAll('.form-check-input');
                let data_check = [];
                check.forEach((data)=>{
                    if(data.checked){
                        data_check.push(data.value);
                    }
                })

                $.ajax({
                    type : 'GET',
                    url  : "{{ route('transaksiDeleteMulti') }}",
                    data : {
                        data : JSON.stringify(data_check),
                    },
                
                    dataType: 'json',
                    success : (datas)=>{
                        $('.tableTransaksi').DataTable().ajax.reload();
                    }

                });
            } else {
                swal("Aman", "Data Anda aman", "success");
            }
        });

        
    }

    function check_all(){
        $('input[type="checkbox"]').prop("checked", true);
    }




</script>

@endsection