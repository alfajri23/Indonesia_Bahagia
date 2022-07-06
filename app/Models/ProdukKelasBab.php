<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProdukKelasBab extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded =[];

    public function kelas()
    {
        return $this->belongsTo(ProdukKelas::class, 'id_kelas', 'id');
    }

    public function isi_bab()
    {
        return $this->hasMany(ProdukKelasMateri::class, 'id_bab', 'id');
    }
}
