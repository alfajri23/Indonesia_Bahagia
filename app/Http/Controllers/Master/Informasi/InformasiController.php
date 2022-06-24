<?php

namespace App\Http\Controllers\Master\Informasi;

use App\Http\Controllers\Controller;
use App\Models\MasterInformasi;
use Illuminate\Http\Request;

class InformasiController extends Controller
{
    public function index(){
        $data = MasterInformasi::all();
        return view('pages.master.informasi.master_informasi',compact('data'));
    }

    public function add(Request $request){
        $data = MasterInformasi::find($request->id);
        return view('pages.master.informasi.master_add_informasi',compact('data'));
    }

    public function store(Request $request){
        MasterInformasi::updateOrCreate(['id' => $request->id],[
            'nama' => $request->nama,
            'isi' => $request->isi,
        ]);

        return redirect()->route('masterInformasi');
    }
}
