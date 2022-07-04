<?php

namespace App\Http\Controllers\Pembayaran\Admin;

use App\Helpers\Telepon;
use App\Http\Controllers\Controller;
use App\Models\EnrollEvent;
use App\Models\KonsultanJadwalJanji;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PembayaranAdminController extends Controller
{
    public function index(Request $request){
        
        $data = Transaksi::latest()->get();

        if ($request->ajax()) {
            if($request->tipe == 'lunas'){
                $data = Transaksi::where('status','lunas')->get();
            }elseif($request->tipe == 'pending'){
                $data = Transaksi::where('status','pending')->get();
            }elseif($request->tipe == 'ditolak'){
                $data = Transaksi::where('status','ditolak')->get();
            }elseif($request->tipe == 'semua'){
                $data = Transaksi::latest()->get();
            }

            return datatables()->of($data)
                ->addIndexColumn()
                ->addColumn('checkbox', function($row){
                    $nama = '
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="'.$row['id'].'" id="check-'.$row['id'].'">
                    </div>
                    ';
                    return $nama;
                })
                ->addColumn('bayar', function($row){
                    $actionBtn = '';
                    if($row['status'] == 'lunas'){
                        $actionBtn = '
                            <span class="badge badge-success">Lunas</span>
                        ';
                    }elseif( $row['status'] == 'belum bayar' ){
                        $actionBtn = '
                            <span class="badge badge-warning">Belum bayar</span>
                        ';
                    }elseif( $row['status'] == 'pending' ){
                        $actionBtn = '
                            <span class="badge badge-info">Konfirmasi</span>
                        ';
                    }elseif( $row['status'] == 'ditolak' ){
                        $actionBtn = '
                            <span class="badge badge-danger">Ditolak</span>
                        ';
                    }
                    return $actionBtn;
                })
                ->addColumn('user', function($row){
                    $actionBtn = '
                        <p>'.$row->user->name.'</p>
                    ';
                    return $actionBtn;
                })
                ->addColumn('tipe', function($row){
                    $actionBtn = '
                        <p>'.$row->produk->kategori->nama.'</p>
                    ';
                    return $actionBtn;
                })
                ->addColumn('nominal', function($row){
                    $actionBtn = '
                    <div>Rp. '.$row['harga'].'</div>
                    ';
                    return $actionBtn;
                })
                ->addColumn('aksi', function($row){

                    $tel = $row->user->telepon;
                    $tel = Telepon::changeTo62($tel);


                    //* DELETE
                    $btnDel = '
                        <a onclick="deletes('.$row['id'].')" class="delete btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
                    ';
                    if($row['status'] == 'lunas'){
                        $btnDel = '';    
                    }

                    //* DETAIL
                    if($row->produk->id_kategori == 2){     //Detail untuk konsultasi
                        $btnDetail = '<a onclick="detailKonsultasi('.$row['id'].')" class="btn btn-secondary btn-sm"><i class="fa-solid fa-circle-info"></i></a>';
                    }else{
                        $btnDetail = '<a onclick="detail('.$row['id'].')" class="btn btn-secondary btn-sm"><i class="fa-solid fa-circle-info"></i></a>';
                    }


                    $actionBtn = '
                    <div class="btn-group"">
                        '.$btnDetail.'
                        <a href="https://wa.me/'.$tel.'" target="_blank" class="btn btn-success btn-sm"><i class="fa-brands fa-whatsapp"></i></a>
                        '.$btnDel.'
                    </div>
                    ';
                    return $actionBtn;
                })
                ->rawColumns(['checkbox','aksi','bayar','name','nominal','user','tipe'])
                ->make(true);
        }
       
        return view('pages.pembayaran.admin.pembayaran_index');
    }

    public function transaksi_detail(Request $request){
        $data = Transaksi::find($request->id);

        return response()->json([
            'data' => $data
        ]);
    }

    public function cek_produk_bundling($produk){
        return $idsProduk = explode(",",$produk->id_produk);
        
    }

    public function transaksi_konfirmasi_bank(Request $request){
        $data = Transaksi::find($request->id);
         
        switch ($data->produk->id_kategori){
            case 1:
                $enroll = EnrollEvent::create([
                    'id_user' => $data->id_user,
                    'id_event' => $data->produk->id_produk,
                    'id_transaksi' => $data->id,
                ]);
                break;

            case 2:
                $enroll = KonsultanJadwalJanji::where('id_transaksi',$request->id)->first();
                $enroll->status = 'menunggu_konsultasi';
                $enroll->save();
                break;
            
            default:
        }

        $data->status = 'lunas';
        $data->save();

        return response()->json([
            'data' => 'sukses'
        ]);
    }

    public function transaksi_tolak(Request $request){
        $data = Transaksi::find($request->id);

        $data->status = 'ditolak';
        $data->save();

        return response()->json([
            'data' => 'sukses'
        ]);

        //! Hapus menghapus enroll
    }

    function transaksi_delete(Request $request){
        $data = Transaksi::find($request->id);
        File::delete(public_path($data->bukti));

        $data->forceDelete();

        return response()->json([
            'data' => 'sukses',
            'message' => ' Data terhapus'
        ]);
    }

    function transaksi_delete_multi(Request $request){
        $req = json_decode($request->data, true);
        $data = Transaksi::whereIn('id', $req)->delete();
        $data->delete();

        return response()->json([
            'data' => 'sukses'
        ]);
    }
}
