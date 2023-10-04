<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SupplierController extends Controller
{
    //supplier
    public function supplier(){
        return view('backEnd.supplier.supplier');
    }
}
