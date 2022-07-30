@extends('app')

@section('title', 'Page Title')

@section('sidebar')
    @parent

    <form action="" role="form">
        <div class="form-group">
            <label for="">Tìm Kiếm theo Code</label>
            <input type="search" style="color: red" class="form-control" name="timkiemcode" id="" placeholder="Nhập Code tại đây ">
        </div>

        <button type="submit" class="btn btn-primary"><i class="fas fa-search">Tìm</i></button>
    </form>
@endsection
@section('content')
       <div class="card">
         <div class="card-body">
           <h4 class="card-title">Mã giảm giá</h4>
           <div class="table-responsive">
             <table class="table table-bordered">
               <thead>
                 <tr>
                   <th> # </th>
                   <th> Code </th>
                   <th> Ngày bắt đầu </th>
                   <th> Ngày kết thúc </th>
                   <th> Trạng thái </th>
                   <th>  </th>
                 </tr>
               </thead>
               <tbody>
                @foreach ($listMGG as $mgg )
                  <tr>
                     <td> <a>{{ $mgg->id }} </a> </td>
                     <td> <a>{{ $mgg->Code }} </a> </td>
                     <td> <a>{{ $mgg->NgayBatDau }} </a></td>
                     <td> <a>{{ $mgg->NgayKetThuc }} </a></td>
                     <td> 
                        @if ($mgg->TrangThai==1)
                           <a>Hoạt động</a>
                        @endif
                        @if ($mgg->TrangThai!=1)
                           <a>Dừng hoạt động</a>
                        @endif
                     </td>
                     {{-- <td> <a href="{{ route('User.show',['User'=>$acc]) }}"><button type="button" class="btn btn-primary btn-icon-text">Xem</button></a></td> --}}
                     <td> <a href="{{ route('MaGiamGia.edit',['MaGiamGium'=>$mgg]) }}"><button type="button" class="btn btn-success btn-icon-text">Sửa</button></a></td>
                    </tr>
                  @endforeach               
               </tbody>
             </table>
           </div>
         </div>
       </div>
@endsection