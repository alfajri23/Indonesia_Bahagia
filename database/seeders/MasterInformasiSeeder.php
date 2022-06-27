<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasterInformasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('master_informasis')->insert(
            [
                'nama' => 'Tentang Kami',
                'isi' => 'isi',
            ],
            [
                'nama' => 'Syarat dan Ketentuan',
                'isi' => 'isi',
            ],
            [
                'nama' => 'Kebijakan Privasi',
                'isi' => 'isi',
            ],
        );
    }
}
