<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('provinces')->insert([
            [
                'id' => 31,
                'name' => 'DKI JAKARTA',
                'alt_name' => 'DKI JAKARTA',
                'latitude' => 6.174500,
                'longitude' => 106.822700,
            ]
        ]);
    }
}
