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
         
                        <form role="form" action="admin/user/sua/{{$user->id}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Họ tên</label>
                                <input class="form-control" name="name" placeholder="nhập tên" value="{{$user->name}}"/>
                            </div>
                            <div class="form-group">
                                <label>email</label>
                                <input type="EMAIL" class="form-control " name="email" placeholder="nhập mail" readonly="" value="{{$user->email}}"/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" id="changePassword" name="changePassword" >
                                <label>Đổi mật khẩu</label>
                                <input type="password" class="form-control password" name="password" placeholder="nhập pass" disabled=""/>
                            </div>
                            <div class="form-group">
                                <label>nhập lại Password</label>
                                <input type="password" class="form-control password" name="passwordAgain" placeholder="nhập lại pass" disabled="" />
                            </div>
                               
                            <div class="form-group">
                                <label>quyền user</label>
                                <label class="radio-inline">
                                    <input name="quyen" value="0" 
                                    
                                    @if ($user->quyen==0)
                                        {{"checked"}}
                                    @endif
                                    type="radio">thường
                                </label>
                                <label class="radio-inline">
                                    <input name="quyen" value="1" 
                                    
                                    @if ($user->quyen==1)
                                        {{"checked"}}
                                    @endif
                                    
                                    type="radio">admin
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
@endsection

@section('script')
    <script>
       $(document).ready(function(){
           $("#changePassword").change(function(){
                if($(this).is(":checked"))
                {
                    $(".password").removeAttr('disabled');
                }
                else{
                    $(".password").attr('disabled','');
                }
           });
       });
    </script>
@endsection