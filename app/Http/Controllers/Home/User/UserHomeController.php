<?php

namespace App\Http\Controllers\Home\User;

use App\Http\Controllers\Controller;
use App\Models\KonsultasiLayanan;
use App\Models\MasterBanner;
use App\Models\ProdukEvent;
use App\Models\ProdukKelas;
use App\Models\Testimoni;
use Illuminate\Http\Request;

class UserHomeController extends Controller
{
    public function index(){
        $layanans = KonsultasiLayanan::latest()->get();
        $testimonis = Testimoni::where('status', 1)->get();
        $banners = MasterBanner::all(); 

        return view('pages.home.home_user',compact('layanans','testimonis','banners'));
    }

    public function event(){
        $datas = ProdukEvent::join('produks', 'produk_events.id', '=', 'produks.id_produk')
                ->where('produks.id_kategori',1)
                ->where('produk_events.status',1)
                ->get(['produk_events.*', 'produks.id AS id_produk']);
        
        $title = 'Event kami - halobahagia.com';
        return view('pages.event.user.event',compact('datas','title'));
    }

    public function kelas(){
        $datas = ProdukKelas::join('produks', 'produk_kelas.id', '=', 'produks.id_produk')
                ->where('produks.id_kategori',3)
                ->where('produk_kelas.status',1)
                ->get(['produk_kelas.*', 'produks.id AS id_produk']);

        $title = 'Kelas kami - halobahagia.com';
        return view('pages.kelas.user.kelas',compact('datas','title'));
    
    }
}
