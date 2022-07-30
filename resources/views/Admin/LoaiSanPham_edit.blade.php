@extends('app')

@section('title', 'Page Title')



@section('content')

    <h1>Cập nhật Loại sản phẩm </h1>
    @foreach ($sualoaiSanPham as $lsp)
        <form method="post" action="{{ route('LoaiSanPham.update', ['LoaiSanPham' => $lsp]) }} " enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <label for="">Tên loại sản phẩm: </label><input style="color: rgb(0, 255, 0)"class="form-control" name="tenloaisp" value="{{ $lsp->TenLoaiSanPham }}"> <br>
            <label for="">Trạng Thái: </label>
            <input  name="TrangThai"class="form-control"style="color: rgb(0, 255, 0)" value="{{ $lsp->TrangThai }}"> <br> <br>
    <input type="submit" value="Xác nhận">
    </form>
    @endforeach
    

@endsection
