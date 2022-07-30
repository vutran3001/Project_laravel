@extends('app')

@section('title', 'Page Title')



@section('content')

    <h1>Cập nhật Nhà cung cấp</h1>
    @foreach ($suaNhaCungCap as $NhaCungCap)
        <form method="post" action="{{ route('NhaCungCap.update', ['NhaCungCap' => $NhaCungCap]) }} "
            enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <input type="hidden" name="id" value="{{ $NhaCungCap->id }}">
            <label for="">Tên nhà cung cấp: </label>
            <input class="form-control" style="color: rgb(0, 255, 0)" name="tenncc" value="{{ $NhaCungCap->TenNhaCungCap }}"> <br>
            <label for="">Địa chỉ nhà cung cấp:</label>
            <input class="form-control"style="color: rgb(0, 255, 0)" name="diachincc" value="{{ $NhaCungCap->DiaChi }}"><br>
            <label for="">Số điện thoại nhà cung cấp:</label>
            <input class="form-control"style="color: rgb(0, 255, 0)" name="sdtncc" value="{{ $NhaCungCap->SDT }}"><br>
            {{-- <label for="">Trạng thái</label>
            <input class="form-control" name="trangthaincc" value="{{ $NhaCungCap->TrangThai }}"> --}}

            <input type="submit" value="Xác nhận">
        </form>
    @endforeach

@endsection
