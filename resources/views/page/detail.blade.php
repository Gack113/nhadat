@extends('master')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">{{$prdct->name}}</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{route('home')}}">Trang Chủ</a> / <span>Chi Tiết Nhà Đất</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>

	<div class="container">
		<div id="content">
			<div class="row">
				<div class="col-sm-9">

					<div class="row">
						<div class="col-sm-4">
						<a href="source/image/product/{{$prdct->image}}" class="image-link">
							<img src="source/image/product/{{$prdct->image}}" alt="" height="250px">
						</a>
						</div>
						<div class="col-sm-8">
							<div class="single-item-body">
								<p class="single-item-title"><h4>Địa phận: {{$prdct->location}}<h4></p>
								<p class="single-item-price">
								@if($prdct->promotion_price == 0)
									<h4>Giá: <span class="flash-sale">{{number_format($prdct->unit_price)}}</span></h4>
								@else
									<span class="flash-del">{{number_format($prdct->unit_price)}}</span>
									<span class="flash-sale">{{number_format($prdct->promotion_price)}}</span>
								@endif
									<h5><span>(Còn thương lượng)</span></h5>
								</p>
							</div>

							<div class="clearfix"></div>
							<div class="space20">&nbsp;</div>

							<div class="single-item-desc" style="font-size:18px">
								{!!$prdct->description!!}
							</div>
							<div class="space20">&nbsp;</div>

							<p>Số lượng</p>
							<div class="single-item-options">
								<select class="wc-select" name="qty">
									<option value="1" selected>1</option>
								</select>
								<a class="add-to-cart" href="{{route('nha-dat-quan-tam',$prdct->id)}}"><i class="fa fa-shopping-cart"></i></a>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>

					<div class="space40">&nbsp;</div>
					<div class="woocommerce-tabs">
						<ul class="tabs">
							<li><a href="#tab-description">Description</a></li>
							<li><a href="#tab-reviews">Reviews (0)</a></li>
						</ul>
						<div class="panel" id="tab-description">
							<div class="beta-products-list">
							<div class="row">
							@foreach($prdctImage as $item)
							<div class="col-sm-4">
								<div class="single-item">
									<div class="single-item-header">
									<a href="source/image/product/{{$item->image}}" class="image-link">
										<img src="source/image/product/{{$item->image}}" alt="" height="250px">
									</a>
									</div>
								</div>
							</div>
							@endforeach
							</div>
						</div> <!-- .beta-products-list -->
						</div>
						<div class="panel" id="tab-reviews">
							<p>No Reviews</p>
						</div>
					</div>
					<div class="space50">&nbsp;</div>
					<div class="beta-products-list">
						<p class="single-item-title">
							<h4>Có thể bạn quan tâm</h4>
							<br>
						</p>
						<div class="row">
							@foreach($relatePrdct as $item)
							<div class="col-sm-4">
								<div class="single-item">
									<div class="ribbon-wrapper"><div class="ribbon sale">NEW</div></div>
									<div class="single-item-header">
										<a href="{{route('chi-tiet-nha-dat',$item->slug)}}"><img src="source/image/product/{{$item->image}}" alt="" height="250px"></a>
									</div>
									<div class="single-item-body">
									<p class="single-item-title"><h5>{{$item->name}}</h5></p>
									<p class="single-item-title"><h6>{{$item->location}}<h6></p>
										<p class="single-item-price">
											@if($item->promotion_price == 0)
												<span class="flash-sale">{{number_format($item->unit_price)}}</span>
											@else
												<span class="flash-del">{{number_format($item->unit_price)}}</span>
												<span class="flash-sale">{{number_format($item->promotion_price)}}</span>
											@endif
										</p>
									</div>
									<div class="single-item-caption">
										<a class="add-to-cart pull-left" href="{{route('nha-dat-quan-tam',$item->id)}}"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="{{route('chi-tiet-nha-dat',$item->slug)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
							@endforeach
						</div>
						<div class="row">{{$relatePrdct->links()}}</div>
					</div> <!-- .beta-products-list -->
				</div>
				<div class="col-sm-3 aside">
					<div class="widget">
						<h3 class="widget-title">Được xem nhiều nhất</h3>
					</div> <!-- best sellers widget -->
					<div class="widget">
						<div class="widget-body">
							<div class="beta-sales beta-lists">
							@foreach($highestProducts as $item)	
								<div class="media beta-sales-item">
									<a class="pull-left" href="{{route('chi-tiet-nha-dat',$item->slug)}}"><img src="source/image/product/{{$item->image}}" alt=""></a>
									<div class="media-body">
										{{$item->name}}
										@if($item->promotion == 0)
											<span class="beta-sales-price">{{number_format($item->unit_price)}}</span>
										@else
											<span class="beta-sales-price">{{number_format($item->promotion_price)}}</span>
										@endif
									</div>
								</div>
							@endforeach
							</div>
						</div>
					</div> <!-- best sellers widget -->
				</div>
			</div>
		</div> <!-- #content -->
	</div> <!-- .container -->

@endsection