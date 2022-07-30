<?php

namespace App\Http\Controllers;

use App\Models\MaGiamGia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
class MaGiamGiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listMGG=MaGiamGia::all();
        if($MGG=request()->timkiemcode)
        {
            $listMGG=MaGiamGia::where('Code','like','%'.$MGG.'%')->paginate(15);
        }
        return view('Admin.MaGiamGia_index',compact('listMGG'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MaGiamGia  $maGiamGia
     * @return \Illuminate\Http\Response
     */
    public function show(MaGiamGia $MaGiamGium)
    {
        $showMGG=MaGiamGia::where('id','=',$MaGiamGium->id)->get();
        return view('Admin.MaGiamGia_show',['showMGG'=>$showMGG]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MaGiamGia  $maGiamGia
     * @return \Illuminate\Http\Response
     */
    public function edit(MaGiamGia $MaGiamGium)
    {
        $suaMGG=MaGiamGia::where('id','=',$MaGiamGium->id)->get();
        return view('Admin.MaGiamGia_edit',['suaMGG'=>$suaMGG]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MaGiamGia  $maGiamGia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MaGiamGia $MaGiamGium)
    {
        $MaGiamGium->fill(
            [
                'Code'=>$request->input('code'),
                'NgayBatDau'=>$request->input('ngaybatdau'),
                'NgayKetThuc'=>$request->input('ngayketthuc'),
                'TrangThai'=>$request->input('trangthai'),
            ]
        );
        $MaGiamGium->save();
        return Redirect::route('MaGiamGia.show',['MaGiamGium'=>$MaGiamGium->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MaGiamGia  $maGiamGia
     * @return \Illuminate\Http\Response
     */
    public function destroy(MaGiamGia $maGiamGia)
    {
        //
    }
}
