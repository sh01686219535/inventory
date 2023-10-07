<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;
use App\Models\backEnd\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //customer
    public function customer(){
        $customer = Customer::latest()->get();
        return view('backEnd.customer.customer',compact('customer'));
    }
    //addCustomer
    public function addCustomer(){
        return view('backEnd.customer.add-customer');
    }
    //saveCustomer
    public function saveCustomer(Request $request){
        $request->validate([
            'customer_name'=>'required',
            'customer_email'=>'required|email:rfc,dns|unique:customers,customer_email',
            'customer_phone'=>'required',
            'customer_address'=>'required',

        ]);
        $customer = new Customer();
        $customer->customer_name = $request->customer_name;
        $customer->customer_email = $request->customer_email;
        $customer->customer_phone = $request->customer_phone;
        $customer->customer_address = $request->customer_address;
        if ($request->file('customer_image')) {
            $customer->customer_image = $this->makeImage($request);
        }

        $customer->save();
        $customer =  array(
            'message'=>'Customer Crete Successfully',
            'alert-type'=>'success'
        );
        return redirect('/customer')->with($customer);
    }
    private function makeImage($request){
        $image = $request->file('customer_image');
        $imageName = rand() . '.' . $image->getClientOriginalExtension();
        $directory = public_path('backEndAssets/assets/customer-img/');
        $path = 'backEndAssets/assets/customer-img/';
        $imageUrl = $path . $imageName;
        $image->move($directory, $imageName);
        return $imageUrl;
    }
    //editCustomer
    public function editCustomer($id){
        $customer = Customer::find($id);
        return view('backEnd.customer.edit-customer',compact('customer'));
    }
    //updateCustomer
    public function updateCustomer(Request $request){
        $request->validate([
            'customer_name'=>'required',
            'customer_email'=>'required|email:rfc,dns|unique:customers,customer_email',
            'customer_phone'=>'required',
            'customer_address'=>'required',

        ]);
        $customer = Customer::find($request->customer_id);
        $customer->customer_name = $request->customer_name;
        $customer->customer_email = $request->customer_email;
        $customer->customer_phone = $request->customer_phone;
        $customer->customer_address = $request->customer_address;
        if ($request->file('customer_image')) {
            $customer->customer_image = $this->makeImage($request);
        }

        $customer->save();
        $customer =  array(
            'message'=>'Customer update Successfully',
            'alert-type'=>'success'
        );
        return redirect('/customer')->with($customer);
    }
    //deleteCustomer
    public function deleteCustomer($id){
        $customer = Customer::find($id);
        $customer->delete();
        $custome = array(
            'message'=>'Customer Deleted Successfully',
            'alert-type'=>'success'
        );
        return back()->with($custome);
    }
}
