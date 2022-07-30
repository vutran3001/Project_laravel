@extends('app')

@section('title', 'Page Title')


@section('content')

      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Tài khoản</h4>
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th> # </th>
                  <th> Email </th>
                  <th> Password </th>
                  <th> Họ tên </th>
                  <th> Giới tính </th>
                  <th> Ngày sinh </th>
                  <th> Địa chỉ </th>
                  <th> SDT </th>
                  <th> Quyền </th>
                  <th> Trạng thái </th>
                </tr>
              </thead>
              <tbody>
                @foreach ($AccDe as $acc )
                 <tr>
                    <td><div>{{ $acc->id }}<div></td>
                    <td><div>{{ $acc->email }}<div></td>
                    <td><div>{{ $acc->password }}<div></td>
                    <td><div>{{ $acc->name }}<div></td>
                      <td>
                        @if ($acc->GioiTinh=='Nam')
                          <a>Nam</a>
                        @endif
                        @if ($acc->GioiTinh=='Nữ')
                          <a>Nữ</a>
                        @endif
                      </td>
                    <td><div>{{ $acc->NgaySinh }}<div></td>
                    <td><div>{{ $acc->DiaChi }}<div></td>
                    <td><div>{{ $acc->SDT }}<div></td>
                    <td>
                      @if ($acc->Quyen==1)
                        <a>Admin</a>
                      @endif
                      @if ($acc->Quyen!=1)
                        <a>User</a>
                      @endif
                    </td>
                    <td>
                      @if ($acc->TrangThai==1)
                        <a>Hoạt động</a>
                      @endif
                      @if ($acc->TrangThai!=1)
                        <a>Dừng hoạt động</a>
                      @endif
                    </td>
                 </tr>
                @endforeach               
              </tbody>
            </table>
          </div>
          <br>
          <a href="{{ route('User.index') }}"><button class="btn btn-dark">Quay lại</button></a>
        </div>       
      </div>
@endsection