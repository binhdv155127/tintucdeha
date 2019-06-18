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
                            @foreach ($errors->all() as $err)
                                <div class="alert alert-danger">
                                    {{$err}}
                                </div>
                            @endforeach
                            
                        @endif

                        @if (session('thongbao'))
                            <div class="alert alert-success">
                                {{session('thongbao')}}
                            </div>
                        @endif
                        <form role="form" action="admin/loaitin/sua/{{$loaitin->id}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Thể loại</label>
                                <select class="form-control" name="TheLoai">
                                    @foreach ($theloai as $tl)
                                         <option
                                            @if ($loaitin->idTheLoai==$tl->id)
                                                {{"selected"}}
                                            @endif
                                         
                                           value="{{$tl->id}}">{{$tl->Ten}}</option>
                                    @endforeach
                                   
                                </select>
                            </div>
                            <fieldset class="form-group">
                                <label>tên loại tin</label>
                            <input class="form-control" placeholder="sửa tên lạo tin" value="{{$loaitin->Ten}}" name="Ten">
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