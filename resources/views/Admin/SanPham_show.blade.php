@extends('app')

@section('title', 'Page Title')

@section('content')

    <h1>Chi tiết sản phẩm</h1>
    @foreach ($ctSanPham as $sp)
        <form>

            <input type="hidden" name="TrangThai" value="{{ $sp->TrangThai }}">
            <label for="">Tên sản phẩm: </label>
            <div class="form-control" style="color: rgb(0, 255, 0)" name="tensp" value=""> {{ $sp->TenSanPham }}</div>
            <br>

            <label for="">Loại sản phẩm: </label>
            <div class="form-control" style="color: rgb(0, 255, 0)" name="loaisanpham" value="">
                @if ($listLoai[$sp->IdLoaiSanPham - 1]->id == $sp->IdLoaiSanPham)
                @endif{{ $listLoai[$sp->IdLoaiSanPham - 1]->TenLoaiSanPham }}
            </div> <br>

            <label for="">Giá: </label>
            <div style="color: rgb(0, 255, 0)" class="form-control" name="gia" value="">{{ $sp->Gia }}</div> <br>

            <label for="">Size: </label>
            <div class="form-control" style="color: rgb(0, 255, 0)" name="size">
                @foreach ($ctSP as $ctSP)
                    @if( $Size[$ctSP->IdSize-1]->id != $ctSP->IdSize-1  )
                      
                            {{ $Size[$ctSP->IdSize-1]->TenSize }}, 
                        
                    @endif
                @endforeach
               
            </div><br>

            <label for="">Màu: </label>
            <div class="form-control" style="color: rgb(0, 255, 0)" name="mau">

                @foreach ($ctSP2 as $ctSP)
                    @if ($Mau[$ctSP->IdMau - 1]->id == $ctSP->IdMau - 1)
                    @endif
                    
                    {{ $Mau[$ctSP->IdMau - 1]->Màu }},
                @endforeach

            </div><br>
            <label for="">Số lượng: </label>
            <div style="color: rgb(0, 255, 0)" name="soluong" class="form-control" value="">{{ $sp->SoLuong }}</div> <br>

            <label for="">Nhà cung cấp: </label>
            <div class="form-control" style="color: rgb(0, 255, 0)" name="loaisanpham" value="">
                @if ($listNhaCungCap[$sp->IdNhaCung - 1]->id == $sp->IdNhaCung)
                @endif{{ $listNhaCungCap[$sp->IdNhaCung - 1]->TenNhaCungCap }}
            </div> <br>

            <label for="">Mô tả</label>
            <div name="mota" id="" class="form-control" style="color: rgb(0, 255, 0)" cols="25" rows="5">
                {{ $sp->MoTa }}</div> <br>

            <label for="">Hình</label>
            <img style="width: 100px;max-height: 100px;object-fit: contain" src="{{ $sp->HinhAnh }}"><br>

            <a href="{{ route('SanPham.edit', ['SanPham' => $SanPham]) }}" type="button"
                class="btn btn-light btn-fw">Sửa</a><br><br>

            <form method="POST" action="{{ route('SanPham.destroy', ['SanPham' => $SanPham]) }}">
                @csrf
                @method('DELETE')

                <input  type="hidden" name="TrangThai" value="0">
                <input class="btn btn-light btn-fw" type="submit" value="Xóa">
            </form>
    @endforeach

@endsection
