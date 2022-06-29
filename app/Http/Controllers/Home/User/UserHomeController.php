<?php

namespace App\Http\Controllers\Home\User;

use App\Http\Controllers\Controller;
use App\Models\ProdukEvent;
use Illuminate\Http\Request;

class UserHomeController extends Controller
{
    public function index(){
        return view('pages.home.home_user');
    }

    public function event(){
        $datas = ProdukEvent::latest()->get();
        // $datas = ProdukEvent::join('produks', 'produk_events.id', '=', 'produks.id_produk')
        //         ->where('produks.id_kategori',1)
        //         ->get(['produk_events.*', 'produks.id AS id_produk']);
        
        //dd($datas);


        return view('pages.event.user.event',compact('datas'));
    }
}
