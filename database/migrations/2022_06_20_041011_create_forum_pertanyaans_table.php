<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForumPertanyaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forum_pertanyaans', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user')->nullable();
            $table->integer('is_answered')->default(0);
            $table->string('judul')->nullable();
            $table->string('isi')->nullable();
            $table->string('gambar')->nullable();
            $table->integer('id_kategori')->nullable();
            $table->integer('lihat')->default(0);
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
        Schema::dropIfExists('forum_pertanyaans');
    }
}
