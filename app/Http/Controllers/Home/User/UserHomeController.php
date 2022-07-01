<?php

namespace App\Http\Controllers\Home\User;

use App\Http\Controllers\Controller;
use App\Models\KonsultasiLayanan;
use App\Models\ProdukEvent;
use Illuminate\Http\Request;

class UserHomeController extends Controller
{
    public function index(){
        $layanans = KonsultasiLayanan::latest()->get();

        return view('pages.home.home_user',compact('layanans'));
    }

    public function event(){
        $datas = ProdukEvent::join('produks', 'produk_events.id', '=', 'produks.id_produk')
                ->where('produks.id_kategori',1)
                ->where('produk_events.status',1)
                ->get(['produk_events.*', 'produks.id AS id_produk']);
        
        return view('pages.event.user.event',compact('datas'));
    }
}
