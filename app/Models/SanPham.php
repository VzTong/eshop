<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    public function danh_mucs() : BelongsTo
    {
        return $this->belongsTo(DanhMuc::class, "id_danh_muc", "id");
    }
}
