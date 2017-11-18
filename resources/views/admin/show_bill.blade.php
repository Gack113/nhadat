@extends('admin/dashdoard')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <p>
                <h1>Mã Hóa Đơn:&nbsp;&nbsp;{{$bill->id}}</h1>
            </p>
            <p>
                <h2>Người Mua:&nbsp;&nbsp;{{$customer->name}}</h2>
            </p>
            <p>
                <h3>Tổng Tiền: {{number_format($bill->total)}}</h3>
            </p>
            <p>
                <h3>Hình Thức Thanh Toán: {{$bill->payment}}</h3>
            </p>
            <p>
                <h3>Chú Thích: {{$bill->note}}</h3>
            </p>
            <p>
                <h3>Chi Tiết Hóa Đơn: {{Count($billDetails)}}</h3>
            </p>
            <br><br>
            <table class="table table-bordered table-hover table-responsive">
                <tr>
                    <th>Mã Nhà Đất</th>
                    <th>Số Lượng</th>
                    <th>Giá</th>
                </tr>
                @foreach($billDetails as $item)
                <tr>
                    <td>{{$item->id_product}}</td>
                    <td>{{$item->quantity}}</td>
                    <td>{{number_format($item->unit_price)}}</td>
                </tr>
                @endforeach
            </table>
        </div>
        <div class="col-md-4">
            <aside class="profile-card">
                <header>
                    <a href="#">
                        <img src="source/image/product/admin.png" width="150px" class="hoverZoomLink">
                    </a>
                    <h4>Tạo Bởi: Admin</h4>
                    <h4>Ngày Lập Bill: &nbsp;&nbsp;{{$bill->date_order}}</h1>
                </header>
                <div class="profile-bio">
                    <a href="{{route('delete-bill',$bill->id)}}"><button class="btn btn-primary">Xóa</button></a>
                </div>
            </aside>
        </div>
    </div>
</div>
@endsection