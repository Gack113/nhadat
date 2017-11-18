@extends('admin/dashdoard')
@section('content')

<div class="container">
<form action="{{route('update-product',$prdct->id)}}" method="POST" enctype="multipart/form-data">
    <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
    <h2 style="text-align:center">Sửa bài viết</h2>
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
    <div class="form-group row">
        <label class="col-md-2 col-form-label" for="tieude">Tiêu Đề</label>
        <div class="col-md-10">
            <input type="text" class="form-control" id="tieude" name="tieude" value="{{$prdct->name}}">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-2 col-form-label" for="loai">Loại</label>
        <div class="col-md-10">
            <select class="form-control" id="loai" name="loai" value="{{$prdct->name == 1 ?"Nhà":"Đất"}}">
                <option selected>Nhà</option>
                <option >Đất</option>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-2 col-form-label" for="gia">Giá</label>
        <div class="col-md-10">
            <input type="text" class="form-control" id="gia" name="gia" value="{{$prdct->unit_price}}">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-2 col-form-label" for="diadiem">Địa điểm</label>
        <div class="col-md-10">
            <input type="text" class="form-control" id="diadiem" name="diadiem" value="{{$prdct->location}}">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-2 col-form-label" for="mota">Mô tả</label>
        <div class="col-md-10 fr-view">
            <textarea class="form-control" rows="5" id="mota" name="mota">{!!$prdct->description!!}</textarea>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-2 col-form-label" for="feature_image">Hình ảnh đại diện</label>
        <div class="col-md-10">
            <input type="file" class="form-control-file" id="hinhanh" name="feature_image">
            <img  id="previewImage" src="" alt="">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-2 col-form-label" for="images">Hình ảnh khác</label>
        <div class="col-md-10" id="previewImages">
            <input type="file" class="form-control-file" id="images" name="images[]" multiple>
        </div>
    </div>
    <input type="submit" style="text-align:center" class="btn btn-primary" value="Cập nhật">
</form>
</div>

@endsection