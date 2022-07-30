<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
use App\Models\LoaiSanPham;
use App\Models\SanPham;
use App\Models\NhaCungCap;


class MainController extends Controller
{
    public function index()
    {
        return view('app');
    }
    
    public function home()
    {
        $listLoaiSanPham=LoaiSanPham::all();
        $listSanPham=SanPham::all();
        $listNhaCungCap=NhaCungCap::all();
        return view('Admin.HomeAdmin',[
            'listLoai'=>$listLoaiSanPham,
            'listSP'=>$listSanPham,
            'listNhaCungCap'=>$listNhaCungCap,
        ]);
    }
}
