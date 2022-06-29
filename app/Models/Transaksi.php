<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaksi extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded =[];

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk', 'id');
    }


    public function event_enroll(){
        return $this->belongsTo(EnrollEvent::class,'id','id_transaksi');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
