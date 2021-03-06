<?php

namespace App\Models;

use Exception;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable,SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded =[];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function pertanyaan()
    {
        try {
            return $this->hasMany(ForumPertanyaaan::class, 'id_user', 'id');

        }catch(Exception $e){
            return $e;
        }
    }

    public function jawaban()
    {
        return $this->hasMany(ForumJawaban::class, 'id_user', 'id');
    }

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'id_user', 'id');
    }

    public function testimoni()
    {
        return $this->hasMany(Testimoni::class, 'id_user', 'id');
    }

    public function event_enroll()
    {
        return $this->hasMany(EventEnroll::class, 'id_user', 'id');
    }
}
