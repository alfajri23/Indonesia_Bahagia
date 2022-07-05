<?php

namespace App\Http\Controllers\Akun\Admin;

use App\Helpers\UploadFile;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index(){
        $datas = Admin::all();

        return view('pages.akun.admin.admin_admin',compact('datas'));
    }

    public function create(){
        return view('pages.akun.admin.admin_add');
    }

    public function store(Request $request){

        $datas = [
            'name' => $request->nama,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
        ];

        $validate = [
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
            $datas = UploadFile::file($request,'foto','storage/admin',$datas);
        
            $data = Admin::find($request->id);
            if(isset($data)){
                File::delete(public_path($data->foto));
            }
        }

        $data = Admin::updateOrCreate(['id' => $request->id],$datas);

        return redirect()->route('adminAdmin');
    }

    public function edit($id){
        $data = Admin::find($id);
        return view('pages.akun.admin.admin_edit',compact('data'));
    }

    public function detail($id){
        $data = Admin::find($id);
        
        return view('pages.akun.admin.admin_detail',compact('data'));
    }

    public function delete($id){
        $data = Admin::find($id)->delete();
        
        return redirect()->route('adminAdmin');
    }

    public function resetPass(Request $request){
        $data = Admin::find($request->id);
        $data->password = Hash::make('12345678');
        $data->save();

        return response()->json([
            'data' => 12345678
        ]);
    }
}
