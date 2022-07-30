@extends('app')

@section('title', 'Page Title')
@section('sidebar')
    @parent

    <form action="" role="form">
        <div class="form-group">
            <label for="">Tìm Kiếm theo email</label>
            <input type="search" style="color: red" class="form-control" name="timkiemEmail" id="" placeholder="Nhập email tại đây ">
        </div>
        <div class="form-group">
          <label for="">Tìm Kiếm theo họ tên</label>
          <input type="search" style="color: red" class="form-control" name="timkiemTen" id="" placeholder="Nhập họ tên tại đây ">
        </div>
        <button type="submit" class="btn btn-primary"><i class="fas fa-search">Tìm</i></button>
    </form>
@endsection
@section('content')
  
       <div class="card">
         <div class="card-body">
           <h4 class="card-title">Tài khoản</h4>
           <p class="card-description"> Tài khoản <code>.Hoạt động</code>
           <div class="table-responsive">
             <table class="table table-bordered">
               <thead>
                 <tr>
                   <th> # </th>
                   <th> Email </th>
                   <th> Họ tên </th>
                   <th> Quyền </th>
                   <th> Trạng thái </th>
                   <th>  </th>
                   <th>  </th>
                 </tr>
               </thead>
               <tbody>
                @foreach ($lstAccount as $acc )
                  <tr>
                     <td> <a>{{ $acc->id }} </a> </td>
                     <td> <a>{{ $acc->email }} </a> </td>
                     <td> <a>{{ $acc->name }} </a></td>
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
                     <td> <a href="{{ route('User.show',['User'=>$acc]) }}"><button type="button" class="btn btn-primary btn-icon-text">Xem</button></a></td>
                     <td> <a href="{{ route('User.edit',['User'=>$acc]) }}"><button type="button" class="btn btn-success btn-icon-text">Sửa</button></a></td>
                    </tr>
                  @endforeach               
               </tbody>
             </table>
           </div>
         </div>
       </div>
    
      
@endsection