<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->text('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keyword')->nullable();
            $table->text('judul');
            $table->integer('id_kategori')->nullable();
            $table->string('kategori')->nullable();
            $table->string('gambar')->nullable();
            $table->string('link')->nullable();
            $table->string('penulis');
            $table->text('isi');
            $table->integer('pengunjung')->nullable();
            $table->string('komentar')->nullable();
            $table->string('tag')->nullable();
            $table->string('publish')->nullable();
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
        Schema::dropIfExists('blogs');
    }
}
