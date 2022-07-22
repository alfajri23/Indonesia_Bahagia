@extends('layouts.layout_admin')

@section('content')

<div class="container-fluid">

    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Setting Form Pendaftaran {{$data != null ? $data->kategori->nama : ''}}</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            @isset($data)
                
            <div>
                <a href="{{route('formSettingDeleteForm',$data->id)}}" class="btn btn-danger">Delete</a>
            </div>
            @endisset
        </div>

    </div>

    <div class="d-none">
        <div class="row align-items-end bg-light my-4 py-3" id="formInit">
            <div class="col-5">
              <div class="font-weight-bold text-uppercase">Pertanyaan</div>
              <textarea type="text" rows="4" class="form-control" name="pertanyaan[]" placeholder=""></textarea>
              <label>Pilihan jawaban</label>
              <input type="text" class="form-control" name="pilihan[]">
            </div>
            <div class="col-2">
              <label>Tipe</label>
              <select id="inputState" name="tipe[]" class="form-control">
                <option value="text">text</option>
                <option value="number">angka</option>
                <option value="file">file</option>
                <option value="radio">pilihan ganda</option>
              </select>
            </div>
            <div class="col-3">
              <label>File</label>
              <input type="file" class="form-control" name="file[]" placeholder="">
            </div>
            <div class="col-2">
                <label>Harus diisi</label>
                <select id="inputState" name="required[]" class="form-control">
                    <option value="0">no</option>
                    <option value="1">ya</option>
                </select>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="container">
                <form action="{{route('formSettingStore')}}" method="post" enctype="multipart/form-data">
                @csrf

                {{-- Kategori --}}
                <div class="mb-3">
                    <input type="hidden" name="id" value="{{isset($data) ? $data->id : null}}">
                    <label for="">Pilih tipe produk yang akan diberi pertanyaan</label>
                    <div class="form-group">
                        <select class="form-control" name="id_produk_kategori">
                            <option selected value="{{isset($data) ? $data->id_produk_kategori : null}}">Choose...</option>
                            @forelse ($kategori as $kat)
                                <option value="{{$kat->id}}">{{$kat->nama}}</option>
                            @empty  
                            @endforelse
                        </select>
                    </div> 
                </div>

                <div class="alert alert alert-light" role="alert">
                    <h4 class="alert-heading">Petunjuk pengisian</h4>
                    <ol class="ps-1">
                        <li>1. Isikan pertanyaan kuesioner anda pada "Pertanyaan"</li>
                        <li>2. Pilihlah tipe pertanyaan yang akan Anda tanyakan
                            <br>
                            <small class="text-success">Daftar detail tipe dapat dilihat di 'Daftar Aturan dibawah'</small>
                        </li>
                        <li>3. "Gambar" akan ditampilkan diatas setiap pertanyaan Anda</li>
                        <li>4. "Harus diisi" menunjukkan pertanyaan tersebut harus diisi oleh user atau tidak</li>
                        <li>5. "Pilihan jawaban" ,<span class="text-danger">hanya diisi</span> jika tipe pertanyaan berupa pilihan ganda</li>
                        <li>Pilihan jawaban disi dengan cara memisahkan piihan dengan tanda '/', contoh ( S1/SMA/SMP/SD )</li>
                    </ol>

                    <p class="mb-0">Daftar aturan tipe pertanyaan</p>
                    <ol>
                        <li>Pertanyaan berupa kalimat biasa = text</li>
                        <li>Pertanyaan berupa angka = angka</li>
                        <li>Pertanyaan berupa upload foto/file = file</li>
                        <li>Pertanyaan berupa pilihan ganda = pilihan ganda</li>
                    </ol>
                </div>

                <div class="row">
                    <div id="form">
                        @empty(!$data)
                        @php
                            $pertanyaan = explode(",",$data->pertanyaan);
                            $tipe = explode(",",$data->tipe);
                            $file = explode(",",$data->file);
                            $required = explode(",",$data->required);
                            $pilihan = explode(",",$data->pilihan);

                        @endphp

                        @for ($i=0;$i<count($pertanyaan);$i++)
                        <div class="row align-items-end bg-light my-4 py-3">
                            <div id="formPilihan-{{$i}}" class="col-5">
                            <div class="font-weight-bold text-uppercase">Pertanyaan {{$i + 1}}</div>
                            <textarea type="text" rows="4" class="form-control" name="pertanyaan[]" value="{{$pertanyaan[$i]}}">{{$pertanyaan[$i]}}</textarea>
                            <label>Pilihan jawaban</label>
                            <input type="text" class="form-control" name="pilihan[]" value="{{$pilihan[$i]}}">
                            </div>

                            <div class="col-2">
                            <label>Tipe</label>
                            <select id="inputState" name="tipe[]" class="form-control">
                                <option value="{{$tipe[$i]}}" selected>{{$tipe[$i]}}</option>
                                <option value="text">text</option>
                                <option value="number">angka</option>
                                <option value="file">file</option>
                                <option value="radio">pilihan ganda</option>
                            </select>
                            </div>

                            <div class="col-3">
                                <img class="w-100" src="{{$file[$i] != null ? asset($file[$i]) : ''}}" alt="" srcset="">
                            <label>File</label><br>
                            <input type="file" class="" name="file[]">
                            </div>

                            <div class="col-1">
                                <a href="{{route('formSettingDelete',['id'=>$data->id,'index'=>$i])}}" class="btn btn-outline-danger mt-4">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                            </div>

                            <div class="col-1">
                                <label>Harus diisi</label>
                                <select id="inputState" name="required[]" class="form-control">
                                    <option value="{{$required[$i]}}" selected>{{$required[$i] == 1 ? 'ya' : 'no'}}</option>
                                    <option value="0">no</option>
                                    <option value="1">ya</option>
                                </select>
                            </div>
                        </div>
                        @endfor
                        @endempty

                    </div>

                    <div>
                        <a onclick="addForm()" class="btn btn-primary btn-sm">Tambah pertanyaan</a>
                    </div>
                </div>

                

                <div class="mt-3 clearfix">
                    <a href="{{ url()->previous() }}" class="btn btn-light float-end mx-1">Batal</a>
                    <button type="submit" class="btn btn-success text-white float-end">Simpan</button>
                 </div>
                </form>

            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

    function addForm(){
        $( "#formInit" ).clone().appendTo( "#form" );
    }

</script>


@endsection