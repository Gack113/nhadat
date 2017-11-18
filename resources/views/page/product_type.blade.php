@extends('master')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">{{$typeName->name}}</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{route('home')}}">Home</a> / <span>{{$typeName->name}}</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-3">
						<ul class="aside-menu">
						@foreach($listType as $item)
							<li><a href="{{route('loai-nha-dat',$item->id==1?'nha':'dat')}}">{{$item->name}}</a></li>
						@endforeach
						</ul>
					</div>
					<div class="col-sm-9">
						<div class="beta-products-list">
							<h4>{{$typeName->name}}</h4>
							<div class="beta-products-details">
								<p class="pull-left">{{count($prdctType)}} kết quả</p>
								<div class="clearfix"></div>
							</div>
							@foreach($prdctType->chunk(3) as $products)
							<div class="row">
								@foreach($products as $item)
								<div class="col-sm-4">
									<div class="single-item">
										<div class="ribbon-wrapper"><div class="ribbon sale">NEW</div></div>
										<div class="single-item-header">
											<a href="{{route('chi-tiet-nha-dat',$item->slug)}}"><img src="source/image/product/{{$item->image}}" alt="" height="250" width="500"></a>
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
							<div style"height:5%">&nbsp;</div>
							@endforeach
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

						<div class="beta-products-list">
							<h4>{{$typeName->id == 1?"Đất":"Nhà"}}</h4>
							<div class="beta-products-details">
								<p class="pull-left">{{count($otherPrdct)}} kết quả</p>
								<div class="clearfix"></div>
							</div>
							@foreach($otherPrdct->chunk(3) as $products)
							<div class="row">
								@foreach($products as $item)
								<div class="col-sm-4">
									<div class="single-item">
										<div class="ribbon-wrapper"><div class="ribbon sale">NEW</div></div>
										<div class="single-item-header">
											<a href="{{route('chi-tiet-nha-dat',$item->slug)}}"><img src="source/image/product/{{$item->image}}" alt="" height="250" width="500"></a>
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
							<div style"height:5%">&nbsp;</div>
							@endforeach
							<div class="row">{{$otherPrdct->links()}}</div>
							<div class="space40">&nbsp;</div>
						</div> <!-- .beta-products-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection