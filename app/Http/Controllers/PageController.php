<?php

namespace App\Http\Controllers;

use App\Slide;
use App\Product;
use App\ProductType;
use App\Cart;
use App\Customer;
use App\Bill;
use App\BillDetail;
use App\User;
use App\ProductImage;
use App\ProductView;
use Hash;
use Auth;
use Session;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        $slide = Slide::all();
        $newprdct = Product::where('new',1)->paginate(6);
        $saleprdct = Product::where('promotion_price','<>',0)->paginate(8);
        return view('page.home',compact('slide','newprdct','saleprdct'));
    }

    public function ProductType(Request $req){
        $id = 1;
        if($req->id != "nha")
            $id = 2;
        $prdctType = Product::where('id_type',$id)->get();
        $otherPrdct = Product::where('id_type','<>',$id)->paginate(3);
        $listType = ProductType::all();
        $typeName = ProductType::where('id',$id)->first();
        return view('page.product_type',compact('prdctType','otherPrdct','listType','typeName'));
    }

    public function preLoadDetail(Request $req){
        $prdct = Product::where('slug',$req->slug)->first();
        if(!$prdct):
            if($has = Product::where('slug','like',$req->slug.'%')->get()->last()):
                return redirect()->route('chi-tiet-nha-dat',$has->slug);
            else:
                return redirect()->route('home');
            endif;
        endif;
        if($productview = ProductView::where('id_product',$prdct->id)->first()):
            $productview->visited++;
            $productview->last_visited = now();
            $productview->save();
        endif;
        return $this->ProductDetail($prdct->slug);
    }

    public function ProductDetail($slug){
        $prdct = Product::where('slug',$slug)->first();
        $relatePrdct = Product::where('id_type',$prdct->id_type)->paginate(3);
        $highestProducts = Product::join('product_views','product_views.id_product','=','products.id')
                                    ->orderBy('product_views.visited', 'desc')
                                    ->take(5)
                                    ->get();
        $prdctImage = ProductImage::where('id_product',$prdct->id)->get();
        return view('page.detail',compact('prdct','prdctImage','relatePrdct','highestProducts'));
    }

    public function Contact(){
        return view('page.contact');
    }

    public function About(){
        return view('page.about');
    }

    public function AddCart(Request $req, $id){
        $prdct = Product::find($id);
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($prdct,$id);
        $req->Session()->put('cart',$cart);
        return redirect()->back();
    }

    public function ReduceCart($id){
        $oldCart = Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if(count($cart->items) > 0)
            Session::put('cart',$cart);
        else
            Session::forget('cart');
        return redirect()->back();
    }

    public function ReduceCartByOne($id){
        $oldCart = Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);
        if(count($cart->items) > 0)
            Session::put('cart',$cart);
        else
            Session::forget('cart');
        return redirect()->back();
    }

    public function Order(){
        return view('page.order');
    }

    public function Checkout(Request $req){
        $customer = new Customer;
        $customer->name = $req->name;
        $customer->gender = $req->gender;
        $customer->email = $req->email;
        $customer->address = $req->address;
        $customer->phone_number = $req->phone;
        $customer->note = $req->note;
        $customer->save();

        $bill = new Bill;
        $bill->id_customer = $customer->id;
        $bill->date_order = date('Y-m-d');
        $bill->total = Session::get('cart')->totalPrice;
        $bill->payment = $req->payment_method;
        $bill->note = $req->note;
        $bill->save();

        foreach (Session::get('cart')->items as $key => $value) {
            $bill_detail = new BillDetail;
            $bill_detail->id_bill = $bill->id;
            $bill_detail->id_product = $key;
            $bill_detail->quantity = $value['qty'];
            $bill_detail->unit_price = $value['price']/$value['qty'];
            $bill_detail->save();
        }
        Session::forget('cart');
        return redirect()->back()->with('message','Đặt hàng thành công!');
    }

    public function Search(Request $req){
        $product = Product::where('name','like','%'.$req->input('tu-khoa').'%')
                            ->orwhere('unit_price',$req->input('tu-khoa'))
                            ->orwhere('location','like','%'.$req->input('tu-khoa').'%')
                            ->orwhere('unit','like',$req->input('tu-khoa'))
                            ->paginate(8);
        return view('page.search',compact('product'));
    }
}
