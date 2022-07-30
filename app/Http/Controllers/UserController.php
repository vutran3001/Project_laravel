<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lstAccount=User::all();
        if($acc=request()->timkiemEmail)
        {
            $lstAccount=User::where('email','like','%'.$acc.'%')->paginate(15);
        }
        if($acc=request()->timkiemTen)
        {
            $lstAccount=User::where('name','like','%'.$acc.'%')->paginate(15);
        }
        return View('Admin/Account_index',[
            'lstAccount'=>$lstAccount,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $User=new User;
        $q=0;
        $tt=1;
        $User->fill([
            'name'=>$request->input('hoten'),
            'email'=>$request->input('email'),
            'password'=>$request->input('password'),
            'GioiTinh'=>$request->input('gioitinh'),
            'NgaySinh'=>$request->input('ngaysinh'),
            'DiaChi'=>$request->input('diachi'),
            'SDT'=>$request->input('sdt'),
            'Quyen'=>$q,
            'TrangThai'=>$tt,
        ]);
        $User->save();
        return Redirect::route('User.show',['User'=>$User->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $User)
    {
        $AccDe=User::where('id','=',$User->id)->get();
        return view('Admin.Account_show',['AccDe'=>$AccDe]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $User)
    {
        $editAcc=User::where('id','=',$User->id)->get();
        return view('Admin.Account_edit',['editAcc'=>$editAcc]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $User)
    {
        $User->fill([
            'name'=>$request->input('hoten'),
            'email'=>$request->input('email'),
            'password'=>$request->input('password'),
            'GioiTinh'=>$request->input('gioitinh'),
            'NgaySinh'=>$request->input('ngaysinh'),
            'DiaChi'=>$request->input('diachi'),
            'SDT'=>$request->input('SDT'),
            'Quyen'=>$request->input('quyen'),
            'TrangThai'=>$request->input('trangthai'),
        ]);
        $User->save();
        return Redirect::route('User.show',['User'=>$User->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
