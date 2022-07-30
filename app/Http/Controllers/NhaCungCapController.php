<?php

namespace App\Http\Controllers;

use App\Models\NhaCungCap;
use App\Http\Requests\StoreNhaCungCapRequest;
use App\Http\Requests\UpdateNhaCungCapRequest;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
class NhaCungCapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listNhaCungCap=NhaCungCap::all();

        if($ncc=request()->timkiemid)
        {
            $listNhaCungCap=NhaCungCap::where('id','=',$ncc)->paginate(15);
        }
        
        if($ncc=request()->timkiemten)
        {
            $listNhaCungCap=NhaCungCap::where('TenNhaCungCap','like','%'.$ncc.'%')->paginate(15);
        }

        return view('Admin.NhaCungCap_index',compact('listNhaCungCap'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.NhaCungCap_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreNhaCungCapRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $NhaCungCap = new NhaCungCap;
        $tt=1;
        $NhaCungCap->fill([
            'TenNhaCungCap'=>$request->input('tenncc'),
            'DiaChi'=>$request->input('diachincc'),
            'SDT'=>$request->input('sdtncc'),            
            'TrangThai'=>$tt,
        ]);
        $NhaCungCap->save();
        return Redirect::route('NhaCungCap.show',['NhaCungCap'=>$NhaCungCap]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NhaCungCap  $nhaCungCap
     * @return \Illuminate\Http\Response
     */
    public function show(NhaCungCap $NhaCungCap)
    {
        $ctNhaCungCap = NhaCungCap::where('id','=',$NhaCungCap->id)->get();  
       
        
        return view('Admin.NhaCungCap_show',[
            'ctNhaCungCap'=>$ctNhaCungCap,
            'NhaCungCap'=>$NhaCungCap,
            
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NhaCungCap  $nhaCungCap
     * @return \Illuminate\Http\Response
     */
    public function edit(NhaCungCap $NhaCungCap)
    {
        $suaNhaCungCap = NhaCungCap::where('id','=',$NhaCungCap->id)->get();

        return view('Admin.NhaCungCap_edit',[
            'suaNhaCungCap'=>$suaNhaCungCap,
            ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNhaCungCapRequest  $request
     * @param  \App\Models\NhaCungCap  $nhaCungCap
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NhaCungCap $NhaCungCap)
    {        
        $NhaCungCap->fill([
            'TenNhaCungCap'=>$request->input('tenncc'),
            'DiaChi'=>$request->input('diachincc'),
            'SDT'=>$request->input('sdtncc'),   
        ]);
        $NhaCungCap->save();
        return Redirect::route('NhaCungCap.show',['NhaCungCap'=>$NhaCungCap]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NhaCungCap  $nhaCungCap
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,NhaCungCap $NhaCungCap)
    {
        // dd($NhaCungCap);
        $NhaCungCap->fill([
            'TrangThai'=>$request->input('TrangThai'),
        ]);
        $NhaCungCap->save();
         return Redirect::route('NhaCungCap.index');
    }
}
