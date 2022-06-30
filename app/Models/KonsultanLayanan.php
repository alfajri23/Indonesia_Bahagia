<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KonsultanLayanan extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded =[];

    public function layanan(){
        return $this->hasOne(KonsultasiLayanan::class,'id','id_layanan');
    }

    public function konsultans()
    {
        return $this->belongsTo(Konsultan::class, 'id_konsultan', 'id');
    }
}
