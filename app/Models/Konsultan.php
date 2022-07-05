<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;

class Konsultan extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use SoftDeletes;

    protected $guarded =[];

    public function pendidikans()
    {
        return $this->hasMany(KonsultanPendidikan::class, 'id_konsultan', 'id');
    }

    public function layanans()
    {
        return $this->hasMany(KonsultanLayanan::class, 'id_konsultan', 'id');
    }

    public function jadwals()
    {
        return $this->hasMany(KonsultanJadwal::class, 'id_konsultan', 'id');
    }


}
