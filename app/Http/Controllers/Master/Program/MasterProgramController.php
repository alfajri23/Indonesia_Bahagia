<?php

namespace App\Http\Controllers\Master\Program;

use App\Helpers\UploadFile;
use App\Http\Controllers\Controller;
use App\Models\MasterSettingProgram;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class MasterProgramController extends Controller
{
    public function index(){
        $data = MasterSettingProgram::all();
        return view('pages.master.program.master_program',compact('data'));
    }

    public function add(Request $request){
        $data = MasterSettingProgram::find($request->id);
        return view('pages.master.program.master_edit_program',compact('data'));
    }

    public function delete($id){
        $data = MasterSettingProgram::find($id)->delete();

        return redirect()->back();
    }

    public function store(Request $request){
        
        $this->validate($request, [
            'foto' => 'file|image|mimes:jpeg,png,jpg|max:1024',
        ]);

        $datas = [
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'isi' => $request->isi,
        ];

        if(!empty($request->foto)){
            $datas = UploadFile::file($request,'foto','storage/master/setting',$datas);

            $setting = MasterSettingProgram::find($request->id);
            if(isset($setting)){
                File::delete(public_path($setting->foto));
            }
        }
        

        MasterSettingProgram::updateOrCreate(['id' => $request->id],$datas);

        return redirect()->route('masterProgram');
    }

}
