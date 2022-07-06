<?php

namespace App\Http\Controllers\Kelas\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProdukKelasBab;
use Illuminate\Http\Request;

class KelasBabAdminController extends Controller
{
    public function create(Request $request){
        $data = ProdukKelasBab::updateOrCreate(['id'=>$request->id],[
            'id_kelas' => $request->id_kelas,
            'nama' => $request->nama_bab,
        ]);

        return response()->json([
            'message' => 'success',
            'data' => $data
        ],200);
    }

    public function edit(Request $request){
        $data = ProdukKelasBab::find($request->id);
        $data->nama = $request->nama;
        $data->save();

        return redirect()->back();
    }

    public function delete($id){
        $data = ProdukKelasBab::find($id);
        $data->delete();

        return redirect()->back();
    }
}
