<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;
use App\Models\backEnd\Customer;
use App\Models\backEnd\Payment;
use App\Models\backEnd\PaymentDetails;
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
    //createCustomer
    public function CreditCustomer(){
        $payment = Payment::whereIn('paid_status',['full_due','partial_paid'])->get();
        return view('backEnd.customer.credit-customer',compact('payment'));
    }
    //creditCustomerPdfPrnit
    public function creditCustomerPdfPrnit(){
        $payment = Payment::whereIn('paid_status',['full_due','partial_paid'])->get();
        return view('backEnd.pdf.credit-customer-print',compact('payment'));
    }
    //editCustomerInvoice
    public function editCustomerInvoice($invoice_id){
        $payment = Payment::where('invoice_id',$invoice_id)->first();
        return view('backEnd.customer.edit-customer-invoice',compact('payment'));
    }
    //customerUpdateInvoice
    public function customerUpdateInvoice(Request $request){
        if ($request->new_paid_amount < $request->paid_amount) {
            $customer =  array(
                'message'=>'Paid Amount Maximum value',
                'alert-type'=>'error'
            );
            return back()->with($customer);
        }else{
            $payment = Payment::where('invoice_id',$request->invoice_id)->first();
            $paymentDetails = new PaymentDetails();
            $payment->paid_status = $request->paid_status;
            if ($request->paid_status == 'full_paid') {
                $payment->paid_amount = Payment::where('invoice_id',$request->invoice_id)->first()
                ['paid_amount'] + $request->new_paid_amount;
                $payment->due_amount = '0';
                $paymentDetails->current_paid_amount = $request->new_paid_amount;
            }elseif ($request->paid_status == 'partial_paid') {
                $payment->paid_amount = Payment::where('invoice_id',$request->invoice_id)->first()
                ['paid_amount'] + $request->paid_amount;
                $payment->due_amount = Payment::where('invoice_id',$request->invoice_id)->first()
                ['due_amount'] - $request->paid_amount;
                $paymentDetails->current_paid_amount = $request->paid_amount;
            }
        }

        $payment->save();
        $paymentDetails->invoice_id = $request->invoice_id;
        $paymentDetails->date = $request->date;
        $paymentDetails->save();

        $Customer =  array(
            'message'=>'Invoice update Successfully',
            'alert-type'=>'success'
        );
        return redirect('/Credit-customer')->with($Customer);
    }
    //customerInvoiceDetailsPdf
    public function customerInvoiceDetailsPdf($invoice_id){
        $payment = Payment::where('invoice_id',$invoice_id)->get();
        return view('backEnd.pdf.invoice-details-pdf',compact('payment'));
    }
}
