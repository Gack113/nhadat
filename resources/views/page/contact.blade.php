@extends('master')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Liên Hệ</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="index.html">Trang Chủ</a> / <span>Liên Hệ</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="beta-map">
		
		<div class="abs-fullwidth beta-map wow flipInX"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3925.032004108875!2d107.08244331488828!3d10.339323892619028!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31756ff6b4b2b835%3A0xb67ce40a04640ddd!2zMTExIEhvw6BuZyBIb2EgVGjDoW0sIFRo4bqvbmcgVGFtLCBUcC4gVsWpbmcgVMOgdSwgQsOgIFLhu4thIC0gVsWpbmcgVMOgdSwgVmlldG5hbQ!5e0!3m2!1sen!2s!4v1510598578985"allowfullscreen></iframe></div>
	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			
			<div class="space50">&nbsp;</div>
			<div class="row">
				<div class="col-sm-8">
					<h2>Mẫu Liên Lạc</h2>
					<div class="space20">&nbsp;</div>
					<p>Bạn muốn làm CTV?</p>
					<div class="space20">&nbsp;</div>
					<form action="#" method="post" class="contact-form">	
						<div class="form-block">
							<input name="your-name" type="text" placeholder="Tên của bạn (Bắt buộc)">
						</div>
						<div class="form-block">
							<input name="your-email" type="email" placeholder="Email (Bắt buộc)">
						</div>
						<div class="form-block">
							<input name="your-subject" type="text" placeholder="Chuyên môn">
						</div>
						<div class="form-block">
							<textarea name="your-message" placeholder="Tin nhắn"></textarea>
						</div>
					</form>
					<button type="submit" class="beta-btn primary">Gửi tin nhắn <i class="fa fa-chevron-right"></i></button>
				</div>
				<div class="col-sm-4">
					<h2>Thông Tin Liên Lạc</h2>
					<div class="space20">&nbsp;</div>

					<h6 class="contact-title">Địa Chỉ</h6>
					<p>
						TP.Vũng Tàu, Việt Nam
					</p>
					<div class="space20">&nbsp;</div>
					<h6 class="contact-title">Số Điện Thoại</h6>
					<p>
						0165 3636 229
					</p>
					<div class="space20">&nbsp;</div>
					<h6 class="contact-title">Email</h6>
					<p>
						Email@gmail.com
					</p>
				</div>
			</div>
		</div> <!-- #content -->
	</div> <!-- .container -->

@endsection