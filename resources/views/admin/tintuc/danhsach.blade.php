@extends('admin.layout.master')

@section('tieude')
    Tin Tức
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tin Tức</h6>
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
                                <th>tiêu đề</th>
                                <th>tóm tắt</th>
                                <th>thể loại</th>
                                <th>loại tin</th>
                                <th>số lần xem</th>
                                <th>nổi bật</th>
                                <th>Chỉnh sửa</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>STT</th>
                                <th>tiêu đề</th>
                                <th>tóm tắt</th>
                                <th>thể loại</th>
                                <th>loại tin</th>
                                <th>số lần xem</th>
                                <th>nổi bật</th>
                                <th>Chỉnh sửa</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($tintuc as $tt)
                                <tr>
                                    <td>{{$tt->id}}</td>
                                    <td>
                                       <p>{{$tt->TieuDe}}</p> 
                                       <img width="100px" src="upload/tintuc/{{$tt->Hinh}}" alt="">
                                    </td>
                                    <td>{{$tt->TomTat}}</td>
                                    <td>{{$tt->loaitin->theloai->Ten}}</td>
                                    <td>{{$tt->loaitin->Ten}}</td>
                                    <td>{{$tt->SoLuotXem}}</td>
                                    <td>
                                        @if ($tt->NoiBat==0)
                                            {{'không'}}
                                        @else
                                            {{'có'}}
                                        @endif
                                    </td>>
                                    <td>
                                        <button class="btn btn-primary edit" title="{{"sửa ".$tt->TieuDe}}" data-toggle="modal" data-target="#edit" type="button"><a href="admin/tintuc/sua/{{$tt->id}}"><i class="fas fa-edit" style="color:white"></i></a></button>
                                        <button class="btn btn-danger delete" title="{{"xóa ".$tt->TieuDe}}" data-toggle="modal" data-target="#delete" type="button"><a onclick="return xacnhanxoa('bạn có muốn xóa')" href="admin/tintuc/xoa/{{$tt->id}}"><i class="fas fa-trash-alt" style="color:white"></i></a></button>
                                    </td>
                                </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                    <div class="pull-right">{{ $tintuc->links() }}</div>
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
