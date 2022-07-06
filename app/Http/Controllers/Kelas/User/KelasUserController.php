<?php

namespace App\Http\Controllers\Kelas\User;

use App\Http\Controllers\Controller;
use App\Models\ProdukKelas;
use App\Models\ProdukKelasBab;
use App\Models\ProdukKelasMateri;
use Illuminate\Http\Request;

class KelasUserController extends Controller
{
    public function riwayat(){
       
        $datas = ProdukKelas::join('enroll_kelas', 'produk_kelas.id', '=', 'enroll_kelas.id_kelas')
                ->join('produks', 'produk_kelas.id', '=', 'produks.id_produk')
                ->where('enroll_kelas.id_user',auth()->user()->id)
                ->where('produks.id_kategori',3)
                ->get(['produk_kelas.*', 'produks.id AS id_produk']);

        return view('pages.kelas.user.kelas_riwayat',compact('datas'));
    }

    public function detail_member($id,$ids){ //id => id kelas, ids = id bab

        $babs = ProdukKelasBab::where('id_kelas',$id)->get();
        $data = ProdukKelasMateri::where([
            'id_kelas' => $id,
            'id_bab' => $ids
        ])->first();

        return view('pages.kelas.member.kelas_materi',compact('data','babs','id'));
    }

}
