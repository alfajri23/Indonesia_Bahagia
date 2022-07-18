<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdukEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk_events', function (Blueprint $table) {
            $table->id();
            $table->string('tipe')->nullable();
            $table->string('judul');
            $table->date('tanggal');
            $table->string('waktu')->nullable();
            $table->text('desc')->nullable();
            $table->integer('id_konsultan')->nullable();
            $table->text('pemateri')->nullable();
            $table->string('harga');
            $table->string('harga_bias')->nullable();
            $table->string('poster')->nullable();
            $table->text('link')->nullable();
            $table->string('grup_wa')->nullable();
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
        Schema::dropIfExists('produk_events');
    }
}
