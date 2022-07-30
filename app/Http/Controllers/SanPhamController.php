<?php

namespace App\Http\Controllers;

use App\Models\SanPham;
use App\Models\LoaiSanPham;
use App\Models\NhaCungCap;
use App\Models\CtSanPham;
use App\Models\Size;
use App\Models\Mau;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\UploadedFile;
use App\Http\Requests\StoreSanPhamRequest;
use App\Http\Requests\UpdateSanPhamRequest;

class SanPhamController extends Controller
{

    protected function FixImage(SanPham $SanPham)   
    {
        if (Storage::disk('public')->exists($SanPham->HinhAnh)) {
            $SanPham->HinhAnh= Storage::url('/'.$SanPham->HinhAnh);

        }
        else{
            $SanPham->HinhAnh='/assets/images/faces/face20.jpg';

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
        $listSanPham=SanPham::all();

        foreach($listSanPham as $sp)
        {
            $this->FixImage($sp);

        }
       
        if($sp=request()->timkiemid)
        {
            $listSanPham=SanPham::where('id','=',$sp)->paginate(15);
        }
        
        if($sp=request()->timkiemten)
        {
            $listSanPham=SanPham::where('TenSanPham','like','%'.$sp.'%')->paginate(15);
        }
        return view('Admin.SanPham_index',compact('listSanPham'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Size=Size::all();
        $listLoai=LoaiSanPham::all();
        return view('Admin.SanPham_create',['listLoai'=>$listLoai,'size'=>$Size]);
    }
    public function themSanPham()
    {
        $listMau=Mau::all();
        $listSize=Size::all();
        $listLoai=LoaiSanPham::all();
        $listNhaCungCap=NhaCungCap::all();
        return view('Admin.SanPham_create',[
            'listLoai'=>$listLoai,
            'listNhaCungCap'=>$listNhaCungCap,
            'listSize'=>$listSize,
            'listMau'=>$listMau
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSanPhamRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $SanPham = new SanPham;
        $chitiet = new CtSanPham;
        $tt=1;
        // dd($SanPham);
        if($request->hasFile('hinhanh'))
        {
            $SanPham->HinhAnh=$request->file('hinhanh')->store('/assets/images/faces','public');
            
        }
        $this->FixImage($SanPham);
     

        // 
        $SanPham->fill([
            'TenSanPham'=>$request->input('tensp'),
            'Gia'=>$request->input('gia'),    
            'SoLuong'=>$request->input('soluong'),
            'IdLoaiSanPham'=>$request->input('idloaisanpham'),
            'IdNhaCung'=>$request->input('idnhacungcap'),
            'Mota'=>$request->input('mota'),
            'TrangThai'=>$tt,           
        ]);
        $SanPham->save();
        $chitiet->fill([
            'IdSanPham'=>$SanPham->id,
            'IdSize'=>$request->input('size'),
            'IdMau'=>$request->input('mau'),
        ]);

        
        $chitiet->save();
        return Redirect::route('SanPham.show',['SanPham'=>$SanPham]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SanPham  $sanPham
     * @return \Illuminate\Http\Response
     */
    public function show(SanPham $SanPham)
    {
        $this->FixImage($SanPham);
        // $sanPham = SanPham::all();
        $ctSanPham = SanPham::where('id','=',$SanPham->id)->get();  
        $listLoai=LoaiSanPham::all();  
        $listNhaCungCap=NhaCungCap::all();
        $ctSP=CtSanPham::where('IdSanPham','=',$SanPham->id)->get(); 
        $ctSP2=CtSanPham::where('IdSanPham','=',$SanPham->id)->get(); 

        $Mau=Mau::all();
        $Size=Size::all();
        
        return view('Admin.SanPham_show',[
            'ctSanPham'=>$ctSanPham,
            'SanPham'=>$SanPham,
            'listLoai'=>$listLoai,
            'listNhaCungCap'=>$listNhaCungCap,
            'ctSP'=>$ctSP,
            'ctSP2'=>$ctSP2,
            'Mau'=>$Mau,
            'Size'=>$Size,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SanPham  $sanPham
     * @return \Illuminate\Http\Response
     */
    public function edit(SanPham $SanPham)
    {
        //
        // dd($sanPham);
        $this->FixImage($SanPham);
        $listMau=Mau::all();
        $listSize=Size::all();
        $listLoai=LoaiSanPham::all();
        $listNhaCungCap=NhaCungCap::all();
        $suaSanPham = SanPham::where('id','=',$SanPham->id)->get();
        $ctSP=CtSanPham::where('idSanPham','=',$SanPham->id)->get(); 
        // $suaSanPham = $sanPham;
        
        return view('Admin.SanPham_edit',[
            'suaSanPham'=>$suaSanPham,
            'ctSP'=>$ctSP,
            'listLoai'=>$listLoai,
            'listNhaCungCap'=>$listNhaCungCap,
            'listSize'=>$listSize,
            'listMau'=>$listMau
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSanPhamRequest  $request
     * @param  \App\Models\SanPham  $sanPham
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SanPham $SanPham)
    {
        if($request->hasFile('hinhanh'))
        {
            $SanPham->HinhAnh=$request->file('hinhanh')->store('/assets/images/faces','public');
            // 
        }
        if (Storage::disk('public')->exists($SanPham->HinhAnh)) {
            $SanPham->HinhAnh= Storage::url($SanPham->HinhAnh);

        }
        else{

            $SanPham->HinhAnh=$SanPham->HinhAnh;
        }

        // $SanPham = SanPham::find($request->id);
        $SanPham->fill([
            'TenSanPham'=>$request->input('tensp'),
            'Gia'=>$request->input('gia'),            
            'SoLuong'=>$request->input('soluong'),
            // 'IdLoaiSanPham'=>$request->input('idloaisanpham'),
            'IdNhaCung'=>$request->input('idnhacungcap'),
            'Mota'=>$request->input('mota'),
            'TrangThai'=>$request->input('TrangThai'),
            // 'HinhAnh'=>"",

            // 'HinhAnh'=>$request->input('hinhanh'),
        ]);
        $SanPham->save();
        return Redirect::route('SanPham.show',['SanPham'=>$SanPham]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SanPham  $sanPham
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,SanPham $SanPham)
    {
        dd($SanPham);
        $SanPham->fill([
            'TrangThai'=>$request->input('TrangThai'),
        ]);
        $SanPham->save();
         return Redirect::route('SanPham.index');
    }
   
}
