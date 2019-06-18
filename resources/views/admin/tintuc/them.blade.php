@extends('admin.layout.master')

@section('tieude')
Thêm Tin Tức
@endsection


@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <div class="card shadow mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Thêm Tin Tức</h6>
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

                        @if (session('loi'))
                            <div class="alert alert-danger">
                                {{session('loi')}}
                            </div>
                        @endif
                        <form role="form" action="admin/tintuc/them" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Thể loại</label>
                                <select class="form-control" name="TheLoai" id="TheLoai">
                                    @foreach ($theloai as $tl)
                                        <option value="{{$tl->id}}">{{$tl->Ten}}</option>
                                    @endforeach
                                </select>
                            </div>
                                                       
                            <div class="form-group">
                                <label>Loại Tin</label>
                                <select class="form-control" name="LoaiTin" id="LoaiTin">
                                    @foreach ($loaitin as $lt)
                                        <option value="{{$lt->id}}">{{$lt->Ten}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Tiêu đề</label>
                                <input class="form-control" name="TieuDe" placeholder="nhập tiêu đê" />
                            </div>
                                
                            <div class="form-group">
                                <label>Tóm tắt</label>
                                <textarea id="demo" name="TomTat" class="form-control ckeditor" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Nội dung</label>
                                <textarea id="demo" name="NoiDung" class="form-control ckeditor" rows="5"></textarea>
                            </div>
            
                            <div class="form-group">
                                <label>hình ảnh</label>
                                <input type="file" name="Hinh"  class="form-control">
                            </div>
            
                            <div class="form-group">
                                <label>Nổi Bật</label>
                                <label class="radio-inline">
                                    <input name="NoiBat" value="0" checked="" type="radio">không
                                </label>
                                <label class="radio-inline">
                                    <input name="NoiBat" value="1" type="radio">có
                                </label>
                            </div>
                            <button type="submit" class="btn btn-success">Thêm</button>
                            <button type="reset" class="btn btn-primary">Làm mới</button>
                        </form>
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
                 // chỗ +idTheLoai là nối thêm id vào
                 //admin/ajax/loaitin/"+idTheLoai đường link khai báo trong route
                
                     $("#LoaiTin").html(data);
                 });
             });
         });
    </script>
@endsection