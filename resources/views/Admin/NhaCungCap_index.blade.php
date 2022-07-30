@extends('app')

@section('title', 'Page Title')

@section('sidebar')
    @parent

    {{-- <H5>Loại sản phảm</H5> --}}
    <form action="" role="form">
        <div class="form-group">
            <label for="">Tìm Kiếm theo ID</label>
            <input type="search" style="color: red" class="form-control" name="timkiemid" id=""
                placeholder="Nhập ID nhà cung cấp tại đây ">
        </div>
        <div class="form-group">
            <label for="">Tìm Kiếm theo tên</label>
            <input type="search" style="color: red" class="form-control" name="timkiemten" id=""
                placeholder="Nhập TÊN nhà cung cấp tại đây ">
        </div>



        <button type="submit" class="btn btn-primary"><i class="fas fa-search">Tìm</i></button>
    </form>
@endsection

@section('content')

    {{-- <div class="col-lg-6 grid-margin stretch-card"> --}}
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Nhà Cung Cấp </h4>
            {{-- <p class="card-description"> Add class <code>.table</code>
      </p> --}}
            <a href="{{ route('NhaCungCap.create') }}" type="button" class="btn btn-light btn-fw">Thêm Nhà Cung Cắp </a><br><br>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Tên</th>
                            <th>Địa chỉ</th>
                            <th>Số điện thoại</th>
                            <th>Trạng thái</th>

                        </tr>
                    </thead>
                    {{-- <tbody> @for ($i = 1; $i <= 5; $i++) --}}
                    <tbody>
                        @foreach ($listNhaCungCap as $nha)
                            @if ($nha->TrangThai == 1)
                                <tr>
                                    <td>
                                        <a href="{{ route('NhaCungCap.show', ['NhaCungCap' => $nha]) }}">
                                            {{ $nha->TenNhaCungCap }}
                                        </a>
                                    </td>
                                    <td>
                                        <a>
                                            {{ $nha->DiaChi }}
                                        </a>
                                    </td>
                                    <td>
                                        <a>
                                            {{ $nha->SDT }}
                                        </a>
                                    </td>
                                    <td>

                                        @if ($nha->TrangThai == 1)
                                            <a>Còn Hợp Tác</a>
                                        @endif

                                    </td>
                                </tr>

                            @endif
                        @endforeach

                        {{-- @endfor --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- </div> --}}


@endsection
