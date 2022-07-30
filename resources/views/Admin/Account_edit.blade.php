@extends('app')

@section('title', 'Page Title')


@section('content')
@foreach ( $editAcc as $acc )
<div class="content-wrapper">
  <div class="row">
    <div class="col-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Cập nhật thông tin</h4>
          <form method="post" class="forms-sample" action="{{ route('User.update',['User'=>$acc]) }}"  enctype="multipart/form-data" >
            @csrf
            @method('PATCH')
            
            <div class="form-group">
              <label for="exampleInputEmail3">Email</label>
              <input type="email" class="form-control" name="email" value="{{ $acc->email }}">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword4">Password</label>
              <input type="text" class="form-control" name="password" value="{{ $acc->password }}">
            </div>
            <div class="form-group">
              <label for="exampleInputName1">Họ tên</label>
              <input type="text" class="form-control" name="hoten"  value="{{ $acc->name }}">
            </div>
            <div class="form-group">
              <label for="exampleSelectGender">Giới tính</label>
              <div class="col-sm-4">
                <div class="form-check">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input"  name="gioitinh"  value="Nam" 
                    @if ($acc->GioiTinh=='Nam')
                     checked
                    @endif
                    > Nam 
                  </label>
                </div>
              </div>
              <div class="col-sm-5">
                <div class="form-check">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="gioitinh" value="Nữ"
                    @if ($acc->GioiTinh=='Nữ')
                      checked
                    @endif
                    > Nữ </label>
                </div>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword4">Ngày sinh</label>
              <input type="date" class="form-control" name="ngaysinh" value="{{ $acc->NgaySinh }}">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword4">Địa chỉ</label>
              <input type="text" class="form-control" name="diachi" value="{{ $acc->DiaChi }}">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword4">SDT</label>
              <input type="text" class="form-control" name="SDT" value="{{ $acc->SDT }}">
            </div>
            
            <div class="form-group">
              <label for="exampleSelectGender">Quyền</label>
              <div class="col-sm-4">
                <div class="form-check">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input"  name="quyen"  value="1" 
                    @if ($acc->Quyen==1)
                     checked
                    @endif
                    > Admin </label>
                </div>
              </div>
              <div class="col-sm-5">
                <div class="form-check">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="quyen" value="0"
                    @if ($acc->Quyen!=1)
                      checked
                    @endif
                    > User </label>
                </div>
            </div>
            <div class="form-group">
              <label for="exampleSelectGender">Trạng thái</label>
              <div class="col-sm-4">
                <div class="form-check">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input"  name="trangthai"  value="1" 
                    @if ($acc->TrangThai==1)
                     checked
                    @endif
                    > Hoạt động </label>
                </div>
              </div>
              <div class="col-sm-5">
                <div class="form-check">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="trangthai" value="0"
                    @if ($acc->TrangThai!=1)
                      checked
                    @endif
                    > Dừng hoạt động </label>
                </div>
              </div>
            <button type="submit" class="btn btn-primary mr-2">Cập nhật</button>
            <a href="{{ route('User.index') }}"><button class="btn btn-dark">Quay lại</button></a>         
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- content-wrapper ends -->
@endforeach

@endsection