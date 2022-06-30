<?php

namespace App\Http\Controllers\Konsultasi\Layanan\Admin;

use App\Http\Controllers\Controller;
use App\Models\KonsultanLayanan;
use App\Models\KonsultasiLayanan;
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

    public function edit($id){
        $data = KonsultasiLayanan::find($id);
        return view('pages.konsultasi.layanan.admin.konsultasi_layanan_add',compact('data'));
    }

    public function store(Request $request){
        $datas = KonsultasiLayanan::updateOrCreate(['id' => $request->id],[
            'nama' => $request->nama,
            'harga' => $request->harga,
            'desc' => $request->desc,
        ]);

        return redirect()->route('layananKonsultasiAdmin');
    }

    public function showKonsultanLayanan(Request $request){
        $data = KonsultanLayanan::where([
            'id_konsultan' => $request->id_konsultan,
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
}
