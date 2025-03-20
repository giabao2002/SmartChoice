<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    protected $table = "users";
    protected $primaryKey = "id";
    public $timestamps = false;

    protected $fillable = [
        'ten_nguoi_dung',
        'email',
        'sdt',
        'ten_dang_nhap',
        'password',
        'id_phan_quyen',
    ];

    public function phanquyen()
    {
        return $this->belongsTo(PhanQuyen::class, 'id_phan_quyen', 'id_phan_quyen');
    }
}
