@extends('admin.layout.master')

@section('tieude')
    them the loai
@endsection


@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Category</h6>
                </div>
                <div class="row" style="margin: 5px">
                    <div class="col-lg-12">
                        @if (count($errors)>0)
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $err)
                                    {{$err}} <br>
                                @endforeach
                            </div>
                        @endif
        
                        @if (session('thongbao'))
                            <div class="alert alert-success">
                                    {{session('thongbao')}}
                            </div>
                        @endif
                        <form role="form" action="admin/tintuc/sua/{{$tintuc->id}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Thể loại</label>
                                <select class="form-control" name="TheLoai" id="TheLoai">
                                    @foreach ($theloai as $tl)
                                <option 
                                    @if ($tintuc->loaitin->theloai->id==$tl->id)
                                        {{"selected"}}
                                    @endif
                                
                                value="{{$tl->id}}">{{$tl->Ten}}</option>
                                    @endforeach
                                    
                                </select>
                            </div>
                            <div class="form-group">
                                    <label>Loại tin</label>
                                    <select class="form-control" name="LoaiTin" id="LoaiTin">
                                            @foreach ($loaitin as $lt)
                                            <option 
                                            @if ($tintuc->loaitin->id==$lt->id)
                                            {{"selected"}}
                                        @endif
                                            
                                            value="{{$lt->id}}">{{$lt->Ten}}</option>
                                            @endforeach
                                    </select>
                            </div>
                            <div class="form-group">
                                <label>Tiêu đề</label>
                                <input class="form-control" name="TieuDe" placeholder="nhập tiêu đê" value="{{$tintuc->TieuDe}}"/>
                            </div>
                            <div class="form-group">
                                <label>Tóm tắt</label>
                                <textarea id="demo" name="TomTat" class="form-control ckeditor" rows="3" >{{$tintuc->TomTat}}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Nội dung</label>
                                <textarea id="demo" name="NoiDung" class="form-control ckeditor" rows="5" >{{$tintuc->NoiDung}}</textarea>
                            </div>
                            <div class="form-group">
                                <label>hình ảnh</label>
                                <p><img width= "100px"src="upload/tintuc/{{$tintuc->Hinh}}" alt=""></p> 
                                <input type="file" name="Hinh"  class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Nổi Bật</label>
                                <label class="radio-inline">
                                    <input name="NoiBat" value="0" 
                                    @if ($tintuc->NoiBat==0)
                                        {{"checked"}}
                                    @endif 
                                    type="radio">không
                                </label>
                                <label class="radio-inline">
                                    <input name="NoiBat" value="1"
                                    @if ($tintuc->NoiBat==0)
                                        {{"checked"}}
                                    @endif
                                    type="radio">có
                                </label>
                            </div>
                            <button type="submit" class="btn btn-success">Submit Button</button>
                            <button type="reset" class="btn btn-primary">Reset Button</button>
                        </form>
                    </div>
                </div>
            </div> 
        </div>
    </div>
    <!-- /.container-fluid -->

   {{-- comment --}}
    <div class="container-fluid">
            <div class="card shadow mb-4">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">bình luận</h6>
                    </div>
                    <div class="row" style="margin: 5px">
                        <div class="col-lg-12">
                            @if (session('thongbao'))
                                <div class="alert alert-success">
                                        {{session('thongbao')}}
                                </div>
                            @endif
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr align="center">
                                        <th>ID</th>
                                        <th>Người dùng</th>
                                        <th>nội dung</th>
                                        <th>ngày</th>
                                        <th>delete</th>    
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tintuc->comment as $cm)
                                        <tr class="odd gradeX" align="center">
                                            <td>{{$cm->id}}</td>
                                            <td>
                                                {{$cm->user->name}}
                                            </td>
                                            <td>{{$cm->NoiDung}}</td>
                                            <td>{{$cm->created_at}}</td>
                                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/comment/xoa/{{$cm->id}}/{{$tintuc->id}}"> Delete</a></td>
                                        </tr>
                                    @endforeach  
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
        <!-- /.container-fluid -->

@endsection

@section('script')
<script>
 $(document).ready(function(){
     $("#TheLoai").change(function(){ // sự kiện khi nhấn chọn thay đổi
         var idTheLoai = $(this).val();// lấy id thể loại chính nó
         $.get("admin/ajax/loaitin/"+idTheLoai,function(data){ //tạo 1 phương thức ajax và truyền theo pt get
        
             $("#LoaiTin").html(data);
         });
     });
 });
</script>
@endsection