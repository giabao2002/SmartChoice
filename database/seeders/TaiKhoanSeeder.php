<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Str;
use Illuminate\Support\Facades\Hash;


class TaiKhoanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'ten_nguoi_dung' => 'Admin',
            'email' => 'admin@gmail.com',
            'sdt' => '0123456789',
            'ten_dang_nhap' => 'admin',
            'password' => Hash::make('123123'),
            'id_phan_quyen' => '1',
        ]);

        DB::table('users')->insert([
            'ten_nguoi_dung' => 'Nguyễn Văn A',
            'email' => 'user@gmail.com',
            'sdt' => '0123456788',
            'ten_dang_nhap' => 'user1',
            'password' => Hash::make('123123'),
            'id_phan_quyen' => '2',
        ]);

        DB::table('users')->insert([
            'ten_nguoi_dung' => 'Nguyễn Văn B',
            'email' => 'user2@gmail.com',
            'sdt' => '0123456787',
            'ten_dang_nhap' => 'user2',
            'password' => Hash::make('123123'),
            'id_phan_quyen' => '2',
        ]);
    }
}
	
