<?php

namespace App\Http\Controllers\Event\User;

use App\Http\Controllers\Controller;
use App\Models\ProdukEvent;
use Illuminate\Http\Request;

class EventUserController extends Controller
{
    public function detail($id){
        //$data = ProdukEvent::find($id);
        $data = ProdukEvent::join('produks', 'produk_events.id', '=', 'produks.id_produk')
                ->where('produk_events.id',$id)
                ->where('produks.id_kategori',1)
                ->get(['produk_events.*', 'produks.id AS id_produk']);
        $data = $data->first();

        //dd($datas);

        return view('pages.event.user.event_detail',compact('data'));
    }
}
