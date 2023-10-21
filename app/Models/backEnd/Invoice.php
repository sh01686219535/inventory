<?php

namespace App\Models\backEnd;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $guarded= [];
    public function payment(){
        return $this->belongsTo(Payment::class,'id','invoice_id');
    }
    public function invoiceDetails(){
        return $this->hasMany(InvoiceDetails::class,'invoice_id','id');
    }
    // public function invoiceDetails(){
    //     return $this->hasMany(InvoiceDetails::class,'invoice_id','id');
    // }
    // public function invoiceDetails(){
    //     return $this->hasMany(InvoiceDetails::class,'invoice_id','id');
    // }

}
