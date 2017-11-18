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
            <th>Mã Khách Hàng</th>
            <th>Tổng Tiền</th>
            <th>Hình Thức Thanh Toán</th>
            <th>Chú Thích</th>
            <th>Ngày Tạo</th>
            <th>Quản Lý</th>
        </tr>
        @foreach($bills as $bill)
        <tr>
            <td>{{$bill->id_customer}}</td>
            <td>{{number_format($bill->total)}}</td>
            <td>{{$bill->payment}}</td>
            <td>{{$bill->note}}</td>
            <td>{{$bill->date_order}}</td>
            <td><a class="delete" href="{{route('show-bill',$bill->id)}}">Xem</a></td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
