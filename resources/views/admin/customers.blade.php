@extends('admin/dashdoard')
@section('content')
<div class="container">
    <h2 style="text-align:center">Danh Sách Khách Hàng</h2>
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
            <th>Tên Khách Hàng</th>
            <th>Địa Chỉ</th>
            <th>Số Điện Thoại</th>
            <th>Ngày Liên Hệ</th>
            <th>Quản lý</th>
        </tr>
        @foreach($customers as $customer)
        <tr>
            <td>{{$customer->name}}</td>
            <td>{{$customer->address}}</td>
            <td>{{$customer->phone_number}}</td>
            <td>{{$customer->created_at}}</td>
            <td><a class="delete" href="{{route('delete-customer',$customer->id)}}">Xóa</a></td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
