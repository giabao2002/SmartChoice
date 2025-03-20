<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    use HasFactory;
    protected $table = "san_pham";
    protected $primaryKey = "id_san_pham";
    public $timestamps = true;
    protected $fillable = [
        'ten_san_pham',
        'ten_loai_san_pham',
        'ten_thuong_hieu',
        'mo_ta',
        'don_gia',
        'so_luong',
        'hinh_anh_1',
        'hinh_anh_2',
        'hinh_anh_3',
        'hinh_anh_4',
        'ten_khuyen_mai',
        'so_luong_mua',
    ];
}
