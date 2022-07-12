<?php

namespace App\Http\Controllers\Produk\User;

use App\Http\Controllers\Controller;
use App\Models\EnrollEvent;
use App\Models\EnrollKelas;
use App\Models\Produk;
use App\Models\ProdukEvent;
use App\Models\ProdukKelas;
use App\Models\ProdukKelasBab;
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

                $title = 'Event kami - halobahagia.com';
                $data = $data->first();
                return view('pages.event.user.event_detail',compact('data','title'));

            break;

            case 3 :
                $data = ProdukKelas::join('produks', 'produk_kelas.id', '=', 'produks.id_produk')
                ->where('produk_kelas.id',$produk->id_produk)
                ->where('produks.id_kategori',3)
                ->where('produk_kelas.status',1)
                ->get(['produk_kelas.*', 'produks.id AS id_produk']);
                $data = $data->first();

                $title = 'Kelas kami - halobahagia.com';
                $rekomen = ProdukKelas::where('status',1)->limit(6)->latest()->get();
                $babs = ProdukKelasBab::where('id_kelas',$produk->id_produk)->get();

                return view('pages.kelas.user.kelas_detail',compact('data','title',
                                                                    'babs','rekomen'));
            break;

            default :
        }

    }

    public function enroll($id){
        $produk = Produk::find($id);

        switch ($produk->id_kategori){
            case 1 :
                $title = 'Event saya - halobahagia.com';
                $cek = EnrollEvent::where([
                    'id_user' => auth()->user()->id,
                    'id_event' => $produk->id_produk
                ])->get();

                //jika sudah daftar
                if(count($cek) != 0){
                    $data = ProdukEvent::find($produk->id_produk);
                    return view('pages.event.member.event_member',compact('data','title'));
                }else{
                    return redirect()->route('produkDetail',$id);
                }

            break;

            case 3 :
                $title = 'Kelas saya - halobahagia.com';
                $cek = EnrollKelas::where([
                    'id_user' => auth()->user()->id,
                    'id_kelas' => $produk->id_produk
                ])->get();
                
                if(count($cek) != 0){
                    $data = ProdukKelas::find($produk->id_produk);
                    $babs = ProdukKelasBab::where('id_kelas',$data->id)->get();

                    return view('pages.kelas.member.kelas_member',compact('data','babs','title'));
                }else{
                    return redirect()->route('produkDetail',$id);
                }

            break;

            default :
        }
    }
}
