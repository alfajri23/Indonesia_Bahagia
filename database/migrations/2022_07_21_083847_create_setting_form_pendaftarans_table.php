<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingFormPendaftaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setting_form_pendaftarans', function (Blueprint $table) {
            $table->id();
            $table->integer('id_produk_kategori')->nullable();
            $table->text('pertanyaan')->nullable();
            $table->text('pilihan')->nullable();
            $table->text('tipe')->nullable();
            $table->text('required')->nullable();
            $table->text('file')->nullable();
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
        Schema::dropIfExists('setting_form_pendaftarans');
    }
}
