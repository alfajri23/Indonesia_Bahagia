<?php

namespace App\Http\Controllers\Akun\Konsultan;

use App\Helpers\UploadFile;
use App\Http\Controllers\Controller;
use App\Models\ForumPertanyaan;
use App\Models\Konsultan;
use App\Models\KonsultanJadwal;
use App\Models\KonsultanPendidikan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class KonsultanController extends Controller
{

    public function edit(){
        $data = Konsultan::find(Session::get('auth.id_konsultan'));
        return view('pages.konsultan.konsultan.konsultan_edit',compact('data'));
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

        return redirect()->route('homeKonsultan');
    }

    public function detail(){
        $data = Konsultan::find(Session::get('auth.id_konsultan'));

        $jadwals = KonsultanJadwal::where('id_konsultan',Session::get('auth.id_konsultan'))->get();
        $jadwals = collect($jadwals);
        $jadwals = $jadwals->groupBy('hari')->sort();

       
        return view('pages.konsultan.konsultan.konsultan_detail',compact('data','jadwals'));
        
    }

}
