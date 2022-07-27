<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AssesmentWLBSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('assesment_w_l_b_s')->insert([
            [
                'tipe' => 0,
                'pertanyaan' => 'saya merasa bahwa saya tidak punya atau sedikit kontrol atas kehidupan kerja saya',
            ],
            [
                'tipe' => 1,
                'pertanyaan' => 'Saya terbiasa menikmati hobi atau kesenangan lain di luar pekerjaan saya',
            ],
            [
                'tipe' => 0,
                'pertanyaan' => 'Saya sering merasa bersalah karena saya tidak bisa membagi waktu untuk memenuhi semua keinginan saya',
            ],
            [
                'tipe' => 0,
                'pertanyaan' => 'Saya kerap merasa cemas atau sedih karena apa yang terjadi di tempat kerja',
            ],
            [
                'tipe' => 1,
                'pertanyaan' => 'Saya biasanya mempunyai cukup waktu bersama orang yang saya cintai',
            ],
            [
                'tipe' => 1,
                'pertanyaan' => 'Ketika saya berada di rumah, saya merasa rileks dan nyaman',
            ],
            [
                'tipe' => 1,
                'pertanyaan' => 'Saya punya waktu untuk diri saya sendiri setiap pekan',
            ],

            [
                'tipe' => 0,
                'pertanyaan' => 'Saya merasa kepayahan hampir sepanjang hari',
            ],
            [
                'tipe' => 1,
                'pertanyaan' => 'Saya jarang kehilangan kendali di tempat kerja',
            ],
            [
                'tipe' => 0,
                'pertanyaan' => 'Saya tidak pernah mengambil semua jatah hari cuti saya',
            ],
            [
                'tipe' => 0,
                'pertanyaan' => 'Saya merasa lelah, bahkan di awal pekan',
            ],
            [
                'tipe' => 0,
                'pertanyaan' => 'Biasanya, saya tetap bekerja pada saat istirahat makan siang',
            ],
            [
                'tipe' => 1,
                'pertanyaan' => 'Saya jarang melewatkan acara penting keluarga karena pekerjaan',
            ],
            [
                'tipe' => 0,
                'pertanyaan' => 'Saya terbiasa berpikir tentang pekerjaan pada saat saya tidak bekerja',
            ],
            [
                'tipe' => 0,
                'pertanyaan' => 'Keluarga saya sering tidak senang karena banyaknya waktu yang saya habiskan untuk bekerja',
            ],
            
        ]);
    }
}
