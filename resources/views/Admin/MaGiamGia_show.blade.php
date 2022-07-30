@extends('app')

@section('title', 'Page Title')
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
                 </tr>
               </thead>
               <tbody>
                @foreach ($showMGG as $mgg )
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
                    </tr>
                  @endforeach               
               </tbody>
             </table>
           </div>
         </div>
       </div>
@endsection