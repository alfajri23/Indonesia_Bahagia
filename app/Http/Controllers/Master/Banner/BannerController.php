<?php

namespace App\Http\Controllers\Master\Banner;

use App\Helpers\UploadFile;
use App\Http\Controllers\Controller;
use App\Models\MasterBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BannerController extends Controller
{
    public function index(){
        $datas = MasterBanner::all();
        return view('pages.master.banner.master_banner',compact('datas'));
    }

    public function store(Request $request){

        $this->validate($request, [
            'foto' => 'file|image|mimes:jpeg,png,jpg|max:2048|required',
        ]);

        $datas = [];
        $datas = UploadFile::file($request,'foto','storage/master/banner',$datas);

        MasterBanner::create($datas);

        return redirect()->back();
    }

    public function delete($id){
        $data = MasterBanner::find($id);
        File::delete(public_path($data->foto));
        $data->forceDelete();

        return redirect()->back();
    }
}
