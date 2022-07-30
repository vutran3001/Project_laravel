@extends('app')

@section('title', 'Page Title')


@section('content')

    <h1>Điền thông tin sản phẩm</h1>

    <form method="post" action="{{ route('SanPham.store') }} " enctype="multipart/form-data">
        @csrf
        <label for="">Tên sản phẩm: </label><input style="color: rgb(0, 255, 0)" class="form-control" name="tensp"
            value=""> <br>

        <label for="">Loại sản phẩm: </label>
        <select class="form-control" style="color: rgb(0, 255, 0)" name="idloaisanpham">
            <option value="">----Chọn loại----</option>

            @foreach ($listLoai as $loai)
                @if ($loai->TrangThai == 1)
                    <option value="{{ $loai->id }}">{{ $loai->TenLoaiSanPham }}</option>
                @endif
            @endforeach

        </select><br>

        <label for="">Nhà cung cấp</label>
        <select class="form-control" style="color: rgb(0, 255, 0)" name="idnhacungcap">
            <option value="">----Chọn loại----</option>

            @foreach ($listNhaCungCap as $NhaCungCap)
                @if ($NhaCungCap->TrangThai == 1)
                    <option value="{{ $NhaCungCap->id }}">{{ $NhaCungCap->TenNhaCungCap }}</option>
                @endif
            @endforeach
        </select><br>


        <label for="">Giá: </label>
        <input class="form-control" style="color: rgb(0, 255, 0)" name="gia" value=""> <br>

        
            <label for="">Màu</label>
        <select class="form-control" style="color: rgb(0, 255, 0)" name="mau">
            <option value="">----Màu----</option>
            @foreach ($listMau as $mau)
                <option value="{{ $mau->id }}">{{ $mau->Màu }}</option>
            @endforeach
        </select><br>

        <label for="">Size</label>
        <select class="form-control" style="color: rgb(0, 255, 0)" name="size">
            <option value="">----Chọn Size----</option>
            @foreach ($listSize as $size)
                <option value="{{ $size->id }}">{{ $size->TenSize }}</option>
            @endforeach
        </select><br>
        

        <label for="">Số lượng: </label>
        <input name="soluong" style="color: rgb(0, 255, 0)" class="form-control" value=""> <br>

        <label for="">Mô tả</label>
        <textarea name="mota" style="color: rgb(0, 255, 0)" id="" class="form-control" cols="25" rows="5"></textarea> <br>

        <label for="">Hình</label>

        <input type="file" class="form-control" name="hinhanh" value=""> <br>

        <input type="submit" value="Xác nhận">
    </form>


@endsection
