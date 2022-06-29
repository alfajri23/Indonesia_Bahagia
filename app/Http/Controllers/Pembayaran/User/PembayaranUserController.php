<?php

namespace App\Http\Controllers\Pembayaran\User;

use App\Http\Controllers\Controller;
use App\Models\Produk;
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

        }

    }

    public function bank(){
        return view('pages.pembayaran.pembayaran_bank');
    }
}
