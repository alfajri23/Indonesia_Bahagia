<?php

namespace App\Http\Controllers\Home\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminHomeController extends Controller
{
    public function index(){
        return view('pages.home.home_admin');
    }
}
