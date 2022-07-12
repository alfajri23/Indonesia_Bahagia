<?php

namespace App\Http\Controllers\Konsultasi\Layanan\Admin;

use App\Http\Controllers\Controller;
use App\Models\KonsultanLayanan;
use App\Models\KonsultasiLayanan;
use App\Models\Produk;
use Illuminate\Http\Request;

class LayananAdminController extends Controller
{
    public function index(){
        $datas = KonsultasiLayanan::all();

        return view('pages.konsultasi.layanan.admin.konsultasi_layanan',compact('datas'));
    }

    public function add(){
        $data = null;
        return view('pages.konsultasi.layanan.admin.konsultasi_layanan_add',compact('data'));
    }

    public function detail($id,Request $request){
        $data = KonsultasiLayanan::find($id);

        $datas = KonsultanLayanan::join('konsultans','konsultan_layanans.id_konsultan', '=','konsultans.id')
                ->join('konsultasi_layanans','konsultasi_layanans.id','=','konsultan_layanans.id_layanan')
                ->where('konsultasi_layanans.id',$id)
                ->get(['konsultans.nama AS nama','konsultans.*']);


        if ($request->ajax()) {
            return datatables()->of($datas)
            ->addColumn('aksi', function($row){
                
                $btnDetail = '<a href="'.route('konsultanAdminDetail',$row->id).'" class="btn btn-success text-white btn-sm"><i class="fa-solid fa-circle-info"></i></a>';
                return $btnDetail;
            })
            ->rawColumns(['aksi'])
            ->make(true);
        }

        return view('pages.konsultasi.layanan.admin.konsultasi_layanan_detail',compact('data'));
    }

    public function edit($id){
        $data = KonsultasiLayanan::find($id);

        $produk = Produk::where([
            'id_produk' => $data->id,
            'id_kategori' => 2          //!HARDCODE
        ])->first();

        return view('pages.konsultasi.layanan.admin.konsultasi_layanan_add',compact('data','produk'));
    }

    public function store(Request $request){
        $datas = KonsultasiLayanan::updateOrCreate(['id' => $request->id],[
            'nama' => $request->nama,
            'harga' => $request->harga,
            'desc' => $request->desc,
        ]);

        $produk = Produk::updateOrCreate(['id' => $request->id_produk],[
            'id_kategori' => 2,         //!HARDCODE
            'id_produk' => $datas->id,
            'nama' => $request->nama,
            'desc' => $request->desc,
            'harga' => str_replace(",", "", $request->harga),
        ]);

        return redirect()->route('layananKonsultasiAdmin');
    }

    public function showKonsultanLayanan(Request $request){
        $data = KonsultanLayanan::where([
            'id_konsultan' => $request->id,
        ])->pluck('id_layanan');

        $datas = KonsultasiLayanan::whereNotIn('id',$data)->get();

        return response()->json([
            'data' => $datas
        ]);
    }

    public function addLayananKonsultan(Request $request){
        $datas = $request->id_layanan;

        foreach ($datas as $data){
            KonsultanLayanan::create([
                'id_layanan' => $data,
                'id_konsultan' => $request->id_konsultan
            ]);
        }

        return redirect()->back();
    }

    public function deleteLayananKonsultan(Request $request){
        $data = KonsultanLayanan::find($request->id)->forceDelete();

        if($data){
            return response()->json([
                'data' => $data,
                'message' => 'sukses menghapus',
                'status' => 'berhasil'
            ]);
        }else{
            return response()->json([
                'data' => $data,
                'message' => 'error',
                'status' => 'error'
            ]);
        }
    }
}
