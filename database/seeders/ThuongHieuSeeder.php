<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ThuongHieuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('thuong_hieu')->insert([
            'ten_thuong_hieu' => 'JBL'
        ]);

        DB::table('thuong_hieu')->insert([
            'ten_thuong_hieu' => 'B&O'
        ]);

        DB::table('thuong_hieu')->insert([
            'ten_thuong_hieu' => 'Apple'
        ]);

        DB::table('thuong_hieu')->insert([
            'ten_thuong_hieu' => 'Harman Kardon'
        ]);

        DB::table('thuong_hieu')->insert([
            'ten_thuong_hieu' => 'Marshall'
        ]);

        DB::table('thuong_hieu')->insert([
            'ten_thuong_hieu' => 'Sony'
        ]);

        DB::table('thuong_hieu')->insert([
            'ten_thuong_hieu' => 'Focal'
        ]);

        DB::table('thuong_hieu')->insert([
            'ten_thuong_hieu' => 'Yamaha'
        ]);
    }
}
