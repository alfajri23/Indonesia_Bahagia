<?php

namespace App\Http\Controllers\Home\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserHomeController extends Controller
{
    public function index(){
        return view('pages.home.home_user');
    }
}
