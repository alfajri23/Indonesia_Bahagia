<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdukKategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('produk_kategoris')->insert([
            [
                'nama' => 'Event',
            ],
            [
                'nama' => 'Konsultasi',
            ],
            [
                'nama' => 'Kelas',
            ],
        ]);
    }
}
