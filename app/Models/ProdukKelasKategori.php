<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProdukKelasKategori extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded =[];

    public function kelas()
    {
        return $this->hasMany(ProdukKelas::class, 'id_kategori', 'id');
    }
}
