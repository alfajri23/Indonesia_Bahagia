<?php

namespace App\Http\Controllers\Pembayaran\User;

use App\Helpers\UploadFile;
use App\Http\Controllers\Controller;
use App\Models\EnrollEvent;
use App\Models\KonsultanJadwalJanji;
use App\Models\Produk;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class PembayaranUserController extends Controller
{
    public function pembayaran($id,$janji = null){
        $produk = Produk::find($id);
        
        if($produk->harga != null || $produk->harga != ''){
            $data = $produk;
            return view('pages.pembayaran.pembayaran',compact('data','janji'));
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

            //!KELAS GRATIS BELUM ADA
        }
    }

    public function bank(Request $request){

        $messages = [
            'mimes' => ':attribute tipe yang diterima: :values',
            'max' => 'Ukuran maksimal file 2 Mb'
        ];

        $this->validate($request, [
            'bukti' => 'file|image|mimes:jpeg,png,jpg,pdf,doc,docx|max:2048',
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
        $transaksi = Transaksi::create($datas);

        //KONSULTASI
        $this->cekJanjiKonsultasi($request,$transaksi);

        return redirect()->route('homeUser');
    }

    public function riwayat(){
        $datas = Transaksi::where('id_user',auth()->user()->id)->get();
        //dd($datas);

        return view('pages.pembayaran.user.pembayaran_riwayat',compact('datas'));
    }

    public function riwayatDetail($id){
        $data = Transaksi::where([
            'id' => $id,
            'id_user' => auth()->user()->id,
        ])->first();

        return view('pages.pembayaran.user.pembayaran_detail',compact('data'));
    }

    public function cekJanjiKonsultasi($request,$transaksi){
        if($request->janji != null){
            $janji = KonsultanJadwalJanji::updateOrCreate(['id' => $request->janji],[
                'status' => 'menunggu_konfirmasi',
                'id_transaksi' => $transaksi->id
            ]);
        }
    }
}
