<?php

namespace App\Http\Controllers\Auth\Konsultan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginKonsultanController extends Controller
{
    public function index(){
        return view('auth.konsultan.login_konsultan');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        //dd($credentials);
        if ($this->guard()->attempt($credentials)) {
            $request->session()->put('auth.id_konsultan', auth()->guard('konsultan')->user()->id);
            return redirect()->route('homeKonsultan');
        }
  
        return view('auth.konsultan.login_konsultan');
    }

    protected function guard()
    {
        return Auth::guard('konsultan');
    }
}
