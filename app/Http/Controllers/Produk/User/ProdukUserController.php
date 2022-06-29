<?php

namespace App\Http\Controllers\Produk\User;

use App\Http\Controllers\Controller;
use App\Models\EnrollEvent;
use App\Models\Produk;
use App\Models\ProdukEvent;
use Illuminate\Http\Request;

class ProdukUserController extends Controller
{
    public function index($id){
        $produk = Produk::find($id);

        switch ($produk->id_kategori){
            case 1 :
                $data = ProdukEvent::join('produks', 'produk_events.id', '=', 'produks.id_produk')
                ->where('produk_events.id',$produk->id_produk)
                ->where('produks.id_kategori',1)
                ->get(['produk_events.*', 'produks.id AS id_produk']);

                $data = $data->first();
                return view('pages.event.user.event_detail',compact('data'));

            break;

            default :
        }

    }

    public function enroll($id){
        $produk = Produk::find($id);

        switch ($produk->id_kategori){
            case 1 :
                $cek = EnrollEvent::where([
                    'id_user' => auth()->user()->id,
                    'id_event' => $produk->id_produk
                ])->get();

                //jika sudah daftar
                if(count($cek) != 0){
                    $data = ProdukEvent::find($produk->id_produk);
                    return view('pages.event.member.event_member',compact('data'));
                }else{
                    return redirect()->route('produkDetail',$id);
                }

            break;

            default :
        }
    }
}
