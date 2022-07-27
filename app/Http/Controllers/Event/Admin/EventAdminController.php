<?php

namespace App\Http\Controllers\Event\Admin;

use App\Helpers\UploadFile;
use App\Helpers\ValidateMessages;
use App\Http\Controllers\Controller;
use App\Models\Konsultan;
use App\Models\Produk;
use App\Models\ProdukEvent;
use App\Models\ProdukKategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class EventAdminController extends Controller
{

    public function event(Request $request){
        if ($request->ajax()) {
            $data = ProdukEvent::latest()->get();
            return datatables()->of($data)
                ->addIndexColumn()
                ->addColumn('status', function($row){
                    $actionBtn = $row->status == 1 ? '<span class="badge badge-success">Publish</span>' : '<span class="badge badge-warning">Berhenti</span>';
                    return $actionBtn;
                })
                ->addColumn('poster', function($row){
                    $image = asset($row['poster']);

                    $actionBtn = $image != null ? '<img src="'.$image.'" style="width:100px">' : 'kosong';
                    return $actionBtn;
                })
                ->addColumn('vendor', function($row){
                    return $konsultan = $row->id_konsultan !== null ? $row->konsultan->nama : 'kosong';
                })
                ->addColumn('action', function($row){
                    $deleteBtn = '
                    <button onclick="deleteEvent('.$row['id'].')" class="delete btn btn-danger btn-sm">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                    ';

                    $event = $row->status == 1 ? 
                        '<button onclick="endEvent('.$row['id'].')" class="delete btn btn-warning btn-sm">
                            <i class="fa-solid fa-ban"></i>
                        </button>' :
                        '<button onclick="startEvent('.$row['id'].')" class="delete btn btn-info btn-sm">
                            <i class="fa-solid fa-check"></i>
                        </button>';

                    $actionBtn = '
                    <div class="btn-group">
                        <a href="'.route('editEvent',['id' => $row['id']]).'" class="edit btn btn-success btn-sm">
                            <i class="fa-solid fa-pencil"></i>
                        </a> 
                        
                        '.$event.'
                    </div>
                    ';
                    return $actionBtn;
                })
                ->rawColumns(['action','poster','status','vendor'])
                ->make(true);
        }

        return view('pages.event.admin.event');
    }

    public function eventAdd(){
        $pemateri = Konsultan::latest()->get();
        //$pemateri = [];
        $tipes = ProdukKategori::latest()->get();
        return view('pages.event.admin.event_add',compact('pemateri','tipes'));
    }

    public function eventSave(Request $request){
        $message = ValidateMessages::messages();
        $this->validate($request, [
            'file' => 'file|image|mimes:jpeg,png,jpg|max:2048',
        ],$message);

        //cari tipe produk
        $tipe = ProdukKategori::find($request->tipe);

        $datas = [
            'judul'=>$request->judul,
            'tipe' => $tipe->nama,
            'link' => $request->link,
            'harga'=> str_replace(",", "", $request->harga),
            'tanggal'=>$request->tanggal,
            'waktu' =>$request->waktu,
            'harga_bias' => str_replace(",", "", $request->harga_bias),
            'desc'=>$request->desc,
            'pemateri' =>$request->pemateri,
            'status' => 1,
            'id_konsultan' => $request->id_konsultan,
            'grup_wa' => $request->grup_wa,
        ];

        if(!empty($request->poster)){
            $datas = UploadFile::file($request,'poster','storage/event/poster',$datas);

            $event = ProdukEvent::find($request->id);
            if(isset($event)){
                File::delete(public_path($event->poster));
            }
        }
        

        $event = ProdukEvent::updateOrCreate(['id'=>$request->id],$datas);

        $produk = Produk::updateOrCreate(['id'=>$request->id_produk],[
            'id_kategori' => $request->tipe,
            'id_produk' => $event->id,
            'nama' => $request->judul,
            'harga' => str_replace(",", "", $request->harga),
            'id_konsultan' => $event->id_konsultan,
            'poster' => $event->poster
        ]);


        return redirect()->route('eventAdmin');

    
    }

    public function eventPast(Request $request){
        if ($request->ajax()) {
            $data = ProdukEvent::onlyTrashed()->get();
            return datatables()->of($data)
                ->addIndexColumn()
                ->addColumn('poster', function($row){
                    $image = asset($row['poster']);
                    $actionBtn = '<img src="'.$image.'" style="width:100px">';
                    return $actionBtn;
                })
                ->addColumn('action', function($row){
                    $actionBtn = '
                    <div class="">
                        <a href="'.route('restoreEvent',['id' => $row['id']]).'" class="edit btn btn-success btn-sm">Restore</a> 
                    </div>
                    ';
                    return $actionBtn;
                })
                ->rawColumns(['action','poster'])
                ->make(true);
        }

        return view('pages.event.admin.event_past');
    }

    public function eventEdit(Request $request){
        $data =ProdukEvent::find($request->id);

        //nama tipe vent
        $tipe = ProdukKategori::where('nama',$data->tipe)->pluck('id')->first();
        
        $tipes = ProdukKategori::latest()->get();
        $pemateri = Konsultan::latest()->get();
        //$pemateri = [];

        $produk = Produk::where([
            'id_produk' => $data->id,
            'id_kategori' => $tipe
        ])->first();

        return view('pages.event.admin.event_edit',compact('data','produk','tipe','tipes','pemateri'));
    }

    public function eventEnd(Request $request){
        $data =ProdukEvent::find($request->id);
        $data->status = 0;
        $data->save();

        return response()->json([
            'data' => 'sukses',
            'message' => 'Event tidak akan tampil diberanda'
        ]);

        //return redirect()->back();
    }

    public function eventStart(Request $request){
        $data =ProdukEvent::find($request->id);
        $data->status = 1;
        $data->save();

        return response()->json([
            'data' => 'sukses',
            'message' => 'Event tidak akan tampil diberanda'
        ]);

        //return redirect()->back();
    }

    public function eventDelete(Request $request){
        $data =ProdukEvent::find($request->id);
        $data->delete();

        return response()->json([
            'data' => 'sukses',
            'message' => 'Data event terhapus'
        ]);

        //return redirect()->back();
    }

    public function eventRestore(Request $request){
        $data =ProdukEvent::onlyTrashed()->where('id',$request->id);
        $data->restore();
        return redirect()->back();
    }

    public function eventBundling(){
        $data = Produk::where([
            'id_kategori' => 3,
            'bundling' => 1
        ])->get();
        return view('pages.admin.produk.event.event_bundling',compact('data'));
    }
}
