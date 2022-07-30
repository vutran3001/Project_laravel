@extends('app')

@section('title', 'Page Title')


@section('content')
   @foreach ($suaHoaDon as $hd)
        <form method="post" action="{{ route('HoaDon.update', ['HoaDon' => $hd]) }} " enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <input type="hidden" name="code" value="{{ $hd->Code }}">
            <input type="hidden" name="ngaylap" value="{{ $hd->NgayLap }}">
            <input type="hidden" name="diachigiaohang" value="{{ $hd->DiaChiGiaoHang }}">
            <input type="hidden" name="sdt" value="{{ $hd->SDTGiaoHang }}">
            <input type="hidden" name="magiamgia" value="{{ $hd->IdMaGiamGia }}">
            <input type="hidden" name="tongtien" value="{{ $hd->TongTien }}">
            {{-- <input type="hidden" name="idloaisanpham" value="{{ $hd->IdLoaiSanPham  }}"> --}}
            <input type="hidden" name="TrangThai" value="{{ $hd->TrangThai }}">
            <label for="">Loại sản phẩm: </label>
            <select class="form-control" name="TrangThai" >
                <option value="{{ $hd->HoaDon }}">----Chọn trạng thái----</option>
                @foreach ($listTrangThai as $tt)
                    <option value="{{ $tt->id }}" @if ($tt->id == $hd->TrangThai)
                @endif>{{ $tt->TrangThai }}</option>
                @endforeach
            </select><br>

            <input type="submit" value="Xác nhận">
        </form>
    @endforeach
 @endsection