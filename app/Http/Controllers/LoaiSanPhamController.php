<?php

namespace App\Http\Controllers;

use App\Models\LoaiSanPham;
use App\Models\SanPham;
use App\Http\Requests\StoreLoaiSanPhamRequest;
use App\Http\Requests\UpdateLoaiSanPhamRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
class LoaiSanPhamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listLoai= LoaiSanPham::all();
        
        if($loai=request()->timkiemid)
        {
            $listLoai=LoaiSanPham::where('id','=',$loai)->paginate(15);
        }
        
        if($loai=request()->timkiemten)
        {
            $listLoai=LoaiSanPham::where('TenLoaiSanPham','like','%'.$loai.'%')->paginate(15);
        }
        
        // dd($listLoai);
        return view('Admin.LoaiSanPham_index',compact('listLoai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.LoaiSanPham_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLoaiSanPhamRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $LoaiSanPham = new LoaiSanPham;
        $LoaiSanPham->fill([
       
                'TenLoaiSanPham'=>$request->input('tenlsp'),
                'TrangThai'=>$request->input('TrangThai')
        ]);
        $LoaiSanPham->save();
        return Redirect::route('LoaiSanPham.index',['LoaiSanPham'=>$LoaiSanPham]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LoaiSanPham  $loaiSanPham
     * @return \Illuminate\Http\Response
     */


    public function show2()
    {
        $listSanPham=SanPham::all();
        return view('Admin.LoaiSanPham',['listSanPham'=>$listSanPham]);
    } 

    public function show(LoaiSanPham $LoaiSanPham)
    {
        $listSanPham = SanPham::where('IdLoaiSanPham','=',$LoaiSanPham->id)->get();

        return view('Admin.LoaiSanPham',[
            'loaiSanPham'=>$LoaiSanPham,
            'listSanPham'=>$listSanPham,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LoaiSanPham  $loaiSanPham
     * @return \Illuminate\Http\Response
     */
    public function edit(LoaiSanPham $LoaiSanPham)
    {
        $LoaiSanPham = LoaiSanPham::where('id','=',$LoaiSanPham->id)->get();
        
        return view('Admin.LoaiSanPham_edit',[
            'sualoaiSanPham'=>$LoaiSanPham
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLoaiSanPhamRequest  $request
     * @param  \App\Models\LoaiSanPham  $loaiSanPham
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LoaiSanPham $LoaiSanPham)
    {
        $LoaiSanPham->fill([
            'TenLoaiSanPham'=>$request->input('tenloaisp'),
            
            'TrangThai'=>$request->input('TrangThai'),
            
        ]);
        $LoaiSanPham->save();
        return Redirect::route('LoaiSanPham.show',['LoaiSanPham'=>$LoaiSanPham]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LoaiSanPham  $loaiSanPham
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, LoaiSanPham $LoaiSanPham)
    {
        $LoaiSanPham->fill([
            'TenLoaiSanPham'=>$request->input('tenloaisp'),
            
            'TrangThai'=>$request->input('TrangThai'),
            
        ]);
        $LoaiSanPham->save();
        

        return Redirect::route('LoaiSanPham.index');
    }
}
