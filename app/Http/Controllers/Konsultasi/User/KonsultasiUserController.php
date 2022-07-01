<?php

namespace App\Http\Controllers\Konsultasi\User;

use App\Http\Controllers\Controller;
use App\Models\Konsultan;
use App\Models\KonsultanLayanan;
use App\Models\KonsultasiLayanan;
use Illuminate\Http\Request;

class KonsultasiUserController extends Controller
{
    public function listKonsultan(Request $request){

        $jenis = 'Semua';
        if($request->tipe != null){
            $datas = Konsultan::join('konsultan_layanans','konsultans.id','=','konsultan_layanans.id_konsultan')
                    ->where('konsultan_layanans.id_layanan',$request->tipe)
                    ->get(['konsultans.*']);
    
            $jenis = KonsultasiLayanan::find($request->tipe);
            $jenis = $jenis->nama;
        }else{
            $datas = Konsultan::latest()->get();
        }
                
        $layanans = KonsultasiLayanan::latest()->get();

        return view('pages.konsultasi.user.konsultasi_list',compact('datas','layanans','jenis'));



    }

    public function detailKonsultan($id){
        $data = Konsultan::find($id);

        return view('pages.konsultasi.user.konsultasi_detail_konsultan',compact('data'));
    }
}
