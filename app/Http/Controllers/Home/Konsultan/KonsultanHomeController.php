<?php

namespace App\Http\Controllers\Home\Konsultan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KonsultanHomeController extends Controller
{
    public function index(){
        return view('pages.home.home_konsultan');
    }
}
