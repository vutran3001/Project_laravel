<?php

namespace App\Http\Controllers;

use App\Models\SanPham;
use App\Models\LoaiSanPham;
use App\Models\NhaCungCap;
use App\Models\CtSanPham;
use App\Models\Size;
use App\Models\Mau;

use App\Http\Requests\StoreCtSanPhamRequest;
use App\Http\Requests\UpdateCtSanPhamRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class CtSanPhamController extends Controller
{
    protected function FixImage(SanPham $SanPham)   
    {
        if (Storage::disk('public')->exists($SanPham->HinhAnh)) {
            $SanPham->HinhAnh= Storage::url($SanPham->HinhAnh);

        }
        else{
            $SanPham->HinhAnh='/assets/images/faces/face26.jpg';

            // $SanPham->HinhAnh=$SanPham->HinhAnh;

        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCtSanPhamRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $CtSanPham=new CtSanPham;
        $CtSanPham->fill([
            
        ]);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CtSanPham  $ctSanPham
     * @return \Illuminate\Http\Response
     */
    public function show(CtSanPham $CtSanPham)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CtSanPham  $ctSanPham
     * @return \Illuminate\Http\Response
     */
    public function edit(CtSanPham $ctSanPham)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCtSanPhamRequest  $request
     * @param  \App\Models\CtSanPham  $ctSanPham
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCtSanPhamRequest $request, CtSanPham $ctSanPham)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CtSanPham  $ctSanPham
     * @return \Illuminate\Http\Response
     */
    public function destroy(CtSanPham $ctSanPham)
    {
        //
    }
}
