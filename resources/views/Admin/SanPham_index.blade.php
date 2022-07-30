@extends('app')

@section('title', 'Page Title')

@section('sidebar')
    @parent
    <form action="" role="form">
        <div class="form-group">
            <label for="">Tìm Kiếm theo ID</label>
            <input type="search" style="color: red" class="form-control" name="timkiemid" id="" placeholder="Nhập ID loại sản phẩm tại đây ">
        </div>
        <div class="form-group">
            <label for="">Tìm Kiếm theo tên</label>
            <input type="search" style="color: red" class="form-control" name="timkiemten" id="" placeholder="Nhập TÊN loại sản phẩm tại đây ">
        </div>
        <button type="submit" class="btn btn-primary"><i class="fas fa-search">Tìm</i></button>
    </form>
@endsection

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
                            <th style="text-align: center">Số lượng</th>
                            <th style="text-align: center">Trạng thái</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($listSanPham as $sp)
                          @if($sp->TrangThai==1)
                            
                          
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
                                <td>
                                    <div style="text-align: center;color: rgb(255, 255, 255)">{{ $sp->SoLuong }}</div>
                                </td>
                                
                                <td style="text-align: center">
                                    @if ($sp->TrangThai == 1)
                                        <a>Còn Hàng</a>
                                    @endif
                                </td>
                            </tr>
                            @endif
                        @endforeach
                </table>
            </div>

        </div>
    </div>


@endsection
