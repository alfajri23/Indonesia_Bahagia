@extends('layouts.layout_admin')

@section('content')

<div class="container-fluid">

    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Event</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <div>
                <a href="{{route('addEvent')}}" class="btn btn-primary">Tambah</a>
                <a href="{{route('eventPast')}}" class="btn btn-outline-secondary">Riwayat</a>
            </div>
        </div>
    </div>
    
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered tableEvent" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Judul</th>
                            <th>Konsultan</th>
                            <th>Tipe</th>
                            <th>Tanggal</th>
                            <th>Harga</th>
                            <th>Poster</th>
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
    $(function (){
        let tabel = $('.tableEvent');

        tabel.DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('eventAdmin') }}",
            columns: [
                {
                    data: 'DT_RowIndex', 
                    name: 'DT_RowIndex', 
                    nameorderable: true, 
                    searchable: true
                },
                {data: 'judul', name: 'judul'},
                {data: 'vendor', name: 'vendor'},
                {data: 'tipe', name: 'tipe'},
                {data: 'tanggal', name: 'tanggal'},
                {data: 'harga', name: 'harga'},
                {data: 'poster', name: 'poster'},
                {data: 'status', name: 'status'},
                {data: 'action', name: 'action'},
            ]
        })
    })

    //  Untuk template baru, dom tidak bisa disimpan pada variabel ( tabel ) 
    //  harus langsung lempar domnya

    function deleteEvent(id){
        const route_del = "{{ route('deleteEvent') }}";
        const pesan_del = "Jika dihapus data akan hilang di user dan Admin";

        swalAction(route_del,$('.tableEvent'),id,pesan_del);
    }

    function endEvent(id){
        const route_end = "{{ route('endEvent') }}";
        const pesan_end = "Event akan dihentikan";

        swalAction(route_end,$('.tableEvent'),id,pesan_end);
    }

    function startEvent(id){
        const route_end = "{{ route('startEvent') }}";
        const pesan_end = "Event akan berlangsung";

        swalAction(route_end,$('.tableEvent'),id,pesan_end);
    }

</script>

@endsection