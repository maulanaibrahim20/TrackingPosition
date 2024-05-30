<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class KabupatenKotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ids = [
            '11', '12', '13', '14', '15', '16', '17', '18', '19', '21',
            '32', '33', '34', '35', '51', '52', '53', '61', '62', '63',
            '64', '65', '71', '72', '73', '74', '75', '76', '81', '82',
            '91', '94'
        ];

        $allData = [];

        foreach ($ids as $id) {
            $response = Http::get("https://www.emsifa.com/api-wilayah-indonesia/api/regencies/{$id}.json");
            $data = $response->json();
            $allData = array_merge($allData, $data);
        }

        $insertData = [];

        foreach ($allData as $kotaKab) {
            $insertData[] = [
                'id' => $kotaKab['id'],
                'province_id' => $kotaKab['province_id'],
                'name' => $kotaKab['name'],
            ];
        }

        DB::table('kabupaten_kotas')->insert($insertData);
    }
}
