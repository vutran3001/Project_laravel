<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\LoginController;
use \App\Http\Controllers\MainController;
use \App\Http\Controllers\LoaiSanPhamController;
use \App\Http\Controllers\SanPhamController;
use \App\Http\Controllers\CtSanPhamController;
use \App\Http\Controllers\NhaCungCapController;
use \App\Http\Controllers\UserController;
use \App\Http\Controllers\CtHoaDonController;
use \App\Http\Controllers\MaGiamGiaController;
use App\Http\Controllers\HoaDonController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\MauController;



////asdasdjaskjd

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('home',[MainController::class,'home']);
//Đăng nhập
Route::get('/',[LoginController::class,'index'])->name('Login');
Route::post('Login/store',[LoginController::class,'store']);

//Admin
Route::middleware(['auth'])->group(function () {
    Route::get('Main',[MainController::class,'home'])->name('admin');
    Route::get('Main/mains',[MainController::class,'index']);
});

//TaiKhoan
Route::resource('User',UserController::class);
//LoaiSanPham
Route::resource('LoaiSanPham', LoaiSanPhamController::class);
route::get('ThemLoaiSanPham',[LoaiSanPhamController::class,'themLoaiSanPham']);
//SanPham
Route::resource('SanPham', SanPhamController::class);
route::get('ThemSanPham',[SanPhamController::class,'themSanPham']);
// route::post('xoasp',[SanPhamController::class,'xoa']);
Route::get('SanPham/{id}/xoasp',[SanPhamController::class,'xoa']);
Route::resource('CtSanPham', CtSanPhamController::class);
//NhaCungCap
Route::resource('NhaCungCap', NhaCungCapController::class);
//HoaDon
Route::resource('HoaDon', HoaDonController::class);
//CtHoaDon
Route::resource('CTHoaDon', CtHoaDonController::class);
//MaGiamGia
Route::resource('MaGiamGia', MaGiamGiaController::class);
//Mau
Route::resource('Mau', MauController::class);
//Size
Route::resource('Size', SizeController::class);
