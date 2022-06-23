@extends('layouts.layout_admin')
@section('content')

<h1 class="h1 font-weight-bold text-gray-800 mb-4">Kategori blog</h1>
<button type="button" onclick="btnAdd()" class="btn btn-secondary btnAdd">Tambah</button>
<div id="formAdd" class="my-3" style="display:none">
  <form class="form-inline" action="{{route('storeBlogKategori')}}" method="post">
    @csrf
    <div class="form-group">
      <input type="text" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <button type="submit" class="btn btn-secondary">Save</button>
  </form>
</div>
<table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nama</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($data as $dt)
      <tr>
          
        <th scope="row" style="width:5%">{{$loop->iteration}}</th>
        <td style="width:60%">
          <div class="show-{{$dt->id}}">{{$dt->nama}}</div>
        </td>
        <td style="width:20%">
            <div class="btn-group" role="group" aria-label="Basic example">
                <button onclick="edits({{$dt->id}},'{{$dt->nama}}')" type="button" class="btn btn-secondary btn-sm">Edit</button>
                <a href="{{route('deleteBlogKategori',$dt->id)}}" type="button" class="btn btn-danger btn-sm">Delete</a>
            </div>
        </td>
    </tr>
    </form>
      @empty
          
      @endforelse
    </tbody>
</table>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Kategori blog</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="{{route('storeBlogKategori')}}" method="POST" id="formObj">
            @csrf
            <div class="form-group">
                <label for="exampleInputPassword1">Nama</label>
                <input type="hidden" class="form-control" name="id" id="id">
                <input type="text" class="form-control" id="nama" name="nama">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
            <button type="submit" class="btn btn-primary">Kirim</button>
        </div>
        </form>
        </div>
    </div>
</div>

<script>
  

  function edits(id,nama){
    console.log(nama); 
    $('#exampleModal').modal('show');
    $('#id').val(id);
    $('#nama').val(nama);
          
    }

</script>

@endsection