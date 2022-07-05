<?php

namespace App\Http\Controllers\Testimoni\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimoni;
use Illuminate\Http\Request;

class TestimoniAdminController extends Controller
{
    public function index(Request $request){
        $data = Testimoni::with('user')->latest()->get();

        if ($request->ajax()) {
            return datatables()->of($data)
            ->addIndexColumn()
            ->addColumn('nama', function($row){
                $nama = '
                <p>'.$row->user->name.'</p>
                ';
                return $nama;
            })
            ->addColumn('status', function($row){
                if($row->status == 1){
                    $nama = '<span class="badge bg-success">Tampil</span>';
                }else{
                    $nama = '<span class="badge bg-danger">Tidak tampil</span>';
                }
                return $nama;
            })
            ->addColumn('aksi', function($row){
                if($row->status == 1){
                    $btnAksi = '<a onclick="nonaktif('.$row->id.')" class="btn btn-light btn-sm"><i class="fa-solid text-success fa-lg fa-toggle-on"></i></i></a>';                
                }else{
                    $btnAksi = '<a onclick="aktif('.$row->id.')" class="btn btn-light btn-sm"><i class="fa-solid text-danger fa-lg fa-toggle-off"></i></i></a>';                
                }
                return $btnAksi;
            })
            ->rawColumns(['nama','status','aksi'])
            ->make(true);
        
        }

        return view('pages.testimoni.admin.testimoni_index');

    }

    public function nonaktif(Request $request){
        $data = Testimoni::find($request->id);
        $data->status = 0;
        $data->save();

        return response()->json([
            'message' => "berhasil memperbarui"
        ]);
    }

    public function aktif(Request $request){
        $data = Testimoni::find($request->id);
        $data->status = 1;
        $data->save();

        return response()->json([
            'message' => "berhasil memperbarui"
        ]);
    }
}
