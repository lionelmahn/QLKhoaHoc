<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LichSuDiem extends Model
{
    use HasFactory;

    protected $fillable = ['dang_ky_id', 'diem_cu', 'diem_moi', 'thoi_gian_cap_nhat'];

    public function dangKy()
    {
        return $this->belongsTo(DangKyKhoaHoc::class, 'dang_ky_id');
    }
}
