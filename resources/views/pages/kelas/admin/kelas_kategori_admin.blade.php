@extends('layouts.layout_admin')
@section('content')

<div class="container">
  <div class="row page-titles mx-0">
      <div class="col-sm-6 p-md-0">
          <div class="welcome-text">
              <h4>Kategori kelas</h4>
          </div>
      </div>
      <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
        <button type="button" onclick="btnAdd()" class="btn btn-secondary btnAdd">Tambah</button>
        <div id="formAdd" class="my-3" style="display:none">
          <form class="form-inline" action="{{route('storeKelasKategori')}}" method="post">
            @csrf
            <div class="row">
              <div class="col-8">
                <div class="form-group">
                  <input type="text" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
              </div>
              <div class="col-4">
                <div>
                  <button type="submit" class="btn btn-secondary">Save</button>
                </div>
              </div>
              

            </div>
          </form>
        </div>
      </div>
  </div>

  <div class="card">
    <div class="card-body">
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
                      <button onclick="edits({{$dt->id}},'{{$dt->nama}}')" type="button" class="btn btn-success text-white btn-sm">Edit</button>
                      <a href="{{route('deleteKelasKategori',$dt->id)}}" type="button" class="btn btn-danger btn-sm">Delete</a>
                  </div>
              </td>
          </tr>
          </form>
            @empty
                
            @endforelse
          </tbody>
      </table>
    </div>
  </div>

  
</div>




<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Kategori kelas</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </button>
        </div>
        <div class="modal-body">
            <form action="{{route('storeKelasKategori')}}" method="POST" id="formObj">
            @csrf
            <div class="form-group">
                <label for="exampleInputPassword1">Nama</label>
                <input type="hidden" class="form-control" name="id" id="id">
                <input type="text" class="form-control" id="nama" name="nama">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success text-white">Simpan</button>
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

  function btnAdd(){
    $('.btnAdd').toggle();
    $('#formAdd').toggle();
  }

</script>

@endsection