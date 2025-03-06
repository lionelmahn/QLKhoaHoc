<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DangKyKhoaHoc extends Model
{
    use HasFactory;
    protected $fillable = ['hoc_vien_id', 'khoa_hoc_id', 'ngay_dang_ky', 'diem'];

    public function lichSuDiems()
    {
        return $this->hasMany(LichSuDiem::class, 'dang_ky_id');
    }
}
