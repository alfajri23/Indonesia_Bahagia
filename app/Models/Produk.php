<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produk extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded =[];

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'id_produk', 'id');
    }

    public function kategori()
    {
        return $this->belongsTo(ProdukKategori::class, 'id_kategori', 'id');
    }

}
