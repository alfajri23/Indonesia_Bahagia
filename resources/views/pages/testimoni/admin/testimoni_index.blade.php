@extends('layouts.layout_admin')

@section('content')

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h1 class="fw-bolder mb-3">Testimoni</h1>

            <div class="table-responsive">
                <table class="table table-bordered tableTestimoni" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Pesan</th>
                            <th>Status</th>
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

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            'Authorization': `Bearer {{Session::get('token')}}`
        }
	});

    $(function (){

        let tabel = $('.tableTestimoni');

        tabel.DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('testimoniAdmin') }}",
            columns: [
                {
                    data: 'DT_RowIndex', 
                    name: 'DT_RowIndex', 
                    nameorderable: true, 
                    searchable: true,
                    width: "5%"
                },
                {data: 'nama', name: 'nama',width:"10%"},
                {data: 'pesan', name: 'pesan',width:"50%"},
                {data: 'status', name: 'status',width: "5%"},
                {data: 'aksi', name: 'aksi',width: "10%"},
            ],
        })
    })

    function aktif(id) {
        const route = "{{ route('testimoniAdminAktif') }}";
        const tabel = $('.tableTestimoni');
        const pesan_hapus = "Munculkan testimoni di halaman utama";

        swalAction(route,tabel,id,pesan_hapus);
    }

    function nonaktif(id) {
        const route = "{{ route('testimoniAdminNonaktif') }}";
        const tabel = $('.tableTestimoni');
        const pesan_hapus = "Sembunykan testimoni di halaman utama";

        swalAction(route,tabel,id,pesan_hapus);
    }


</script>

@endsection