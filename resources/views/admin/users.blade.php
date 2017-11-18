@extends('admin/dashdoard')
@section('content')
<div class="container">
    <h2 style="text-align:center">Danh Sách Tài Khoản</h2>
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
    <table class="table table-bordered table-hover table-responsive">
        <tr>
            <th>ID</th>
            <th>Họ Tên</th>
            <th>Tên Tài Khoản</th>
            <th>Email</th>
            <th>Mật Khẩu</th>
            <th>Ngày Tạo</th>
            <th>Ngày Cập Nhật</th>
            <th colspan="2" style="text-align:center">Quản lý</th>
        </tr>
        @foreach($users as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->username}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->password}}</td>
            <td>{{$user->created_at}}</td>
            <td>{{$user->updated_at}}</td>
            <td><a href="{{route('update-user',$user->id)}}">Sửa</a></td>
            <td><a class="delete" href="{{route('delete-user',$user->id)}}">Xóa</a></td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
