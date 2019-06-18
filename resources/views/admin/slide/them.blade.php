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
                        <form role="form" action="admin/slide/them" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                    <label>tên</label>
                                    <input class="form-control" name="Ten" placeholder="nhập tên slide" />
                                </div>
                                <div class="form-group">
                                    <label>nội dung</label>
                                    <textarea id="demo" name="NoiDung" class="form-control ckeditor" rows="3"></textarea>
                                </div>
                                <div class="form-group">
                                        <label>link</label>
                                        <input class="form-control" name="link" placeholder="nhập tên link" />
                                    </div>
                                <div class="form-group">
                                    <label>hình ảnh</label>
                                    <input type="file" name="Hinh"  class="form-control">
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
@endsection