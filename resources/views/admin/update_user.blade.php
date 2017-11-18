@extends('admin/dashdoard')
@section('content')
<div class="container">
	<form action="{{route('update-user',$user->id)}}" method="post">
		<input name="_token" type="hidden" value="{{ csrf_token() }}"/>
		<div class="row">
			<div class="col-sm-3"></div>
			@if(count($errors) > 0)
				<div class="alert alert-danger">
				@foreach($errors->all() as $err)
					{{$err}}&nbsp;&nbsp;&nbsp;
				@endforeach
				</div>
			@endif
			@if(Session::has('message'))
			<h5 class="alert alert-success">{{Session::get('message')}}</h5>
			@endif
			<div class="col-sm-6">
				<h2>Sửa Tài Khoản</h2>
				<div class="space20">&nbsp;</div>
                <div class="form-group">
					<label for="username">Tên tài khoản</label>
					<input class="form-control" type="text" id="username" name="username" required value="{{$user->username}}" disabled>
				</div>
				<div class="form-group">
					<label for="name">Tên hiển thị</label>
					<input class="form-control" type="text" id="name" name="name" required value="{{$user->name}}">
				</div>
				<div class="form-group">
					<label for="email">Email mới*</label>
					<input class="form-control" type="email" id="email" name="email" required value="{{$user->email}}">
				</div>
				<div class="form-group">
					<label for="password">Mật khẩu mới*</label>
					<input class="form-control" type="text" id="password" name="password" required>
				</div>
				<input type="submit" class="btn btn-primary" value="Cập nhật">
			</div>
			<div class="col-sm-3"></div>
		</div>
	</form>
</div> <!-- .container -->
@endsection