<?php

namespace App\Http\Controllers;
use App\Bill;
use App\Customer;
use App\BillDetail;
use Illuminate\Http\Request;

class BillController extends Controller
{
    public function index(){
        $bills = Bill::all();
        return view('admin.bills',compact('bills'));
    }

    public function show(Request $req){
        $bill = Bill::where('id',$req->id)->first();
        $customer = Customer::where('id',$bill->id_customer)->first();
        $billDetails = BillDetail::where('id_bill',$bill->id)->get();
        return view('admin.show_bill',compact('bill','customer','billDetails'));
    }

    public function delete(Request $req){
        $bill = Bill::where('id',$req->id)->first();
        BillDetail::where('id_bill',$bill->id)->delete();
        $bill->delete();
        return redirect()->route('list-bill')->with('message','Xóa thành công');
    }
}
