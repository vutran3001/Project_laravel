@extends('app')

@section('title', 'Page Title')



@section('content')

    <h1>Điền thông tin sản phẩm</h1>

    <form method="post" action="{{ route('NhaCungCap.store') }} " enctype="multipart/form-data">
        @csrf
        <label for="">Tên nhà cung cấp: </label><input class="form-control"style="color: rgb(0, 255, 0)" name="tenncc" value=""> <br>
        <label for="">Địa chỉ: </label><input class="form-control" name="diachincc"style="color: rgb(0, 255, 0)" value=""> <br>
        <label for="">Số điện thoại: </label><input class="form-control" name="sdtncc"style="color: rgb(0, 255, 0)" value=""> <br>

        {{-- <label for="">Trạng thái</label>
        <input type="" class="form-control" name="TrangThai" value=""><br> --}}

        <input type="submit" value="Xác nhận">
    </form>


@endsection
