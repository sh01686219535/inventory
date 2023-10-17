<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;
use App\Models\backEnd\Category;
use App\Models\backEnd\Invoice;
use App\Models\backEnd\Unit;
use App\Models\Supplier;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    //invoice
    public function invoice(){
        $invoice = Invoice::orderBy('date','desc')->orderBy('date','desc')->get();
        return view('backEnd.invoice.invoice',compact('invoice'));
    }
    //addInvoice
    public function addInvoice(){
        $Invoice = Invoice::where('date','desc')->first();
        if ($Invoice == null) {
            $firstReg = '0';
            $invoiceNo = $firstReg+1;
        }else {
            $Invoice = Invoice::where('date','desc')->first()->invoice_no;
            $invoiceNo = $Invoice+1;
        }
        $date = Date('Y-m-d');
        $category = Category::all();
        return view('backEnd.invoice.add-invoice',compact('invoiceNo','category','date'));
    }
}
