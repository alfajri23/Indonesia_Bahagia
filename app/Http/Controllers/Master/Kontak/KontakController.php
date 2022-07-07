<?php

namespace App\Http\Controllers\Master\Kontak;

use App\Helpers\Telepon;
use App\Http\Controllers\Controller;
use App\Models\MasterKontak;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    public function index(){
        $data = MasterKontak::find(1);
        $data = $data != null ? $data : null;
        return view('pages.master.kontak.master_kontak',compact('data'));
    }

    public function store(Request $request){
        MasterKontak::updateOrCreate(['id' => $request->id],[
            'nama' => $request->nama,
            'email' => $request->email,
            'desc' => $request->desc,
            'alamat' => $request->alamat,
            'telepon_1' => $request->tel1,
            'telepon_2' => $request->tel2,
            'telepon_3' => $request->tel3,
        ]);

        return redirect()->back();
    }
}
