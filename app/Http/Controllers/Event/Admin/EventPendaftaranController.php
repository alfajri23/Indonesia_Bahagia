<?php

namespace App\Http\Controllers\Event\Admin;

use App\Helpers\Telepon;
use App\Http\Controllers\Controller;
use App\Models\EnrollEvent;
use Illuminate\Http\Request;

class EventPendaftaranController extends Controller
{
    public function event(Request $request){
        
        $data = EnrollEvent::latest()->get();

        if ($request->ajax()) {
            return datatables()->of($data)
            ->addIndexColumn()
            ->addColumn('judul', function($row){
                $nama = '
                <p>'.$row->event->judul.'</p>
                ';
                return $nama;
            })
            ->addColumn('email', function($row){
                $nama = '
                <p>'.$row->user->email.'</p>
                ';
                return $nama;
            })
            ->addColumn('bayar', function($row){
                $actionBtn = '';
                if($row->transaksi != null){

                    if($row->transaksi->status == 'lunas'){
                        $actionBtn = '
                            <span class="badge badge-success">Lunas</span>
                        ';
                    }elseif( $row->transaksi->status == 'belum bayar' ){
                        $actionBtn = '
                            <span class="badge badge-warning">Belum bayar</span>
                        ';
                    }elseif( $row->transaksi->status == 'pending' ){
                        $actionBtn = '
                            <span class="badge badge-info">Konfirmasi</span>
                        ';
                    }elseif( $row->transaksi->status == 'ditolak' ){
                        $actionBtn = '
                            <span class="badge badge-danger">Ditolak</span>
                        ';
                    }
                }else{
                    $actionBtn = '
                        <span class="badge badge-success">Gratis</span>
                    ';
                }
                return $actionBtn;
            })
            ->addColumn('tipe', function($row){
                $nama = '
                <p>'.$row->event->tipe.'</p>
                ';
                return $nama;
            })
            ->addColumn('tanggal', function($row){
                $nama = '
                <p>'.date_format(date_create($row->created_at),"d M Y").'</p>
                ';
                return $nama;
            })
            ->addColumn('aksi', function($row){
                $btnTransaksi = '';
                if($row->transaksi != null){
                    $btnTransaksi = '<a onclick="detail('.$row->transaksi->id.','.$row->id.')" class="btn btn-secondary btn-sm"><i class="fa-solid fa-circle-info"></i></a>';
                }

                $actionBtn = '
                    <div class="">
                        '.$btnTransaksi.'
                        <a href="https://wa.me/'.Telepon::changeTo62($row->user->telepon).'" target="_blank" class="btn btn-success btn-sm"><i class="fa-brands fa-whatsapp"></i></a>
                    </div>
                ';
                
                return $actionBtn;
            })
            ->rawColumns(['judul','email','tipe','aksi','bayar','tanggal'])
            ->make(true);
        
        }

        return view('pages.event.admin.event_pendaftar');
    }

    public function deleteEnrollEvent(Request $request){
        $data = EnrollEvent::find($request->id);
        $data->forceDelete();

        return response()->json([
            'data' => 'sukses menghapus'
        ]);
    }

    // public function downloadEvent(Request $request){
    //     return Excel::download(new EnrollEventExport($request->id), 'beduk.xlsx');
    // }
}
