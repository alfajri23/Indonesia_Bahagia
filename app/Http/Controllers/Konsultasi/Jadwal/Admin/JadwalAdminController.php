<?php

namespace App\Http\Controllers\Konsultasi\Jadwal\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KonsultanJadwal;

class JadwalAdminController extends Controller
{
    public function addJadwalKonsultan(Request $request){
        $jam = $request->time_start .'-'.$request->time_end;
        $datas = KonsultanJadwal::updateOrCreate(['id' => $request->id],[
            'id_konsultan' => $request->id_konsultan,
            'hari' => $request->hari,
            'jam' => $jam,
        ]);

        return redirect()->back();
    }

    public function deleteJadwalKonsultan(Request $request){
        $data = KonsultanJadwal::find($request->id)->forceDelete();

        

        if($data){
            return response()->json([
                'data' => $data,
                'message' => 'sukses menghapus',
                'status' => 'berhasil'
            ]);
        }else{
            return response()->json([
                'data' => $data,
                'message' => 'error',
                'status' => 'error'
            ]);
        }
    }
}
