@extends('app')

@section('title', 'Page Title')

@section('sidebar')
    @parent

    
@endsection

@section('content')



    {{-- <div class="col-lg-12 grid-margin stretch-card"> --}}
        <div class="card">
          <div class="card-body">
            <h2 class="card-title" style="text-align: center">Hóa Đơn</h2>
           
            <div class="table-responsive">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th style="text-align: center">ID</th>                
                <th style="text-align: center">Mã hóa đơn</th>
                <th style="text-align: center">Ngày lập</th>
                <th style="text-align: center">Địa chỉ giao hàng</th>
                <th style="text-align: center">Sdt giao hàng</th>
                <th style="text-align: center">Mã giảm giá</th>
                <th style="text-align: center">Sản phẩm</th>
                <th style="text-align: center">Số Lượng</th>
                <th style="text-align: center">Tổng tiền</th>
                <th style="text-align: center">Trạng thái</th>

                
                  </tr>
                </thead>
                <tbody>
                    @foreach ($lstHoaDon as $hd)
              
                    <tr> 
                      <td> 
                        <div style="color: rgb(8, 255, 8);text-align: center">{{ $hd->id }}</div>
                      </td>

                      <td style="text-align: center">
                        <a href="{{ route('HoaDon.show',['HoaDon'=>$hd]) }} " style="color: rgb(245, 134, 139)" >
                          {{ $hd->Code }}
                        </a>
                      </td>

                      <td>
                        <div style="text-align: center;color: rgb(255, 0, 191)">{{ $hd->NgayLap }}</div>
                      </td>

                      <td>
                        <div style="text-align: center;color: rgb(0, 183, 255)">{{ $hd->DiaChiGiaoHang }}</div>
                      </td>

                      <td>
                        <div style="text-align: center;color: rgb(151, 132, 255)">{{ $hd->SDTGiaoHang }}</div>
                      </td>

                      <td>
                        <div style="text-align: center;color: rgb(241, 250, 121)">
                          @if ($mgg[$hd->IdMaGiamGia-1]->id==$hd->IdMaGiamGia)
                            
                          @endif{{ $mgg[$hd->IdMaGiamGia-1]->Code }}
                        </div>
                      </td>

                     @foreach ($ctHoaDon as $ct)
                     <td>
                      <div style="text-align: center;color: rgb(241, 250, 121)">
                        @if ($sp[$ct->IdSanPham-1]->id==$ct->IdSanPham)
                          
                        @endif{{ $sp[$ct->IdSanPham-1]->TenSanPham }}
                      </div>
                    </td>

                    <td>
                      <div style="text-align: center;color: rgb(241, 250, 121)">{{ $ct->SoLuong }}</div>
                    </td>
                     @endforeach
                      <td>
                        <div style="text-align: center;color: rgb(255, 255, 255)">{{ $hd->TongTien }}</div>
                      </td>
                      
                      <td style="text-align: center">                  
                        @if ($hd->IDTrangThai == 1)
                          <a >Đơn hàng mới</a>
                        @elseif ($hd->IDTrangThai == 2)
                          <a >Đang giao hàng</a>
                        @elseif ($hd->IDTrangThai == 3)
                          <a >Đã nhận hàng</a>
                        @elseif ($hd->IDTrangThai == 4)
                          <a >Đã hủy hàng</a>
                        @endif                    
                       </td>  
                       
                    </tr>
                    @endforeach
                    
              </table>
            </div>
            <br>
            <a href="{{ route('HoaDon.index') }}"><button class="btn btn-dark">Quay lại</button></a>

          </div>
          
        </div>
      {{-- </div> --}} 
@endsection


