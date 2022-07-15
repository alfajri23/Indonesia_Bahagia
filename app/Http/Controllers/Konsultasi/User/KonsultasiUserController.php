<?php

namespace App\Http\Controllers\Konsultasi\User;

use App\Http\Controllers\Controller;
use App\Models\Konsultan;
use App\Models\KonsultanJadwal;
use App\Models\KonsultanJadwalJanji;
use App\Models\KonsultanLayanan;
use App\Models\KonsultasiLayanan;
use App\Models\Produk;
use Carbon\Carbon;
use Illuminate\Http\Request;

class KonsultasiUserController extends Controller
{
    public function listKonsultan(Request $request){
        $title = 'List konsultasi - halobahagia.com';

        $jenis = 'Semua';
        if($request->tipe != null){
            $datas = Konsultan::join('konsultan_layanans','konsultans.id','=','konsultan_layanans.id_konsultan')
                    ->where('konsultan_layanans.id_layanan',$request->tipe)
                    ->where('konsultans.status',1)
                    ->get(['konsultans.*']);
    
            $jenis = KonsultasiLayanan::find($request->tipe);
            $jenis = $jenis->nama;
        }elseif($request->cari != null){
            $datas = Konsultan::where('nama','like','%'.$request->cari.'%')->get();
        }else{
            $datas = Konsultan::where('status',1)->get();
        }
                
        $layanans = KonsultasiLayanan::latest()->get();

        return view('pages.konsultasi.user.konsultasi_list',compact('datas','layanans','jenis','title'));



    }

    public function detailKonsultan($id){
        $title = 'Detail konsultasi - halobahagia.com';
        $data = Konsultan::find($id);
        $layanans = Konsultan::join('konsultan_layanans','konsultans.id','=','konsultan_layanans.id_konsultan')
                ->join('konsultasi_layanans','konsultasi_layanans.id','=','konsultan_layanans.id_layanan')
                ->where('konsultans.id',$id)
                ->get(['konsultasi_layanans.*']);

        return view('pages.konsultasi.user.konsultasi_detail_konsultan',compact('data','layanans','title'));
    }

    public function buatJanji(Request $request){
        $title = 'Buat janji konsultasi - halobahagia.com';
        $layanans = Konsultan::join('konsultan_layanans','konsultans.id','=','konsultan_layanans.id_konsultan')
                ->join('konsultasi_layanans','konsultasi_layanans.id','=','konsultan_layanans.id_layanan')
                ->where('konsultans.id',$request->id_konsultan)
                ->where('konsultasi_layanans.id',$request->id_layanan)
                ->get(['konsultasi_layanans.*'])
                ->first();

        $data = Konsultan::find($request->id_konsultan);

        $janjis = KonsultanJadwalJanji::where(
            'id_konsultan',$request->id_konsultan)
        ->where('status', 'like' , '%menunggu_konsultasi%')
        ->get();

        $jadwals = KonsultanJadwal::where('id_konsultan',$request->id_konsultan)->get();
        $jadwals_konsul =[];

        for($i=0;$i<count($jadwals);$i++){
            if(count($janjis)>0){
                for($y=0; $y<count($janjis);$y++){
                    if(ucfirst($jadwals[$i]['hari']) != $janjis[$y]['hari'] || $jadwals[$i]['jam'] != $janjis[$y]['jam']){
                        $jadwals_konsul[] = $jadwals[$i];
                    }
                }
            }else{
                $jadwals_konsul = $jadwals;
            }
        }

        $jadwal_final = [];
        $hari = [];

        for($i=1;$i<8;$i++){
            $hari[]= Carbon::now()->addDays($i);
            for($j=0;$j<count($jadwals_konsul);$j++){
                if(ucfirst($jadwals_konsul[$j]->hari) == $hari[$i-1]->isoFormat('dddd')){
                    $jadwal_final[$hari[$i-1]->format('d')]['tanggal'] = $hari[$i-1]->toDateString();
                    $jadwal_final[$hari[$i-1]->format('d')]['tanggal_full'] = $hari[$i-1]->isoFormat('D MMMM Y');
                    $jadwal_final[$hari[$i-1]->format('d')]['hari'] = $hari[$i-1]->isoFormat('dddd');
                    $jadwal_final[$hari[$i-1]->format('d')]['jadwal'][] = $jadwals_konsul[$j];
                }
            }
        }

        return view('pages.konsultasi.user.konsultasi_janji',compact('data','layanans','jadwal_final','title'));
    }

    public function createJanji(Request $request){



        $data = KonsultanJadwalJanji::updateOrCreate([
            'id_konsultan' => $request->id_konsultan,
            'id_user' => auth()->user()->id,
            'id_layanan' => $request->id_layanan,
            'status' => 'menunggu_bayar'
            ],[
            'id_konsultan' => $request->id_konsultan,
            'id_user' => auth()->user()->id,
            'id_layanan' => $request->id_layanan,
            'tanggal' => $request->tanggal,
            'hari' => $request->hari,
            'jam' => $request->jam,
            'masalah' => $request->masalah,
            'lanjutan' => $request->lanjutan != null ? $request->lanjutan : 0,
            'status' => 'menunggu_bayar'
        ]);

        $produk = Produk::where([
            'id_produk' => $request->id_layanan,
            'id_kategori' => 2
        ])->first();

        return redirect()->route('pembayaran',['id' => $produk->id, 'janji' => $data->id]);

    }

    public function riwayat(){
        $title = 'Riwayat Konsultasi - halobahagia.com';
        $datas = KonsultasiLayanan::join('konsultan_jadwal_janjis', 'konsultasi_layanans.id', '=', 'konsultan_jadwal_janjis.id_layanan')
                ->join('users', 'users.id', '=', 'konsultan_jadwal_janjis.id_user')
                ->join('konsultans', 'konsultans.id', '=', 'konsultan_jadwal_janjis.id_konsultan')
                ->where('users.id',auth()->user()->id)
                ->get(['konsultasi_layanans.*','konsultans.nama AS nama_konsultan',
                        'konsultan_jadwal_janjis.*','konsultans.id AS id_konsultan']);

        return view('pages.konsultasi.user.konsultasi_riwayat',compact('datas','title'));
    }
}
