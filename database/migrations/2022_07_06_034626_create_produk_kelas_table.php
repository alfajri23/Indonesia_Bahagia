<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdukKelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk_kelas', function (Blueprint $table) {
            $table->id();
            $table->string('judul')->nullable(); 
            $table->integer('id_status')->nullable(); 
            $table->integer('id_kategori')->nullable(); 
            $table->string('bahasa')->nullable(); 
            $table->string('lama_kelas')->nullable(); 
            $table->string('tentang')->nullable(); 
            $table->text('desc')->nullable(); 
            $table->text('poin_produk')->nullable(); //berisi list apa yang akan dipelajari
            $table->string('poster')->nullable(); 
            $table->integer('harga')->nullable(); 
            $table->integer('status')->default(1); 
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
        Schema::dropIfExists('produk_kelas');
    }
}
