<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoaiSanPham extends Model
{
    use HasFactory;
    protected $table = "loai_san_pham";
    protected $primaryKey = "id_loai_san_pham";
    public $timestamps = true;
    protected $fillable = ['ten_loai_san_pham'];
}
