@extends('backEnd.home.master')
@section('title')
Credit Customer
@endsection
@section('content')
  <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-head">
              <h2 class="text-center my-5">Customer Credit Table</h2>
              <div class="supplier-main">
                 <a class="btn btn-primary m-3" href="{{route('credit.customer.pdf.prnit')}}" target="_blank"><i class="fas fa-print"></i>Credit Customer Print</a>
                 <div class="search-supplier m-3">
                  <form action="" method="post" class="supplier-form">
                    @csrf
                    <input type="text" placeholder="Search.." name="search2">
                    <button type="submit"><i class="fa fa-search"></i></button>
                  </form>
                 </div>
              </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-hover table-bordered">
                      <thead>
                         <tr>
                          <th>Sl</th>
                          <th>Customer Name</th>
                          <th>Invoice No</th>
                          <th>Date</th>
                          <th>Due Amount</th>
                          <th>Action</th>
                         </tr>
                      </thead>
                      <tbody>
                      @php $i = 1 @endphp
                      @foreach ($payment as $payments)
                      <tr>
                        <td>{{$i++}}</td>
                        <td>{{$payments['customer']['customer_name']}}</td>
                        <td>{{$payments['invoice']['invoice_no']}}</td>
                        <td>{{$payments['invoice']['date']}}</td>
                        <td>{{$payments->due_amount}}</td>
                        <td>
                            <a href="{{route('edit.customer.invoice',$payments->invoice_id)}}" class="btn btn-primary btn-weight"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a href="{{route('customer.invoice.details.pdf',$payments->invoice_id)}}"  class="btn btn-danger btn-weight"><i class="fa-solid fa-eye"></i></a>
                        </td>
                      </tr>
                      @endforeach
                      </tbody>
                  </table>
                </div>
            </div>
          </div>
        </div>
      </div>
  </div>

@endsection
