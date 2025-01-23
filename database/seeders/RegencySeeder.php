<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('regencies')->insert([
            [
                'id' => 3101,
                'province_id' => 31,
                'name' => 'KABUPATEN KEPULAUAN SERIBU',
                'alt_name' => 'KABUPATEN KEPULAUAN SERIBU',
                'latitude' => -5.598500,
                'longitude' => 106.552710,
                'luas' => 10.73,
                'populasi' => 28523,
                'penyakit' => 0,
            ],
            [
                'id' => 3171,
                'province_id' => 31,
                'name' => 'KOTA JAKARTA SELATAN',
                'alt_name' => 'KOTA JAKARTA SELATAN',
                'latitude' => -6.266000,
                'longitude' => 106.813500,
                'luas' => 144.94,
                'populasi' => 2235606,
                'penyakit' => 16,
            ],
            [
                'id' => 3172,
                'province_id' => 31,
                'name' => 'KOTA JAKARTA TIMUR',
                'alt_name' => 'KOTA JAKARTA TIMUR',
                'latitude' => -6.252100,
                'longitude' => 106.884000,
                'luas' => 185.54,
                'populasi' => 3079618,
                'penyakit' => 46,
            ],
            [
                'id' => 3173,
                'province_id' => 31,
                'name' => 'KOTA JAKARTA PUSAT',
                'alt_name' => 'KOTA JAKARTA PUSAT',
                'latitude' => -6.177700,
                'longitude' => 106.840300,
                'luas' => 47.56,
                'populasi' => 1049314,
                'penyakit' => 35,
            ],
            [
                'id' => 3174,
                'province_id' => 31,
                'name' => 'KOTA JAKARTA BARAT',
                'alt_name' => 'KOTA JAKARTA BARAT',
                'latitude' => -6.167600,
                'longitude' => 106.767300,
                'luas' => 125.00,
                'populasi' => 2470054,
                'penyakit' => 1,
            ],
            [
                'id' => 3175,
                'province_id' => 31,
                'name' => 'KOTA JAKARTA UTARA',
                'alt_name' => 'KOTA JAKARTA UTARA',
                'latitude' => -6.133900,
                'longitude' => 106.882300,
                'luas' => 147.21,
                'populasi' => 1808985,
                'penyakit' => 5,
            ],
        ]);
    }
}
