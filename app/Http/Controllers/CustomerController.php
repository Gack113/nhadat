<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Bill;
use App\BillDetail;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(){
        $customers = Customer::all();
        return view('admin.customers',compact('customers'));
    }

    public function delete(Request $req){
        Customer::where('id',$req->id)->first();
        return redirect()->route('list-customer')->with('message','Xóa thành công');
    }

}
