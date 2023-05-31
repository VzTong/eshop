<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    use HasFactory;

    protected $fillable = [
        "ten_san_pham",
        "gia",
        "mo_ta",
        "anh_cover",
        "id_nguoi_tao",
        "id_danh_muc"
    ];
}
