<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeKonsultanPendidikan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('konsultan_pendidikans', function (Blueprint $table) {
            $table->integer('id_konsultan');
        });

        Schema::table('konsultans', function (Blueprint $table) {
            $table->dropColumn('id_konsultan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
