<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasterSettingProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('master_setting_programs')->insert([
            [
                'nama' => 'Logo',
                'tipe' => 'foto',
            ],
            [
                'nama' => 'Logo favicon',
                'tipe' => 'foto',
            ],
            [
                'nama' => 'Transaksi',
                'tipe' => 'foto-text',
                'deskripsi' => 'pembayaran dapat dilakukan pada'
            ],
        ]);
    }
}
