<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKonsultanJadwalJanjisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('konsultan_jadwal_janjis', function (Blueprint $table) {
            $table->id();
            $table->integer('id_konsultan');
            $table->integer('id_layanan');
            $table->integer('id_user');
            $table->date('tanggal');
            $table->string('hari')->nullable();
            $table->string('jam');
            $table->text('masalah')->nullable();
            $table->integer('lanjutan')->default(0);
            $table->integer('id_transaksi');
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
        Schema::dropIfExists('konsultan_jadwal_janjis');
    }
}
