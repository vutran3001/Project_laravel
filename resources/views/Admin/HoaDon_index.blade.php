@extends('app')

@section('title', 'Page Title')

@section('sidebar')
    @parent

    <form action="" role="form">
        <div class="form-group">
            <label for="">Tìm Kiếm theo ID</label>
            <input type="search" style="color: red" class="form-control" name="timkiemid" id="" placeholder="Nhập ID hóa đơn tại đây ">
        </div>

        <button type="submit" class="btn btn-primary"><i class="fas fa-search">Tìm</i></button>
    </form>
@endsection

@section('content')
    <div class="card">
      <div class="card-body">
        <h2 class="card-title"  style="text-align: center">Hóa đơn </h2>
        <div class="table-responsive " >
          <table class="table table-hover"  >
            <thead>
              <tr>
                <th style="text-align: center">ID</th>    
                <th style="text-align: center">Mã hóa đơn</th>                
                <th style="text-align: center">Ngày lập</th>
                <th style="text-align: center">Địa chỉ giao hàng</th>
                <th style="text-align: center">Sdt giao hàng</th>
                <th style="text-align: center">Tổng tiền</th>
                <th style="text-align: center">Trạng thái</th>
              </tr>
            </thead>
            <tbody>  
              @foreach ($listHoaDon as $hd)
                <tr > 
                  <td> 
                    <div  style="color: rgb(8, 255, 8);text-align: center">{{ $hd->id }}</div>
                  </td>
                  <td style="text-align: center" >
                    <a  href="{{ route('HoaDon.show',['HoaDon'=>$hd]) }}" style="color: rgb(245, 134, 139)" >
                      {{ $hd->Code }}
                    </a>
                  </td>
                  <td >
                    <div style="text-align: center;color: rgb(255, 0, 191)">{{ $hd->NgayLap }}</div>
                  </td>
                  <td>
                    <div style="text-align: center;color: rgb(0, 183, 255)">{{ $hd->DiaChiGiaoHang }}</div>
                  </td>
                  <td>
                    <div style="text-align: center;color: rgb(241, 250, 121)">{{ $hd->SDTGiaoHang }}</div>
                  </td>
                  <td>
                    <div style="text-align: center; color: rgb(0, 255, 213)" >{{ $hd->TongTien }}</div>
                  </td>
                  <td style="text-align: center">                  
                      @if ($hd->IDTrangThai == 1)
                        <a >Đang xử lý</a>
                      @elseif ($hd->IDTrangThai == 2)
                      <a >Đang giao hàng</a>
                      @elseif ($hd->IDTrangThai == 3)
                      <a >Đã giao hàng</a>
                      @elseif ($hd->IDTrangThai == 4)
                      <a >Đã hủy</a>
                      @endif                    
                  </td>  
                  <td>
                    <a href="{{ route('HoaDon.edit',['HoaDon'=>$hd]) }}" type="button" class="btn btn-light btn-fw">Sửa</a><br><br>
                  </td>
                </tr>
                @endforeach
          </table>
        </div>
      </div>
    {{-- </div> --}}


@endsection


