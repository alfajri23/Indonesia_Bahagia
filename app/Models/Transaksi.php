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

    public function event_enroll(){
        return $this->belongsTo(ProdukEvent::class,'id','id_transaksi');
    }
}
