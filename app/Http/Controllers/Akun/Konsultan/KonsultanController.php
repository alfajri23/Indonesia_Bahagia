<?php

namespace App\Http\Controllers\Akun\Konsultan;

use App\Helpers\UploadFile;
use App\Http\Controllers\Controller;
use App\Models\ForumPertanyaan;
use App\Models\Konsultan;
use App\Models\KonsultanJadwal;
use App\Models\KonsultanPendidikan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class KonsultanController extends Controller
{
    public function index(){
        $datas = Konsultan::all();

        return view('pages.konsultan.admin.konsultan_admin',compact('datas'));
    }

    public function create(){
        return view('pages.konsultan.admin.konsultan_add');
    }

    public function edit($id){
        $data = Konsultan::find($id);
        return view('pages.konsultan.admin.konsultan_edit',compact('data'));
    }

    public function store(Request $request){

        $datas = [
            'nama' => $request->nama,
            'email' => $request->email,
            'SIPP' => $request->SIPP,
            'STR' => $request->STR,
            'tentang' => $request->tentang,
            'telepon' => $request->telepon,
        ];

        $validate = [
            'foto' => 'image|mimes:jpeg,png,jpg|max:2048',
            'telepon' => ['required', 'string','regex:/\+?([ -]?\d+)+|\(\d+\)([ -]\d+)/','min:9','max:14']
        ];

        if(!empty($request->password)){
            $datas['password'] = Hash::make($request->password);
            $validate['password'] = ['string', 'min:8', 'confirmed'];
        }
        

        $messages = [
            'mimes' => ':attribute tipe yang diterima: :values',
            'max' => 'Ukuran maksimal file 2 Mb'
        ];

        $this->validate($request, $validate ,$messages);

        

        

        if(!empty($request->foto)){
            $datas = UploadFile::file($request,'foto','storage/konsultan',$datas);
        
            $data = Konsultan::find($request->id);
            if(isset($data)){
                File::delete(public_path($data->foto));
            }
        }

        $data = Konsultan::updateOrCreate(['id' => $request->id],$datas);

        return redirect()->route('konsultanAdmin');
    }

    public function detail($id){
        $data = Konsultan::find($id);

        $jadwals = KonsultanJadwal::where('id_konsultan',$id)->get();
        $jadwals = collect($jadwals);
        $jadwals = $jadwals->groupBy('hari')->sort();
        
        return view('pages.konsultan.admin.konsultan_detail',compact('data','jadwals'));
    }

    public function resetPass(Request $request){
        $data = Konsultan::find($request->id);
        $data->password = Hash::make('12345678');
        $data->save();

        return response()->json([
            'data' => 12345678
        ]);
    }

    public function nonaktif(Request $request){
        $data = Konsultan::find($request->id);
        $data->status = 0;
        $data->save();

        return redirect()->back();
    }

    public function aktif(Request $request){
        $data = Konsultan::find($request->id);
        $data->status = 1;
        $data->save();

        return redirect()->back();
    }

    //PENDIDIKAN

    public function storePendidikan(Request $request){
        KonsultanPendidikan::updateOrCreate(['id' => $request->id],[
            'id_konsultan' => $request->id_konsultan,
            'universitas' => $request->universitas,
            'jurusan' => $request->jurusan,
            'tambahan' => $request->tambahan,
            'tahun' => $request->tahun,
        ]);

        return redirect()->back();
    }

    public function getPendidikan(Request $request){
        $data = KonsultanPendidikan::find($request->id);

        return response()->json([
            'data' => $data
        ]);
    }

}
