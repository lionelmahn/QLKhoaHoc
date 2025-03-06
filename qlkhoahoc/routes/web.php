<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HocVienController;
use App\Http\Controllers\KhoaHocController;
use App\Http\Controllers\DangKyController;


use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('hocviens', HocVienController::class);
    Route::resource('khoahocs', KhoaHocController::class);
    Route::post('dangky', [DangKyController::class, 'store'])->name('dangky.store');
    Route::post('capnhatdiem/{hoc_vien_id}/{khoa_hoc_id}', [DangKyController::class, 'capNhatDiem'])->name('capnhatdiem');

    Route::get('khoahocs/{id}/themhocvien', [DangKyController::class, 'themHocVien'])->name('khoahocs.themHocVien');
});

require __DIR__ . '/auth.php';
