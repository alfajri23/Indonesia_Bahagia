@extends('layouts.layout_admin')

@section('content')

<div class="container-fluid">
    <div class="card shadow mb-4 p-3">
        <div class="row">
            <div class="col-4">
                <img src="{{asset($data->foto)}}" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-8">
                <button onclick="reset({{$data->id}})" type="button" class="btn btn-warning btn-sm float-end ">Reset password</button>
                <a href="{{route('adminAdminEdit',$data->id)}}" class="btn btn-success btn-sm text-white float-end mx-1">Edit</a>
                <a href="{{route('adminAdminDelete',$data->id)}}" class="btn btn-danger text-white btn-sm float-end">Delete</a>

                <div class="card-body">
                    <h5 class="card-title fw-bold text-dark mb-0">{{$data->name}}</h5>
                    <p class="text-gray-800 mb-0">Telepon   :{{$data->telepon}}</p>
                    <p class="text-gray-800 mb-0">Alamat   :{{$data->alamat}}</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function reset(id){
        $.ajax({
            type : 'GET',
            url  : "{{ route('adminAdminReset') }}",
            data : {
                id : id
            },
            dataType: 'json',
            success : (data)=>{
               alert("Password baru : " + data.data);
            }
        });
    }
</script>

@endsection