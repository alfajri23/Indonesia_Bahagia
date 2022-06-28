<?php

namespace App\Http\Controllers\Event\User;

use App\Http\Controllers\Controller;
use App\Models\ProdukEvent;
use Illuminate\Http\Request;

class EventUserController extends Controller
{
    public function detail($id){
        $data = ProdukEvent::find($id);
        return view('pages.event.user.event_detail',compact('data'));
    }
}
