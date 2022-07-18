@extends('layouts.layout_admin')

@section('content')


    <div class="card">
        <div class="card-body">

            <h3 class="fw-bolder mb-4">Blog Aktif</h3>

            <div class="row justify-content-between align-items-center">
                <div class="col-5">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Kategori</label>
                        <select id="status" class="form-control">
                            <option value="">Pilih</option>
                            @forelse ( $kat as $dt)
                                <option value="{{$dt->id}}">{{$dt->nama}}</option>
                            @empty
                                
                            @endforelse
                        </select>
                    </div>
                </div>

                <div class="col-3">
                    <a href="{{route('blogAdd')}}" class="btn btn-sm btn-success text-white">Tambah</a>
                    <a href="{{route('blogKategori')}}" class="btn btn-sm btn-outline-dark">Setting</a>
                </div>
            </div>
            <p></p>
        </div>
    </div>


    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered display tableBlog" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Id kategori</th>
                            <th>Kategori</th>
                            <th>Penulis</th>
                            <th>Tanggal</th>
                            <th>Tayangan</th>
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

    
    $(function (){
        let tabel = $('.tableBlog');
        let table = tabel.DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('blogAdmin') }}",
            columns: [
                {
                    data: 'DT_RowIndex', 
                    name: 'DT_RowIndex', 
                    nameorderable: true, 
                    searchable: true,
                    width: '5%'
                },
                {data: 'judul', name: 'judul'},
                {data: 'id_kategori', name: 'id_kategori',visible: false},
                {data: 'kategori', name: 'kategori'},
                {data: 'penulis', name: 'penulis'},
                {data: 'tanggal', name: 'tanggal'},
                {data: 'pengunjung', name: 'pengunjung',width: '5%'},
                {data: 'aksi', name: 'aksi'},
            ]
        })

        $('#status').change(function( ){
            table.columns(2)
            .search($(this).val())
            .draw( );
        });
    })

    function unpublish(id){
        $.ajax({
            type : 'GET',
            url  : "{{ route('blogUnpublish') }}",
            data : {
                id : id
            },
            dataType: 'json',
            success : (data)=>{
                $('.tableBlog').DataTable().ajax.reload();
                swal('Berhasil','Blog telah diarsipkan', "success");
            }
        });
    }

    

    

</script>



@endsection