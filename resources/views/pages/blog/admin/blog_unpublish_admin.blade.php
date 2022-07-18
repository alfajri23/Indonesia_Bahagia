@extends('layouts.layout_admin')

@section('content')


    <div class="card">
        <div class="card-body">

            <h3 class="fw-bolder mb-4">Blog Terarsip</h3>

            <a href="{{route('blogAdd')}}" class="btn btn-success text-white">Tambah</a>
            <p></p>

            <div class="table-responsive">
                <table class="table table-bordered display tableBlog" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Penulis</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
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
        let tabel = $('.tableBlog');
        tabel.DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('blogAdminUnpublish') }}",
            columns: [
                {
                    data: 'DT_RowIndex', 
                    name: 'DT_RowIndex', 
                    nameorderable: true, 
                    searchable: true
                },
                {data: 'judul', name: 'judul'},
                {data: 'kategori', name: 'kategori'},
                {data: 'penulis', name: 'penulis'},
                {data: 'tanggal', name: 'tanggal'},
                {data: 'aksi', name: 'aksi'},
            ]
        })
    })

    function publish(id){
        $.ajax({
            type : 'GET',
            url  : "{{ route('blogPublish') }}",
            data : {
                id : id
            },
            dataType: 'json',
            success : (data)=>{
                $('.tableBlog').DataTable().ajax.reload();
                swal('Berhasil','Blog siap tampil diberanda', "success");
            }
        });
    }

    function deletes(id){
        swal({
            title: "Are you sure?",
            text: "Jika dihapus maka data akan hilang",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type : 'GET',
                    url  : "{{ route('blogDelete') }}",
                    data : {
                        id : id
                    },
                    dataType: 'json',
                    success : (data)=>{
                        $('.tableBlog').DataTable().ajax.reload();
                        swal('Berhasil','data telah terupdate', "success");
                    }
                });

            } else {
                swal("Aman", "Data Anda aman", "success");
            }
        });
        
    }

</script>



@endsection