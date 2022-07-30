@extends('app')

@section('title', 'Page Title')


@section('content')

    <div class="card">
        <div class="card-body">
            <h2 class="card-title" style="text-align: center">Chi Tiết</h2>

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="text-align: center">ID</th>
                            <th style="text-align: center">Tên</th>
                            <th style="text-align: center">Địa chỉ</th>
                            <th style="text-align: center">Số điện thoại</th>
                            <th style="text-align: center">Trạng thái</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ctNhaCungCap as $ct)
                            <tr>
                                <td>
                                    <div style="color: rgb(8, 255, 8);text-align: center">{{ $ct->id }}</div>
                                </td>
                                <td style="text-align: center">
                                    <a href="{{ route('NhaCungCap.show', ['NhaCungCap' => $ct]) }} "
                                        style="color: rgb(245, 134, 139)">
                                        {{ $ct->TenNhaCungCap }}
                                    </a>
                                </td>
                                <td>
                                    <div style="text-align: center;color: rgb(255, 0, 191)">{{ $ct->DiaChi }}</div>
                                </td>
                                <td>
                                    <div style="text-align: center;color: rgb(0, 183, 255)">{{ $ct->SDT }}</div>
                                </td>
                                <td style="text-align: center">
                                    @if ($ct->TrangThai == 1)
                                        <a>Còn Hợp tác</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                </table>
            </div>
            <br>
            <a href="{{ route('NhaCungCap.edit', ['NhaCungCap' => $NhaCungCap]) }}" type="button"
                class="btn btn-light btn-fw">Sửa</a><br><br>

            <form method="POST" action="{{ route('NhaCungCap.destroy', ['NhaCungCap' => $NhaCungCap]) }}">
                @csrf
                @method('DELETE')
                <input type="hidden" name="TrangThai" value="0">
                <input class="btn btn-light btn-fw" type="submit" value="Xóa">
            </form>
        </div>
    </div>
@endsection
