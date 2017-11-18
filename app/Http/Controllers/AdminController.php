<?php

namespace App\Http\Controllers;
use App\Product;
use App\ProductImage;
use App\ProductView;
use Image;
use Storage;
use Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function  __construct(){
        $this->middleware('auth');
    }

    public function index(){
        return view('admin.dashdoard');
    }

    public function list_product(){
        $product = Product::all();
        return view('admin.products',compact('product'));
    }

    public function add_product(){
        return view('admin.add_product');
    }

    public function add_product_submit(Request $req){
        $this->validate($req,
        [   
            'tieude'=>'required',
            'loai'=>'required',
            'gia'=>'required',
            'diadiem'=>'required',
            'mota'=>'required',
            'feature_image'=>'required'
        ],
        [
            'tieude.required'=>'Vui lòng nhập tiêu đề',
            'loai.required'=>'Chọn 1 trong 2(nhà hoặc đất)',
            'gia.required'=>'Vui lòng nhập giá',
            'diadiem.required'=>'Vui lòng nhập địa điểm',
            'mota.required'=>'Chưa nhập mô tả',
            'feature_image.required'=>'Chọn ít nhất 1 hình ảnh'
            
        ]);
        $product = new Product;
        $product->name = $req->tieude;
        $product->id_type = $req->loai == "Nhà"?1:2;
        $product->unit = $req->loai == "Nhà"?"Căn":"Mảnh";
        $product->promotion_price = 0;
        $product->unit_price = $req->gia;
        $product->location = $req->diadiem;
        $product->description = $req->mota;
        $product->new = 1;
        $last = Product::all()->last()->id;
        $slug = $req->tieude.'-'.++$last;
        $product->slug = str_slug($slug,'-');
        if($req->hasFile('feature_image')){
            $image = $req->file('feature_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('source/image/product/'.$filename);
            Image::make($image)->save($location);
            $product->image = $filename;
        }
        $product->save();
        $productview = new ProductView();
        $productview->id_product = $product->id;
        $productview->visited = 0;
        $productview->save();
        if($req->hasFile('images')){
            $count = 0;
            foreach($req->file('images') as $image){
                $filename = time() .'_'.$count++. '.' . $image->getClientOriginalExtension();
                $location = public_path('source/image/product/'.$filename);
                Image::make($image)->save($location);
                $newImage = new ProductImage();
                $newImage->id_product = $product->id;
                $newImage->new = 1;
                $newImage->image = $filename;
                $newImage->save();
            }
        }
        return redirect()->route('list-product')->with('message','Thêm thành công');
    }

    public function update_product(Request $req){
        $prdct = Product::where('id',$req->id)->first();
        return view('admin.update_product',compact('prdct'));
    }

    public function update_product_submit(Request $req){
        $this->validate($req,
        [   
            'tieude'=>'required',
            'loai'=>'required',
            'gia'=>'required',
            'diadiem'=>'required',
            'mota'=>'required',
        ],
        [
            'tieude.required'=>'Vui lòng nhập tiêu đề',
            'loai.required'=>'Chọn 1 trong 2(nhà hoặc đất)',
            'gia.required'=>'Vui lòng nhập giá',
            'diadiem.required'=>'Vui lòng nhập địa điểm',
            'mota.required'=>'Chưa nhập mô tả',
        ]);
        $product = Product::where('id',$req->id)->first();
        $product->name = $req->tieude;
        $product->id_type = $req->loai == "Nhà"?1:2;
        $product->unit = $req->loai == "Nhà"?"Căn":"Mảnh";
        $product->promotion_price = 0;
        $product->unit_price = $req->gia;
        $product->location = $req->diadiem;
        $product->description = $req->mota;
        $slug = $req->tieude.'-'.$product->id;
        $product->slug = str_slug($slug,'-');
        
        if($req->hasFile('feature_image')){
            $image = $req->file('feature_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('source/image/product/'.$filename);
            Image::make($image)->save($location);
            $oldFileName = $product->image;
            $product->image = $filename;
            Storage::delete('product/'.$oldFileName);
        }

        if($req->hasFile('images')){
            $photos = ProductImage::where('id_product',$product->id)->get();
            foreach($photos as $old){
                $old->new = 0;
                $old->save();
            }
            $count = 0;
            foreach($req->file('images') as $image){
                $filename = time() .'_'.$count++. '.' . $image->getClientOriginalExtension();
                $location = public_path('source/image/product/'.$filename);
                Image::make($image)->save($location);
                $newImage = new ProductImage();
                $newImage->id_product = $product->id;
                $newImage->new = 1;
                $newImage->image = $filename;
                $newImage->save();
            }
            $oldPhotos = ProductImage::where('new','<>',1)
                                        ->where('id_product',$product->id)
                                        ->get();
            foreach($oldPhotos as $oldImage){
                Storage::delete('product/'.$oldImage->image);
                $oldImage->delete();
            }
        }

        $product->save();
        return redirect()->back()->with('message','Cập nhật thành công');
    }

    public function delete_product(Request $req){
        $product = Product::where('id',$req->id)->first();
        $productImage = ProductImage::where('id_product',$product->id)->get();
        Storage::delete('product/'.$product->image);
        foreach($productImage as $oldimage){
            Storage::delete('product/'.$oldimage->image);
            $oldimage->delete();
        }
        $product->delete();
        return redirect()->route('list-product')->with('message','Xóa thành công');
    }

    public function show_product(Request $req){
        $product = Product::find($req->id);
        $photos =  ProductImage::where('id_product',$product->id)->get();
        if($view = ProductView::where('id_product',$product->id)->get()->first())
            return view('admin.show_product',compact('product','photos','view'));
        return view('admin.show_product',compact('product','photos'));
    }


}