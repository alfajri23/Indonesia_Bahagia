<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProdukEvent extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded =[];

    public function enroll()
    {
        return $this->hasMany(EventEnroll::class, 'id_produk', 'id');
    }

    public function konsultan()
    {
        return $this->belongsTo(Konsultan::class, 'id_konsultan', 'id');
    }

}
