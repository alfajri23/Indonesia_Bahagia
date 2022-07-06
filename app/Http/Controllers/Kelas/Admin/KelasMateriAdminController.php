<?php

namespace App\Http\Controllers\Kelas\Admin;

use App\Helpers\UploadFile;
use App\Http\Controllers\Controller;
use App\Models\ProdukKelasBab;
use App\Models\ProdukKelasMateri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class KelasMateriAdminController extends Controller
{
    public function index(Request $request){
        $bab = ProdukKelasBab::find($request->id_bab);
        $data = [
            'nama_bab' => $bab,
            'id_bab' => $request->id_bab,
            'id_kelas' => $request->id_kelas
        ];
        return view('pages.kelas.admin.kelas_materi_add',compact('data'));
    }

    public function detail($id){
        $data = ProdukKelasMateri::find($id);

        return view('pages.kelas.admin.kelas_materi_edit',compact('data'));

    }

    public function store(Request $request){

        $this->validate($request, [
			'file' => 'file|mimes:pdf,docx,doc,ppt,pptx|max:5120',
		]);


        $datas = [
            'judul' => $request->judul,
            'id_bab' => $request->id_bab,
            'id_kelas' => $request->id_kelas,
            'isi' => $request->isi,
            'link_video' => $request->link_video,
        ];

        if(!empty($request->file)){
            $datas = UploadFile::file($request,'file','storage/kelas/materi',$datas);

            $kelas = ProdukKelasMateri::find($request->id);
            if(isset($kelas)){
                File::delete(public_path($kelas->file));
            }
        }

        $bab = ProdukKelasMateri::updateOrCreate(['id'=>$request->id],$datas);

        return redirect()->route('kelasDetail',$request->id_kelas);
    }

    public function delete(Request $request){
        $data = ProdukKelasMateri::find($request->id);
        $data->delete();

        return response()->json([
            'message' => 'sukses',
            'data' => 'sukses menghapus'
        ]);

    }
}
