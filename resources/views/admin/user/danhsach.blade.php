@extends('admin.layout.master')

@section('tieude')
    danh sach the loai
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Category</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    @if (session('thongbao'))
                        <div class="alert alert-success">
                                {{session('thongbao')}}
                        </div>
                    @endif
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Name</th>
                                <th>email</th>
                                <th>level</th>
                                <th>Chỉnh sửa</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>STT</th>
                                <th>Name</th>
                                <th>email</th>
                                <th>level</th>
                                <th>Chỉnh sửa</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($user as $u)
                                <tr>
                                    <td>{{$u->id}}</td>
                                    <td>{{$u->name}}</td>
                                    <td>{{$u->email}}</td>
                                    <td>{{$u->quyen}}
                                        @if ($u->quyen==1)
                                            {{"admin"}}
                                        @else
                                            {{"thường"}}
                                        @endif       
                                    </td>
                                    <td>
                                        <button class="btn btn-primary edit" data-toggle="modal" data-target="#edit" type="button"><a href="admin/user/sua/{{$u->id}}"><i class="fas fa-edit" style="color:white"></i></a></button>
                                        <button class="btn btn-danger delete" data-toggle="modal" data-target="#delete" type="button"><a onclick="return xacnhanxoa('bạn có muốn xóa')" href="admin/user/xoa/{{$u->id}}"><i class="fas fa-trash-alt" style="color:white"></i></a></button>
                                    </td>
                                </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                    <div class="pull-right">{{ $user->links() }}</div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection

@section('script')
 <script>
    function xacnhanxoa (msg){
        if(window.confirm(msg)){
            return true;
        }
        return false;
    }
 </script>
@endsection