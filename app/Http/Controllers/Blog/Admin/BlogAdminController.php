<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Helpers\UploadFile;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogKategori;
use App\Models\BlogKomentar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class BlogAdminController extends Controller
{
    public function index(Request $request){ 
        if ($request->ajax()) {
            $data = Blog::latest()->get();
            return datatables()->of($data)
            ->addIndexColumn()
            ->addColumn('tanggal', function($row){
                $nama = '
                <p>'.date_format(date_create($row->updated_at),"d M Y").'</p>
                ';
                return $nama;
            })
            ->addColumn('kategori', function($row){
                $nama = '
                <p>'.$row->kategori.'</p>
                ';
                return $nama;
            })
            ->addColumn('aksi', function($row){
                $actionBtn = '
                <div class="">
                    <a href="'.route('blogPreviewAdmin',$row->id).'" class="btn btn-primary text-white btn-sm"><i class="fa-solid fa-circle-info"></i></a>
                    <a href="'.route('blogEditAdmin',$row->id).'" class="btn btn-success text-white btn-sm"><i class="fa-solid fa-pencil"></i></a>
                    <a onclick="unpublish('.$row['id'].')" class="delete btn btn-danger btn-sm"><i class="fa-solid fa-eye-slash"></i></a>
                </div>
                ';
                return $actionBtn;
            })
            ->rawColumns(['aksi','tanggal','kategori'])
            ->make(true);
        }

        $kat = BlogKategori::all();

        return view('pages.blog.admin.blog_index_admin',compact('kat'));
    }

    public function blogUnpublish(Request $request){
        if ($request->ajax()) {
            $data = Blog::onlyTrashed()->get();
            return datatables()->of($data)
            ->addIndexColumn()
            ->addColumn('tanggal', function($row){
                $nama = '
                <p>'.date_format(date_create($row->updated_at),"d M Y").'</p>
                ';
                return $nama;
            })
            ->addColumn('aksi', function($row){
                $actionBtn = '
                <div class="">
                    <a onclick="deletes('.$row['id'].')" class="delete btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></i></a>
                    <a onclick="publish('.$row['id'].')" class="delete btn btn-success btn-sm"><i class="fa-solid fa-eye-slash"></i></a>
                </div>
                ';
                return $actionBtn;
            })
            ->rawColumns(['aksi','tanggal'])
            ->make(true);
        }

        return view('pages.blog.admin.blog_unpublish_admin');
    }

    public function add(){
        $data = BlogKategori::all();
        return view('pages.blog.admin.blog_add_admin',compact('data'));
    }

    public function store(Request $request){
        $this->validate($request, [
			'gambar' => 'file|image|mimes:jpeg,png,jpg|max:2048',
		]);

        $kat = BlogKategori::find($request->id_kategori);

        $datas = [
            'judul' => $request->judul,
            'link' => Str::slug($request->judul, '-'),
            'penulis' => $request->penulis,
            'isi' => $request->isi,
            'tag' => $request->tag,
            'id_kategori' => $request->id_kategori,
            'kategori' => $kat->nama,
            'meta_title' => $request->meta_title,
            'meta_keyword' => $request->meta_keyword,
            'meta_description' => $request->meta_desc,
        ];

        if(!empty($request->gambar)){
            $datas = UploadFile::file($request,'gambar','storage/blog',$datas);

            $blog = Blog::find($request->id);
            if(isset($blog)){
                File::delete(public_path($blog->gambar));
            }
        }else{
            $datas['gambar'] = 'storage/blog/poster_blog.jpeg';
        }

        Blog::updateOrCreate(['id' => $request->id],$datas);
        return redirect()->route('blogAdmin');

    }

    public function edit($id){
        $data = Blog::find($id);
        $kat = BlogKategori::all();
        return view('pages.blog.admin.blog_edit_admin',compact('data','kat'));
    }

    public function unpublish(Request $request){
        $data = Blog::find($request->id);
        $data->delete();

        return response()->json([
            'data' => 'sukses'
        ]);
    }

    public function publish(Request $request){
        $data = Blog::onlyTrashed()->find($request->id);
        $data->restore();

        return response()->json([
            'data' => 'sukses'
        ]);
    }

    public function delete(Request $request){
        $data = Blog::onlyTrashed()->find($request->id);
        File::delete(public_path($data->gambar));
        $data->forceDelete();

        return response()->json([
            'data' => 'sukses'
        ]);
    }

    public function preview($id){
        return redirect()->route('blogDetailUser',$id);
    }

    //kategori

    public function blogKategori(){
        $data = BlogKategori::all();
        return view('pages.blog.admin.blog_kategori_admin',compact('data'));
    }

    public function storeBlogKategori(Request $request){
        BlogKategori::updateOrCreate(['id' => $request->id],[
            'nama' => $request->nama,
        ]);

        return redirect()->back();
    }

    public function deleteBlogKategori($id){
        BlogKategori::find($id)->delete();

        return redirect()->back();
    }

}
