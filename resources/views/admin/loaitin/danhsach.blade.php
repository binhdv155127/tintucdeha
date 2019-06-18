@extends('admin.layout.master')

@section('tieude')
    danh sach the loai
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">loại tin</h6>
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
                                <th>Tên loại tin</th>
                                <th>Tên không dấu</th>
                                <th>thể loại</th>
                                <th>Chỉnh sửa</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>STT</th>
                                <th>Tên loại tin</th>
                                <th>Tên không dấu</th>
                                <th>thể loại</th>
                                <th>Chỉnh sửa</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($loaitin as $value)
                               <tr>
                                    <td>{{$value->id}}</td>
                                    <td>{{$value->Ten}}</td>
                                    <td>{{$value->TenKhongDau}}</td>
                                    <td>{{$value->theloai->Ten}}</td>
                                    <td>
                                        <button class="btn btn-primary edit" title="{{"sửa ".$value->Ten}}" data-toggle="modal" data-target="#edit" type="button"><a href="admin/loaitin/sua/{{$value->id}}"><i class="fas fa-edit" style="color:white"></i></a></button>
                                        <button class="btn btn-danger delete" title="{{"xóa ".$value->Ten}}" data-toggle="modal" data-target="#delete" type="button"><a onclick="return xacnhanxoa('bạn có muốn xóa')" href="admin/loaitin/xoa/{{$value->id}}"><i class="fas fa-trash-alt" style="color:white"></i></a></button>
                                    </td>
                              </tr> 
                            @endforeach
                            
                        </tbody>
                    </table>
                    <div class="pull-right">{{ $loaitin->links() }}</div>
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