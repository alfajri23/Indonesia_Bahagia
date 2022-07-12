<?php

namespace App\Http\Controllers\Home\Konsultan;

use App\Http\Controllers\Controller;
use App\Models\KonsultanJadwalJanji;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KonsultanHomeController extends Controller
{
    public function index(Request $request){

        if($request->ajax()) {
            
            $data = KonsultanJadwalJanji::join('konsultans','konsultan_jadwal_janjis.id_konsultan','=','konsultans.id')
                    ->join('users','konsultan_jadwal_janjis.id_user','=','users.id')
                    ->join('konsultasi_layanans','konsultan_jadwal_janjis.id_layanan','=','konsultasi_layanans.id')
                    ->where('konsultans.id', Session::get('auth.id_konsultan'))
                    ->get(['konsultan_jadwal_janjis.*','konsultasi_layanans.*',
                    'konsultan_jadwal_janjis.id AS id',
                    'konsultans.nama AS nama_konsultan','konsultans.telepon AS telepon_konsultan',
                    'users.name']);

        }

        return view('pages.home.home_konsultan');
    }

   
}
