<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProdukKelas extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded =[];

    public function kategori()
    {
        return $this->belongsTo(ProdukKelasKategori::class, 'id_kategori', 'id');
    }

    public function bab()
    {
        return $this->hasMany(ProdukKelasBab::class, 'id_kelas', 'id');
    }

    public function isi_bab()
    {
        return $this->hasMany(ProdukKelasMateri::class, 'id_kelas', 'id');
    }

    public function enroll()
    {
        return $this->hasMany(EnrollKelas::class, 'id_kelas', 'id');
    }

}
