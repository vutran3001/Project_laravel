@extends('app')

@section('title', 'Page Title')

@section('content')

    <h1>Cập nhật sản phẩm</h1>
    @foreach ($suaSanPham as $sp)
        <form method="post" action="{{ route('SanPham.update', ['SanPham' => $sp]) }} " enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <input type="hidden" name="idsanpham" value="{{ $sp->id }}">
            <input type="hidden" name="idnhacungcap" value="{{ $sp->IdNhaCung }}">
            {{-- <input type="hidden" name="idloaisanpham" value="{{ $sp->IdLoaiSanPham  }}"> --}}
            <input type="hidden" name="TrangThai" value="{{ $sp->TrangThai }}">

            <label for="">Tên sản phẩm: </label><input class="form-control" style="color: rgb(0, 255, 0)" name="tensp"
                value="{{ $sp->TenSanPham }}"> <br>

            {{-- <label for="">Loại sản phẩm: </label>
    <select class="form-control" style="color: rgb(0, 255, 0)" name="idloaisanpham">
        <option value="{{ $sp->IdLoaiSanPham }}">----Chọn loại----</option>

        @foreach ($listLoai as $loai)
        @if ($loai->TrangThai == 1)
        <option value="{{ $loai->id }}" @if ($loai->id == $sp->IdLoaiSanPham)
            @endif>{{ $loai->TenLoaiSanPham }}</option>
        @endif
        @endforeach
    </select><br> --}}


            <label for="">Giá: </label><input style="color: rgb(0, 255, 0)" class="form-control" name="gia"
                value="{{ $sp->Gia }}"> <br>


            {{-- <label for="">Size: </label>
   
    <select class="form-control" style="color: rgb(0, 255, 0)" name="size">
         
        @foreach ($ctSP as $ct)
        <option value="{{ $listSize[$ct->IdSize - 1]->id }}">
            @if ($listSize[$ct->IdSize - 1]->id == $ct->IdSize)

            @endif{{ $listSize[$ct->IdSize - 1]->TenSize }}
        </option>
        @endforeach
    </select><br>
    
    <label for="">Màu: </label>
    <select class="form-control" style="color: rgb(0, 255, 0)" name="mau">
        @foreach ($ctSP as $ct)
        <option value="{{ $listMau[$ct->IdMau - 1]->id }}">
            @if ($listMau[$ct->IdMau - 1]->id == $ct->IdMau)

            @endif{{ $listMau[$ct->IdMau - 1]->Màu }}
        </option>
        @endforeach
    </select><br> --}}

            {{-- <label for="">Size: </label><input style="color: rgb(0, 255, 0)" name="size" class="form-control"
        value="{{ $sp->Size }}"> <br>

    <label for="">Màu: </label><input style="color: rgb(0, 255, 0)" name="mau" class="form-control" value="{{ $sp->Mau }}"> <br> --}}

            <label for="">Số lượng: </label><input style="color: rgb(0, 255, 0)" name="soluong" class="form-control"
                value="{{ $sp->SoLuong }}"> <br>
            <label for="">Mô tả</label>
            <textarea name="mota" id="" class="form-control" style="color: rgb(0, 255, 0)" cols="25"
                rows="5">{{ $sp->MoTa }}</textarea> <br>

            <label for="">Hình</label>
            <img style="width: 100px;max-height: 100px;object-fit: contain" src="{{ $sp->HinhAnh }}"><br>
            <input type="file" class="form-control" name="hinhanh" value="{{ $sp->HinhAnh }}"><br>

            <input type="submit" value="Xác nhận">
        </form>
    @endforeach

@endsection
