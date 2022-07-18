<?php

namespace App\Http\Controllers\Pembayaran\User;

use App\Helpers\UploadFile;
use App\Http\Controllers\Controller;
use App\Models\EnrollEvent;
use App\Models\KonsultanJadwalJanji;
use App\Models\MasterSettingProgram;
use App\Models\Produk;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class PembayaranUserController extends Controller
{
    public function pembayaran($id,$janji = null){
        $title = 'Pembayaran - halobahagia.com';
        $produk = Produk::find($id);
        
        if($produk->harga != null || $produk->harga != ''){
            $data = $produk;

            //Setting form pembayaran dari tabel settings
            $pembayaran = MasterSettingProgram::where('nama','transaksi')->get()->first();


            return view('pages.pembayaran.pembayaran',compact('data','janji','pembayaran','title'));
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
            'mimes' => ' :attribute tipe yang diterima: :values',
            'max' => 'Ukuran maksimal file 2 Mb'
        ];

        $this->validate($request, [
            'bukti' => 'file|mimes:jpeg,png,jpg,pdf,doc,docx|max:2048',
        ],$messages);

        //CEK TRANSAKSI DOUBLE
        if($this->cekTransaksiDouble($request)){
            return redirect()->back()->withErrors(['error' => 'Tidak bisa melakukan pembayaran 2 kali, pembayaran Anda sebelumnya sedang diproses']);
        }


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
        $title = 'Riwayat Pembayaran - halobahagia.com';
        $datas = Transaksi::where('id_user',auth()->user()->id)->get();

        return view('pages.pembayaran.user.pembayaran_riwayat',compact('datas','title'));
    }

    public function riwayatDetail($id){
        $title = 'Riwayat Pembayaran - halobahagia.com';
        $data = Transaksi::where([
            'id' => $id,
            'id_user' => auth()->user()->id,
        ])->first();

        return view('pages.pembayaran.user.pembayaran_detail',compact('data','title'));
    }

    public function cekJanjiKonsultasi($request,$transaksi){
        if($request->janji != null){
            $janji = KonsultanJadwalJanji::updateOrCreate(['id' => $request->janji],[
                'status' => 'menunggu_konfirmasi',
                'id_transaksi' => $transaksi->id
            ]);
        }
    }

    public function cekTransaksiDouble($request){

        $data = Transaksi::where([
            'id_user' => auth()->user()->id,
            'id_produk' => $request->id_produk,
            'status' => 'pending'
        ])->get();

        return count($data) > 0 ? true : false;

    }
}
