<?php

namespace App\Http\Controllers\Akun\User;

use App\Helpers\UploadFile;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    public function profile(){
        $user = User::find(auth()->user()->id);
        return view('pages.profile.profile_user_detail',compact('user'));
    }

    public function update(Request $request){
        $this->validate($request, [
			'foto' => 'image|mimes:jpeg,png,jpg|max:2048',
		]);
		// menyimpan data file yang diupload ke variabel $file

        $datas = [
            'name' => $request->name,
            'email' => $request->email,
            'desc' => $request->desc,
            'tgl_lahir' => $request->tgl_lahir,
            'telepon' => $request->telepon,
            // 'ig' => $request->ig,
            // 'facebook' => $request->facebook,
            // 'linkedin' => $request->linkedin,
            // 'twitter' => $request->twitter,
            'alamat' => $request->alamat,
            'pekerjaan' => $request->pekerjaan,
            'pendidikan' => $request->pendidikan,
        ];

        if(!empty($request->foto)){
            $datas = UploadFile::file($request,'foto','storage/user/profile',$datas);

            $foto = User::find(auth()->user()->id);
            if(isset($foto)){
                File::delete($foto->foto);
            }
        }

        if(!empty($request->password)){
            $datas['password'] = bcrypt($request->password);
        }

        $data = User::updateOrCreate(['id'=>auth()->user()->id],$datas);

        return redirect()->back();  
    }
}
