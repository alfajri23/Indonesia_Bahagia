<?php

namespace App\Http\Controllers\Pendaftaran\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProdukKategori;
use App\Models\SettingFormPendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PendaftaranAdminController extends Controller
{
    public function index(){
        
        $data = SettingFormPendaftaran::all();

        return view('pages.pendaftaran.admin.form_pendaftaran',compact('data'));
    }

    public function init(Request $request){
        $kategori = ProdukKategori::all();
        $data = SettingFormPendaftaran::find($request->id);

        return view('pages.pendaftaran.admin.detail_form_pendaftaran',compact('kategori','data'));
    }

    public function delete(Request $request){
        $filed = SettingFormPendaftaran::find($request->id);

        $pertanyaan = explode(",",$filed->pertanyaan);
        $jawaban = explode(",",$filed->jawaban);
        $file = explode(",",$filed->file);
        $tipe = explode(",",$filed->tipe);
        $pilihan = explode(",",$filed->pilihan);

        unset($pertanyaan[$request->index]);
        unset($jawaban[$request->index]);
        unset($tipe[$request->index]);
        unset($file[$request->index]);
        unset($pilihan[$request->index]);

        $datas = [
            'id_produk_kategori' => $filed->id_produk_kategori,
            'pertanyaan' => implode(",",$pertanyaan),
            'tipe' => implode(",",$tipe),
            'file' => implode(",",$file),
            'tipe' => implode(",",$tipe),
            'pilihan' => implode(",",$pilihan),
        ];

        $data = SettingFormPendaftaran::updateOrCreate(['id'=>$request->id],$datas);

        return redirect()->back();

    }

    public function store(Request $request){

        $pertanyaan = implode(",",$request->pertanyaan);
        $tipe = implode(",",$request->tipe);
        $required = implode(",",$request->required);
        $File = $request->file != null ? $request->file : [];
        $pilihan = implode(",",$request->pilihan);

        if($request->id != null){
            $filed = SettingFormPendaftaran::find($request->id);
            $filed = $filed->file;
            $filed =  explode(",",$filed);
        }else{
            $filed = [];
        }

        //if(!empty($request->file)){
            for($i=0;$i<=count($request->tipe);$i++){
                if(array_key_exists($i,$File)){
                    if(!empty($request->file)){
                        $nama_file = $File[$i]->getClientOriginalName();
                        $tujuan_upload_server = public_path('storage/setting/form');
                        $tujuan_upload = 'storage/setting/form';
                        $files = $tujuan_upload . '/'. $nama_file;
                        $File[$i]->move($tujuan_upload_server,$nama_file);
                        $filed[$i] = $files;
                    }
                }else{  
                    if(array_key_exists($i,$filed)){
                        if($filed[$i] == null){
                            $filed[$i] = '';
                        }
                    }else{
                        $filed[$i] = '';
                    }
                }
            }
        //}


        $file = implode(",",$filed);
        //$file = ',' . $file;


        $datas = [
            'id_produk_kategori' => $request->id_produk_kategori,
            'pertanyaan' => $pertanyaan,
            'tipe' => $tipe,
            'file' => $file,
            'required' => $required,
            'pilihan' => $pilihan,
        ];
        
        $data = SettingFormPendaftaran::updateOrCreate(['id'=>$request->id],$datas);

        return redirect()->route('formSetting');
    }

    public function deleteForm($id){
        $data = SettingFormPendaftaran::find($id);
        $files = explode(",",$data->file);

        foreach($files as $file){
            File::delete(public_path($file));
        }

        $data->forceDelete();

        return redirect()->route('formSetting');
    }
}
