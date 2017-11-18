<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
	<title>Admin - login</title>
</head>
<body>
<div class="container">
<div class="row" style="margin-top:20%">
	<div class="col-md-5"></div>
	<div class="col-md-3">
		@if(count($errors) > 0)
			<div class="alert alert-danger">
			@foreach($errors->all() as $err)
				{{$err}}&nbsp;&nbsp;&nbsp;
			@endforeach
			</div>
		@endif
		@if(Session::has('message'))
		<h5 class="alert alert-{{Session::get('flag')}}">{{Session::get('message')}}</h5>
		@endif
		<form action="{{route('login')}}" method="post">
		<input name="_token" type="hidden" value="{{ csrf_token() }}"/>
			<div class="form-group">
				<label for="username">Tài Khoản</label>
				<input class="form-control" type="text" id="username" name="username">
			</div>
			<div class="form-group">
				<label for="password">Mật Khẩu</label>
				<input class="form-control" type="password" id="password" name="password">
			</div>
			<input class="btn btn-primary" type="submit" value="Đăng Nhập">
			<!-- @captcha() -->
		</form>
	</div>
	<div class="col-md-4"></div>
</div>
</div>
	
</body>
</html>
