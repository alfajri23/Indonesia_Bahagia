<?php

namespace App\Http\Controllers\Pembayaran\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PembayaranUserController extends Controller
{
    public function bank(){
        return view('pages.pembayaran.pembayaran_bank');
    }
}
