<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasterKontakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('master_kontaks')->insert(
            [
                'nama' => 'Hallo bahagia',
                'desc' => 'deskripsi',
                'alamat' => 'semarang',
                'email' => 'stacey.lopez@example.com',
                'telepon_1' => '089769362134',
                'telepon_2' => '089769362134',
                'telepon_3' => '089769362134',
            ],
        );
    }
}
