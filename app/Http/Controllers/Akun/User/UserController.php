<?php

namespace App\Http\Controllers\Akun\User;

use App\Helpers\UploadFile;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function profile(){
        $title = 'Profile saya - halobahagia.com';
        $user = User::find(auth()->user()->id);
        return view('pages.profile.profile_user_detail',compact('user','title'));
    }

    public function changePassword(){
        $title = 'Ubah password - halobahagia.com';
        $user = User::find(auth()->user()->id);
        return view('pages.profile.profile_ganti_password',compact('user','title'));
    }

    public function updatePassword(Request $request){
        $this->validate($request, [
			'password' => ['required', 'string', 'min:8', 'confirmed'],
		]);

        if (!(Hash::check($request->get('current-password'), auth()->user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Password lama anda tidak sesuai dengan password");
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            // Current password and new password same
            return redirect()->back()->with("error","Password baru tidak dapat sama dengan password lama");
        }

        $validatedData = $request->validate([
            'current-password' => 'required',
            'password' => 'required|string|min:8|confirmed',
        ]);

        //Change Password
        $user = User::find(auth()->user()->id);
        $user->password = Hash::make($request->get('password'));
        $user->save();

        return redirect()->back()->with('success', 'Berhasil menganti password');
    }

    public function update(Request $request){
        $messages = [
            'mimes' => ':attribute tipe yang diterima: :values',
            'max' => 'Ukuran maksimal file 2 Mb'
        ];

        $this->validate($request, [
			'foto' => 'image|mimes:jpeg,png,jpg|max:2048',
		],$messages);
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
