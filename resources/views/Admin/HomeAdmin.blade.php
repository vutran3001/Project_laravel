@extends('app')

@section('title', 'Page Title')


@section('content')
    {{-- Xuất tất cả các model mỗi cái xuất 5 item --}}
    <div class="row">
        {{-- Loại sản phẩm --}}
        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Loại Sản phẩm </h4>                    
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Tên</th>
                                    <th>Trạng thái</th>
                                </tr>
                            </thead>
                            <tbody>
                                @for ($i = 1; $i <= 1; $i++)
                                    <tr>
                                        <td>
                                            <a
                                                href="{{ route('LoaiSanPham.show', ['LoaiSanPham' => $listLoai[$i - 1]]) }}">
                                                {{ $listLoai[$i - 1]->TenLoaiSanPham }}
                                            </a>
                                        </td>
                                        <td>
                                            @if ($listLoai[$i - 1]->TrangThai == 1)
                                                <a class="text-info">Còn Tác dụng</a>
                                            @endif
                                            @if ($listLoai[$i - 1]->TrangThai != 1)
                                                <a class="text-danger">Hết Tác dụng</a>
                                            @endif
                                        </td>
                                    </tr>
                                @endfor
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {{-- Sản phẩm --}}
        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Sản phẩm </h4>

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Tên</th>
                                    <th>Trạng thái</th>
                                </tr>
                            </thead>
                            <tbody>
                                @for ($i = 1; $i <= 1; $i++)
                                    <tr>
                                        <td>
                                            <a href="{{ route('LoaiSanPham.show', ['LoaiSanPham' => $listSP[$i - 1]]) }}">
                                                {{ $listSP[$i - 1]->TenSanPham }}
                                            </a>
                                        </td>
                                        <td>
                                            @if ($listSP[$i - 1]->TrangThai == 1)
                                                <a class="text-info">Còn Hàng</a>
                                            @endif
                                            @if ($listSP[$i - 1]->TrangThai != 1)
                                                <a class="text-danger">Hết Hàng</a>
                                            @endif
                                        </td>
                                    </tr>
                                @endfor
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {{--  Nhà cung cấp  --}}
        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Nhà cung cấp </h4>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Tên</th>
                                    <th>Trạng thái</th>
                                </tr>
                            </thead>
                            <tbody>
                                @for ($i = 1; $i <= 1; $i++)
                                    <tr>
                                        <td>
                                            <a href="{{ route('NhaCungCap.show', ['NhaCungCap' => $listNhaCungCap[$i - 1]]) }}">
                                                {{ $listNhaCungCap[$i - 1]->TenNhaCungCap }}
                                            </a>
                                        </td>
                                        <td>
                                            @if ($listNhaCungCap[$i - 1]->TrangThai == 1)
                                                <a class="text-info">Còn hợp tác</a>
                                            @endif
                                            @if ($listNhaCungCap[$i - 1]->TrangThai != 1)
                                                <a class="text-danger">Dừng hợp tác</a>
                                            @endif
                                        </td>
                                    </tr>
                                @endfor
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
