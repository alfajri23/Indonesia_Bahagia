<?php

namespace App\Http\Controllers\Testimoni\User;

use App\Http\Controllers\Controller;
use App\Models\Testimoni;
use Illuminate\Http\Request;

class TestimoniUserController extends Controller
{
    public function store(Request $request){
        
        $data = Testimoni::updateOrCreate(['id' => $request->id],[
            'id_user' => auth()->user()->id,
            'id_konsultan' => $request->id_k,
            'id_produk' => $request->id_produk,
            'pesan' => $request->pesan
        ]);

        return redirect()->back()->with('success','Terima kasih atas penilaian Anda');
    }
}
