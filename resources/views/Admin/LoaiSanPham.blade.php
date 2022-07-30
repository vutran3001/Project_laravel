@extends('app')

@section('title', 'Page Title')


@section('content')

    {{-- Loại sản phẩm --}}
    {{-- <div class="col-lg-6 grid-margin stretch-card"> --}}
    <div class="card">
        <div class="card-body">
            <h2 class="card-title" style="text-align: center">Sản phẩm </h2>
            {{-- Không hiểu tại sao ko gọi route đc nên gọi nguyên cái link --}}
            <a href="http://127.0.0.1:8000/ThemSanPham" type="button" class="btn btn-light btn-fw">Thêm Sản Phẩm</a><br><br>
            {{-- <p class="card-description"> Add class <code>.table</code>
        </p> --}}
            <div class="table-responsive ">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th style="text-align: center">ID</th>
                            <th style="text-align: center">Tên</th>
                            <th style="text-align: center">Giá</th>
                            {{-- <th style="text-align: center">Mô tả</th> --}}
                            <th style="text-align: center">Size</th>
                            <th style="text-align: center">Màu</th>
                            <th style="text-align: center">Số lượng</th>
                            {{-- <th style="text-align: center">ID loại sản phẩm</th> --}}
                            {{-- <th style="text-align: center">ID nhà cung cấp</th> --}}
                            {{-- <th style="text-align: center">Hình ảnh</th> --}}
                            <th style="text-align: center">Trạng thái</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($listSanPham as $sp)

                            <tr>
                                <td>
                                    <div style="color: rgb(8, 255, 8);text-align: center">{{ $sp->id }}</div>
                                </td>
                                <td style="text-align: center">
                                    <a href="{{ route('SanPham.show', ['SanPham' => $sp]) }}"
                                        style="color: rgb(245, 134, 139)">
                                        {{ $sp->TenSanPham }}
                                    </a>
                                </td>
                                <td>
                                    <div style="text-align: center;color: rgb(255, 0, 191)">{{ $sp->Gia }}</div>
                                </td>
                                {{-- <td>
                    <div style="text-align: center;color: rgb(0, 183, 255)">{{ $sp->MoTa }}</div>
                  </td> --}}
                                <td>
                                    <div style="text-align: center;color: rgb(151, 132, 255)">{{ $sp->Size }}</div>
                                </td>
                                <td>
                                    <div style="text-align: center;color: rgb(241, 250, 121)">{{ $sp->Mau }}</div>
                                </td>
                                <td>
                                    <div style="text-align: center;color: rgb(255, 255, 255)">{{ $sp->SoLuong }}</div>
                                </td>
                                {{-- <td>
                    <div style="text-align: center; color: rgb(0, 255, 213)" >{{ $sp->IdLoaiSanPham }}</div>
                  </td> --}}
                                {{-- <td>
                    <div style="text-align: center;color: rgb(134, 119, 221)">{{ $sp->IdNhaCung }}</div>
                  </td> --}}
                                {{-- <td>
                    <div style="text-align: center;color: rgb(87, 252, 128)">{{ $sp->HinhAnh }}</div>
                  </td> --}}
                                <td style="text-align: center">
                                    @if ($sp->TrangThai == 1)
                                        <a>Còn Hàng</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                </table>
            </div>
<br><br>
            <a href="{{ route('LoaiSanPham.edit', ['LoaiSanPham' => $loaiSanPham]) }}" type="button"
                class="btn btn-light btn-fw">Sửa Loại Sản Phẩm</a>
            
                <form method="post" action="{{ route('LoaiSanPham.destroy', ['LoaiSanPham' => $loaiSanPham]) }} "
                    enctype="multipart/form-data">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" class="form-control" name="tenloaisp" value="{{ $loaiSanPham->TenLoaiSanPham}}"><br>
                    <input type="hidden" class="form-control" name="TrangThai" value="0"><br>
                    
                    <input type="submit" value="Xóa Loại Sản Phẩm">
                </form>
            <br><br>
            {{--  <a href="{{ route('LoaiSanPham.destroy', ['LoaiSanPham' => $loaiSanPham]) }}" type="button"
                class="btn btn-light btn-fw">Xóa Loại Sản Phẩm</a><br><br>  --}}
        </div>
    </div>


@endsection
