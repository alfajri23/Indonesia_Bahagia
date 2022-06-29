<?php

namespace App\Http\Controllers\Forum\User;

use App\Helpers\UploadFile;
use App\Http\Controllers\Controller;
use App\Models\ForumJawaban;
use App\Models\ForumKategori;
use App\Models\ForumPertanyaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ForumUserController extends Controller
{
    public function index(){
        $data = ForumPertanyaan::query()
        ->when(request('cari') != null, function ($q){ 
            return $q = ForumPertanyaan::where('judul','like','%'.request('cari').'%');
        })
        ->when(request('kategori') != null, function ($q){ 
            $id = ForumKategori::where('nama','like','%'.request('kategori').'%')->pluck('id');
            //dd($id);
            return $q = ForumPertanyaan::whereIn('id_kategori',$id);
        })
        ->when(request('kategori') == null && request('cari') == null, function ($q){ 
            return $q = ForumPertanyaan::latest();
        })->paginate(8);

        $kategori = ForumKategori::all();

        return view('pages.forum.forum_public',compact('data','kategori'));
    }

    public function store(Request $request){
        $this->validate($request, [
			'gambar' => 'file|image|mimes:jpeg,png,jpg|max:2048',
		]);

        $datas = [
            'id_user' => auth()->user()->id,
            'isi' => $request->isi,
            'judul' => $request->judul,
            'id_kategori' => $request->id_kategori,
        ];

        if(!empty($request->gambar)){
            $datas = UploadFile::file($request,'gambar','storage/forum',$datas);
        }

        $data = ForumPertanyaan::updateOrCreate(['id'=>$request->id],$datas);

        return redirect()->back();
    }

    public function detail($id){
        $data = ForumPertanyaan::find($id);
        $data->lihat++;
        $data->save();

        $kategori = ForumKategori::all();
        $komentars = ForumJawaban::where('id_pertanyaan', $id)->latest()->get();
        return view('pages.forum.forum_detail',compact('data','komentars','kategori'));
    }

    public function show(Request $request){
        $data = ForumPertanyaan::find($request->id);

        return response()->json([
            'data' => $data
        ]);
    } 

    public function delete(Request $request){
        $data = ForumPertanyaan::find($request->id);
        File::delete($data->gambar);
        //File::delete(public_path($data->gambar));
        $data->delete();
        return redirect()->back();
    }

    //KATEGORI
    public function createKategori(Request $request){

        $cek = ForumKategori::where('nama',$request->nama)->get();
        if(count($cek) > 0){
            return response()->json([
                'data' => 'gagal',
                'pesan' => $request->nama
            ]);
        }else{
            $data = ForumKategori::updateOrCreate(['id' => $request->id],[
                'nama' => $request->nama,
            ]);
    
            return response()->json([
                'data' => 'sukses',
                'pesan' => $request->nama
            ]);
        }
    }


    //KOMENTAR

    public function komentar(Request $request){
        
        $data = ForumJawaban::updateOrCreate(['id'=>$request->id_komentar],[
            'id_pertanyaan' => $request->id_pertanyaan,
            'jawaban' => $request->jawaban,
            'id_user' => isset(auth()->user()->id) ? auth()->user()->id : 23,
        ]);

        return redirect()->back();
    }

    public function showKomentar(Request $request){
        $data = ForumJawaban::find($request->id);

        return response()->json([
            'data' => $data
        ]);
    } 

    public function deleteKomentar(Request $request){
        $data = ForumJawaban::find($request->id);
        $data->delete();

        return redirect()->back();
    }

}
