<?php

namespace App\Http\Controllers\Pembayaran\User;

use App\Helpers\UploadFile;
use App\Http\Controllers\Controller;
use App\Models\EnrollEvent;
use App\Models\Produk;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class PembayaranUserController extends Controller
{
    public function pembayaran($id){
        $produk = Produk::find($id);

        if($produk->harga != null || $produk->harga != ''){
            $data = $produk;
            //dd($data);
            return view('pages.pembayaran.pembayaran',compact('data'));
        }else{
            switch ($produk->id_kategori) {
                case 1:
                    $enroll = EnrollEvent::create([
                        'id_user' => auth()->user()->id,
                        'id_event' => $produk->id_produk,
                        'id_konsultan' => $produk->id_konsultan
                    ]);
                    
                    return redirect()->route('homeUser');
                  break;      
                default:
                  
            }

        }

    }

    public function bank(Request $request){

        $messages = [
            'mimes' => ':attribute tipe yang diterima: :values',
            'max' => 'Ukuran maksimal file 2 Mb'
        ];

        $this->validate($request, [
            'bukti' => 'file|image|mimes:jpeg,png,jpg|max:2048',
        ],$messages);

        $produk = Produk::find($request->id_produk);

        $datas = [
            'id_produk' => $request->id_produk,
            'nama' => $produk->nama,
            'harga' => $produk->harga,
            'status' => 'pending',
            'id_user' => auth()->user()->id,
            'tanggal_bayar' => now(),
        ];

        $datas= UploadFile::file($request,'bukti','storage/transaksi',$datas);
        Transaksi::create($datas);

        return redirect()->route('homeUser');
    }
}
