@extends('layout.master')

@section('content')
    <!-- Page Content -->
    <div class="container">

    	<!-- slider -->
    	<div class="row carousel-holder">
    		<div class="col-md-4"></div>
            <div class="col-md-4" style="border: 1px solid green;
            padding-top: 20px;
            margin-top: 55px;
            margin-bottom: 55px;
            padding-bottom: 20px;">
                <div class="panel panel-default">
				  	<div class="panel-heading" style="padding-bottom: 20px;
                      color: red;
                      font-weight: bold;
                      margin-left: 110px;
                      font-size: 23px;">Đăng ký</div>
				  	<div class="panel-body">

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
				    	<form action="dangky" method="POST">
                            @csrf
                            <div>
                                <label>Ho Tên</label>
                                <input type="text" class="form-control" placeholder="họ tên" name="name" 
                                >
                            </div>
                            <br>	
							<div>
				    			<label>Email</label>
							  	<input type="email" class="form-control" placeholder="Email" name="email" 
							  	>
							</div>
							<br>	
							<div>
				    			<label>Mật khẩu</label>
							  	<input type="password" class="form-control" name="password">
							</div>
                            <br>
                            <div>
                                <label>Nhập Lại Mật khẩu</label>
                                    <input type="password" class="form-control" name="passwordAgain">
                            </div>
                            <br>
							<button type="submit" class="btn btn-default">Đăng ky
							</button>
				    	</form>
				  	</div>
				</div>
            </div>
            <div class="col-md-4"></div>
        </div>
        <!-- end slide -->
    </div>
    <!-- end Page Content -->
@endsection