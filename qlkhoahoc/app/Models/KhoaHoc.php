<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhoaHoc extends Model
{
    use HasFactory;
    protected $fillable = ['ten_khoa_hoc', 'so_tin_chi', 'giang_vien'];

    public function hocViens()
    {
        return $this->belongsToMany(HocVien::class, 'dang_ky_khoa_hocs', 'khoa_hoc_id', 'hoc_vien_id')
            ->withPivot('diem')
            ->withTimestamps();
    }
}
