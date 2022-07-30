@extends('app')

@section('title', 'Page Title')



@section('content')

    <h1>Điền thông tin loại sản phẩm</h1>

    <form method="post" action="{{ route('LoaiSanPham.store') }} " enctype="multipart/form-data">
        @csrf
        <label for="">Tên loại sản phẩm: </label><input style="color: rgb(0, 255, 0)"class="form-control" name="tenlsp" value=""> <br>
        <label for="">Trạng thái</label>
        <input type="" class="form-control" name="TrangThai"style="color: rgb(0, 255, 0)" value=""><br>

        <input type="submit" value="Xác nhận">
    </form>


@endsection
