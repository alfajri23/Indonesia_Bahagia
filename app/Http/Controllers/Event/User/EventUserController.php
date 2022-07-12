<?php

namespace App\Http\Controllers\Event\User;

use App\Http\Controllers\Controller;
use App\Models\EnrollEvent;
use App\Models\ProdukEvent;
use Illuminate\Http\Request;

class EventUserController extends Controller
{

    public function riwayat(){
        $title = 'Riwayat event - halobahagia.com';
        $datas = ProdukEvent::join('enroll_events', 'produk_events.id', '=', 'enroll_events.id_event')
                ->join('produks', 'produk_events.id', '=', 'produks.id_produk')
                ->where('enroll_events.id_user',auth()->user()->id)
                ->get(['produk_events.*', 'produks.id AS id_produk']);

        return view('pages.event.user.event_riwayat',compact('datas','title'));
    }

}
