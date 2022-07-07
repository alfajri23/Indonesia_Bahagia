<?php

namespace App\Http\Controllers\Kelas\Admin;

use App\Helpers\UploadFile;
use App\Http\Controllers\Controller;
use App\Models\Produk;
use App\Models\ProdukKelas;
use App\Models\ProdukKelasBab;
use App\Models\ProdukKelasKategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class KelasAdminController extends Controller
{
    public function index(Request $request){

        $data = ProdukKelas::query()
        ->when(request('cari') != null, function ($q){ 
            return $q = ProdukKelas::where('judul','like','%'.request('cari').'%');
        })
        ->when(request('status') == 'publish', function ($q){ 
            return $q = ProdukKelas::where('id_status',1);
        })
        ->when(request('status') == 'draf', function ($q){ 
            return $q = ProdukKelas::where('id_status',2);
        })
        ->when(request('status') == null, function ($q){ 
            return $q = ProdukKelas::latest();
        })
        ->get();

        return view('pages.kelas.admin.kelas_admin',compact('data'));
    }

    public function detail($id){
        $data = ProdukKelas::find($id);
        $babs = ProdukKelasBab::where('id_kelas',$data->id)->get();

        $kategori = ProdukKelasKategori::latest()->get();
        $status = '';


        return view('pages.kelas.admin.kelas_add',compact('kategori', 'status',
                                                        'data','babs'));
    }

    public function init(Request $request){
        $data = ProdukKelas::updateOrCreate(['id'=>$request->id],[
            'judul' => $request->judul,
            'tentang' => $request->tentang,
            'desc' => $request->desc,
            'poin_produk' => $request->point,
            'poster' => $request->poster,
            'id_kategori' => $request->id_kategori,
            'id_status' => $request->id_status,
            'poster' => $request->poster,
        ]);

        $produk = Produk::create([
            'id_kategori' => 3,
            'id_produk' => $data->id
        ]);

        return redirect()->route('kelasDetail',$data->id);
    }

    public function update(Request $request){

        $this->validate($request, [
			'poster' => 'image|mimes:jpeg,png,jpg|max:2048',
		]);

        $datas = [
            'judul' => $request->judul,
            'tentang' => $request->tentang,
            'desc' => $request->desc,
            'poin_produk' => $request->point,
            'id_kategori' => $request->id_kategori,
            'id_status' => $request->id_status,
            'harga' => $request->harga,
            'status' => $request->status,
        ];

        if(!empty($request->poster)){
            $datas = UploadFile::file($request,'poster','storage/kelas/poster',$datas);

            $kelas = ProdukKelas::find($request->id);
            if(isset($kelas)){
                File::delete(public_path($kelas->poster));
            }
        }
    

        $data = ProdukKelas::updateOrCreate(['id'=>$request->id],$datas);


        //Update data pada produk
        $produk = Produk::where([
            'id_kategori' => 3,
            'id_produk' => $data->id
        ])->first();

        $produk->nama = $request->judul;
        $produk->harga = $request->harga;
        $produk->poster = $data->poster;
        $produk->save();

        return redirect()->back();
    }

    public function delete(Request $request){
        $data = ProdukKelas::find($request->id);
        $data->delete();

        return response()->json([
            'message' => 'sukses',
            'data' => 'sukses menghapus',
            'code' => 200
        ]);
    }

    //kategori

    public function kelasKategori(){
        $data = ProdukKelasKategori::all();
        return view('pages.kelas.admin.kelas_kategori_admin',compact('data'));
    }

    public function storeKelasKategori(Request $request){
        ProdukKelasKategori::updateOrCreate(['id' => $request->id],[
            'nama' => $request->nama,
        ]);

        return redirect()->back();
    }

    public function deleteKelasKategori($id){
        ProdukKelasKategori::find($id)->delete();

        return redirect()->back();
    }
}
