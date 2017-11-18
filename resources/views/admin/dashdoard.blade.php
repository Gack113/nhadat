<html>
    <head>
        <title>Quản Lý Nhà Đất</title>
        <base href="{{asset('')}}">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="simditor/styles/simditor.css" />        
        <link rel="stylesheet" href="dashdoard/style.css">
        <link rel="stylesheet" href="viewbox/viewbox.css">
    </head>
   <body>
    <div id="wrapper">
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{route('admin')}}"> HỆ THỐNG QUẢN TRỊ</a>
            </div>
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-user"></i> Xin chào:&nbsp;{{Auth::user()->name}}<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{route('list-user')}}"><i class="glyphicon glyphicon-list-alt"></i>&nbsp;Danh sách tài khoản</a></li>
                        <li><a href="{{route('profile')}}"><i class="glyphicon glyphicon-user"></i>&nbsp;Hồ sơ cá nhân</a></li>
                        <li><a href="{{route('add-user')}}"><i class="glyphicon glyphicon-plus-sign"></i>&nbsp;Thêm tài khoản</a></li>
                        <li class="divider"></li>
                        <li><a href="{{route('logout')}}"><i class="glyphicon glyphicon-off"></i>&nbsp;Đăng xuất</a></li>
                    </ul>
                </li>
            </ul>
            <div class="collapse navbar-collapse navbar-ex1-collapse">     
                <ul class="nav navbar-nav side-nav">
                    <li style="background:#52bc89;color:#fff;">
                        <a href="javascript:;" style="color:#fff;">&nbsp;&nbsp;MENU</a>
                    </li> 
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#nhadat">Nhà Đất
                        <i class="glyphicon glyphicon-chevron-down"></i>
                        </a>
                        <ul id="nhadat" class="collapse">
                            <li><a href="{{route('list-product')}}">Danh sách</a></li>
                            <li><a href="{{route('add-product')}}">Thêm</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#khachhang">Khách Hàng
                        <i class="glyphicon glyphicon-chevron-down"></i>
                        </a>
                        <ul id="khachhang" class="collapse">
                            <li><a href="{{route('list-customer')}}">Danh sách</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#hoadon">Hóa Đơn
                        <i class="glyphicon glyphicon-chevron-down"></i>
                        </a>
                        <ul id="hoadon" class="collapse">
                            <li><a href="{{route('list-bill')}}">Danh sách</a></li>
                        </ul>
                    </li>
                </ul>
            </div> 
        </nav>
        <div id="page-wrapper">
            @yield('content')
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="simditor/scripts/jquery.min.js"></script>
    <script type="text/javascript" src="simditor/scripts/module.js"></script>
    <script type="text/javascript" src="simditor/scripts/hotkeys.js"></script>
    <script type="text/javascript" src="simditor/scripts/uploader.js"></script>
    <script type="text/javascript" src="simditor/scripts/simditor.js"></script>
    <!--viewBox-->
	<script src="viewbox/jquery.viewbox.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
        var editor, mobileToolbar, toolbar;
        Simditor.locale = 'en-US';
        toolbar = ['title', 'bold', 'italic', 'underline', 'strikethrough', 'fontScale', 'color', '|', 'ol', 'ul', 'blockquote', 'code', 'table', '|', 'link', 'hr', '|', 'indent', 'outdent', 'alignment'];
        $('textarea').on('focusin',function(){
            editor = new Simditor({
            textarea: $('textarea'),
            toolbar: toolbar
          });
        });

        var imagesPreviews = function(input) {
            if (input.files) {
                var filesAmount = input.files.length;
                for (i = 0; i < filesAmount; i++) {
                    var reader = new FileReader();
                    reader.onload = function(event) {
                        $($.parseHTML('<img width="150">')).prop('src', event.target.result).appendTo('#previewImages');
                    }
                    reader.readAsDataURL(input.files[i]);
                }
            }
        };

        var imagesPreview = function(input) {
            if (input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(event) {
                        $('#previewImage').prop('src', event.target.result);
                        $('#previewImage').prop('width', 150);
                    }
                    reader.readAsDataURL(input.files[0]);
            }
        };
            
        $('#hinhanh').on('change', function() {
            imagesPreview(this);
        });

        $('#images').on('change', function() {
            imagesPreviews(this);
        });

        $('.delete-product').on('click',function(){
            if(!confirm('Bạn có chắc muốn xóa'))
                return;
        });
        $('.image-link').viewbox();
            
    });
    </script>
   </body>
</html>