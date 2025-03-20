<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class LoaiSanPhamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('loai_san_pham')->insert([
            'ten_loai_san_pham' => 'Tai nghe kiểm âm',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('loai_san_pham')->insert([
            'ten_loai_san_pham' => 'Tai nghe bluetooth',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('loai_san_pham')->insert([
            'ten_loai_san_pham' => 'DJ & Broadcast HeadPhones',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('loai_san_pham')->insert([
            'ten_loai_san_pham' => 'Tai nghe gaming',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
