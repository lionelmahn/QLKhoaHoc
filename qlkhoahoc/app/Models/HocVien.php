<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HocVien extends Model
{
    use HasFactory;


    protected $table = 'hoc_viens';


    protected $fillable = [
        'ho_ten',
        'email',
        'so_dien_thoai',
        'dia_chi',
        'ngay_sinh',
    ];
    public function khoaHocs()
    {
        return $this->belongsToMany(KhoaHoc::class, 'dang_ky_khoa_hocs', 'hoc_vien_id', 'khoa_hoc_id')
            ->withPivot('diem')
            ->withTimestamps();
    }
}
