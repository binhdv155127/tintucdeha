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
                        @if (session('thongbao'))
                            <div class="alert alert-success">
                                    {{session('thongbao')}}
                            </div>
                        @endif
                        <form role="form" action="admin/theloai/sua/{{$theloai->id}}" method="POST">
                            @csrf
                            <fieldset class="form-group">
                                <label>Tên thể loại</label>
                                <input class="form-control" placeholder="nhập tên thể loại" name="Ten" value="{{$theloai->Ten}}">
                                @if($errors->has('Ten'))
                                    <div class="alert alert-danger">{{$errors->first("Ten")}}</div>
                                @endif
                            </fieldset>
                            <button type="submit" class="btn btn-success">sửa</button>
                            <button type="reset" class="btn btn-primary">làm mới</button>
                        </form>
                    </div>
                </div>
            </div> 
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection