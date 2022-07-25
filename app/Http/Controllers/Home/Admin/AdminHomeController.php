<?php

namespace App\Http\Controllers\Home\Admin;

use App\Http\Controllers\Controller;
use App\Models\Konsultan;
use App\Models\ProdukEvent;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;

class AdminHomeController extends Controller
{
    public function index(){
        $event = collect(ProdukEvent::all());
        $event_aktif = $event->where('status',1)->count();

        $events = [
            'semua' => $event->count(),
            'aktif' => $event_aktif,
        ];

        $konsultan = collect(Konsultan::all());
        $konsultan_aktif = $konsultan->where('status',1)->count();

        $konsultans = [
            'semua' => $konsultan->count(),
            'aktif' => $konsultan_aktif,
        ];

        $user = collect(User::all())->count();

        $transaksi = collect(Transaksi::where('status','like','%lunas%')->get());
        $transaksi_display = $transaksi->groupBy('tanggal_bayar');

        $rentang = [];
        $jumlah = [];
        $index = 0;

        foreach ($transaksi_display as $key => $tr){
            $data = explode("-",$key);
            $rentang[$index] = $key;

            foreach ($tr as $trs){
                $jumlah[$index] = $trs->harga;
            }
            $index++;
        }

        $rentang = implode(",",$rentang);
        $jumlah = implode(",",$jumlah);

        $user_transaksi = $transaksi->groupBy('id_user')->count();

        return view('pages.home.home_admin',compact('events','konsultans',
                                                    'rentang','jumlah',
                                                    'user','user_transaksi'));
    }
}
