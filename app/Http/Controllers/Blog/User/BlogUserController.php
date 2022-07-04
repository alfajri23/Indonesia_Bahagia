<?php

namespace App\Http\Controllers\Blog\User;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogKategori;
use App\Models\BlogKomentar;
use Illuminate\Http\Request;

class BlogUserController extends Controller
{

    public function index(Request $request){
        $populars = Blog::limit(3)->orderBy('pengunjung','desc')->get();
        $kategories = BlogKategori::all();

        if($request->key != null){
            $blogs = Blog::where('judul','like','%'.$request->key.'%')->paginate(6);
        }else{
            $blogs = Blog::latest()->paginate(6);
        }

        return view('pages.blog.user.blog_index_user',compact('blogs','populars','kategories'));   
    }

    public function detail($id){
        $blog = Blog::find($id);
        $populars = Blog::limit(6)->where('id_kategori',$blog->id_kategori)->get();
        $komentars = BlogKomentar::where('id_blog',$id)->latest()->get();

        return view('pages.blog.user.blog_detail_user',compact('blog','populars','komentars'));   
    }

    public function filterByCategory(Request $request){
        $blogs = Blog::where('id_kategori',$request->kategori)->paginate(6);
        $populars = Blog::limit(3)->orderBy('pengunjung','desc')->get();
        $kategories = BlogKategori::all();

        return view('pages.blog.user.blog_index_user',compact('blogs','populars','kategories'));
    }

    public function storeKomentar(Request $request){
        BlogKomentar::create([
            'id_user' => auth()->user()->id,
            'id_blog' => $request->id_blog,
            'tanggal' => now()->format('Y-m-d'),
            'waktu' => date('H:i:s'),
            'isi' => $request->isi
        ]);

        return redirect()->back();
    }

    public function deleteKomentar(Request $request){
        BlogKomentar::find($request->id)->delete();
        return redirect()->back();
    }

}
