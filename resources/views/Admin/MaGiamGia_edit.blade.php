@extends('app')

@section('title', 'Page Title')


@section('content')
@foreach ( $suaMGG as $mgg )
<div class="content-wrapper">
  <div class="row">
    <div class="col-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Cập nhật mã giảm giá</h4>
          <form method="post" class="forms-sample" action="{{ route('MaGiamGia.update',['MaGiamGium'=>$mgg]) }}"  enctype="multipart/form-data" >
            @csrf
            @method('PATCH')
            
            <div class="form-group">
              <label for="exampleInputName1">Code</label>
              <input type="text" class="form-control" name="code"  value="{{ $mgg->Code }}">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword4">Ngày bắt đầu</label>
              <input type="date" class="form-control" name="ngaybatdau" value="{{ $mgg->NgayBatDau }}">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword4">Ngày kết thúc</label>
              <input type="date" class="form-control" name="ngayketthuc" value="{{ $mgg->NgayKetThuc }}">
            </div>          
            <div class="form-group">
              <label for="exampleSelectGender">Trạng thái</label>
              <div class="col-sm-4">
                <div class="form-check">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input"  name="trangthai"  value="1" 
                    @if ($mgg->TrangThai==1)
                     checked
                    @endif
                    > Hoạt động </label>
                </div>
              </div>
              <div class="col-sm-5">
                <div class="form-check">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="trangthai" value="0"
                    @if ($mgg->TrangThai!=1)
                      checked
                    @endif
                    > Dừng hoạt động </label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mr-2">Cập nhật</button>
            <button class="btn btn-dark">Quay lại</button>         
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- content-wrapper ends -->
@endforeach

@endsection