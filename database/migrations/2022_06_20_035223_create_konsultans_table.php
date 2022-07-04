<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKonsultansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('konsultans', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('pengalaman')->nullable();
            $table->string('SIPP')->nullable();
            $table->string('STR')->nullable();
            $table->string('telepon')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('foto')->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->string('alamat')->nullable();
            $table->string('pendidikan')->nullable();
            $table->string('password');
            $table->string('ig')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('twitter')->nullable();
            $table->string('facebook')->nullable();
            $table->date('last_login')->nullable();
            $table->softDeletes();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('konsultans');
    }
}
