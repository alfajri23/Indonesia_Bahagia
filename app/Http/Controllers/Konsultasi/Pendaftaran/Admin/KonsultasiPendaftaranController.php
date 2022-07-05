<?php

namespace App\Http\Controllers\Konsultasi\Pendaftaran\Admin;

use App\Helpers\Telepon;
use App\Http\Controllers\Controller;
use App\Models\KonsultanJadwalJanji;
use Illuminate\Http\Request;

class KonsultasiPendaftaranController extends Controller
{
    
    public function konsultasi(Request $request){   
        $data = KonsultanJadwalJanji::join('konsultans','konsultan_jadwal_janjis.id_konsultan','=','konsultans.id')
                ->join('users','konsultan_jadwal_janjis.id_user','=','users.id')
                ->join('konsultasi_layanans','konsultan_jadwal_janjis.id_layanan','=','konsultasi_layanans.id')
                ->get(['konsultan_jadwal_janjis.*','konsultasi_layanans.*',
                    'konsultan_jadwal_janjis.id AS id',
                    'konsultans.nama AS nama_konsultan','konsultans.telepon AS telepon_konsultan',
                    'users.name']);
        //dd($data);

        if ($request->ajax()) {
            return datatables()->of($data)
            ->addIndexColumn()
            ->addColumn('nama', function($row){
                $nama = '
                <p>'.$row->nama.'</p>
                ';
                return $nama;
            })
            ->addColumn('konsultan', function($row){
                $nama = '
                <p>'.$row->nama_konsultan.'</p>
                ';
                return $nama;
            })
            ->addColumn('pasien', function($row){
                $nama = '
                <p>'.$row->name.'</p>
                ';
                return $nama;
            })
            ->addColumn('tanggal', function($row){
                $nama = '
                <p>'.date_format(date_create($row->tanggal),"d M Y").'</p>
                ';
                return $nama;
            })
            ->addColumn('aksi', function($row){
                $btnTelepon = '<a href="https://wa.me/'.Telepon::changeTo62($row->telepon_konsultan).'" target="_blank" class="btn btn-success btn-sm"><i class="fa-brands fa-whatsapp"></i></a>';                
                $btnTransaksi = '<a onclick="detail('.$row->id.')" class="btn btn-secondary btn-sm"><i class="fa-solid fa-circle-info"></i></a>';
                
                if($row->status == 'menunggu_konsultasi'){
                    $btnStatus = '<a onclick="doneStatus('.$row->id.')" class="btn btn-info btn-sm"><i class="fas fa-question-circle"></i></a>';
                }else{
                    $btnStatus = null;
                }

                $actionBtn = '
                    <div class="">
                        '.$btnTransaksi.'
                        '.$btnTelepon.'
                        '.$btnStatus.'
                    </div>
                ';
                
                return $actionBtn;
            })
            ->rawColumns(['nama','konsultan','pasien','aksi','tanggal'])
            ->make(true);
        
        }

        return view('pages.konsultasi.admin.konsultasi_pendaftar');
    }

    public function detail_transaksi(Request $request){
        $data = KonsultanJadwalJanji::join('konsultans','konsultan_jadwal_janjis.id_konsultan','=','konsultans.id')
                ->join('users','konsultan_jadwal_janjis.id_user','=','users.id')
                ->join('konsultasi_layanans','konsultan_jadwal_janjis.id_layanan','=','konsultasi_layanans.id')
                ->where('konsultan_jadwal_janjis.id_transaksi',$request->id)
                ->get(['konsultan_jadwal_janjis.*','konsultasi_layanans.*','konsultans.*','users.name'])->first();

        $data['telepon'] = Telepon::changeTo62($data['telepon']);
        
        return response()->json([
            'status' => 'success',
            'data' => $data
        ]);
    }

    public function detail(Request $request){
        $data = KonsultanJadwalJanji::join('konsultans','konsultan_jadwal_janjis.id_konsultan','=','konsultans.id')
                ->join('users','konsultan_jadwal_janjis.id_user','=','users.id')
                ->join('konsultasi_layanans','konsultan_jadwal_janjis.id_layanan','=','konsultasi_layanans.id')
                ->where('konsultan_jadwal_janjis.id',$request->id)
                ->get(['konsultan_jadwal_janjis.*','konsultasi_layanans.*','konsultans.*','users.name'])->first();

        //$data['telepon'] = Telepon::changeTo62($data['telepon']);
        
        return response()->json([
            'status' => 'success',
            'data' => $data
        ]);

    }

    public function doneStatus(Request $request){
        $data = KonsultanJadwalJanji::find($request->id);
        $data->status = 'selesai';
        $data->save();

        return response()->json([
            'status' => 'success',
            'data' => $data,
            'message' => 'sukses merubah status'
        ]);
    }
}
