@extends('backEnd.home.master')
@section('title')
Invoice
@endsection
@section('content')
  <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-head">
              <h2 class="text-center my-5">Print Invoice</h2>
              <div class="supplier-main">
                 <a class="btn btn-primary m-3" href="{{route('add.invoice')}}"><i class="fas fa-plus-circle"></i>Add Invoice</a>
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
                         <th>Data</th>
                         <th>Description</th>
                         <th>Amount</th>
                         <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                      @php $i = 1 @endphp
                     @foreach ($invoice as $item)
                     <tr>
                       <td>{{$i++}}</td>
                       <td>{{$item['payment']['customer']['customer_name']}}</td>
                       {{-- <td>{{$item->purchase_no}}</td> --}}
                       <td>{{$item->invoice_no}}</td>
                       <td>{{$item->date}}</td>
                       <td>{{$item->description}}</td>
                       <td>{{$item['payment']['total_amount']}}</td>
                       <td>
                        <a href="{{route('invoice.print.page',$item->id)}}" class="btn btn-danger m-1"><i class="fas fa-print"></i></a>
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

