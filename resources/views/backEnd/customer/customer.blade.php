@extends('backEnd.home.master')
@section('title')
Customer
@endsection
@section('content')
  <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-head">
              <h2 class="text-center my-5">Customer Table</h2>
              <div class="supplier-main">
                 <a class="btn btn-primary m-3" href="{{route('add.customer')}}"><i class="fas fa-plus-circle"></i>Add Customer</a>
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
                          <th>Name</th>
                          <th>Email</th>
                          <th>Phone</th>
                          <th>Address</th>
                          <th>Image</th>
                          <th>Action</th>
                         </tr>
                      </thead>
                      <tbody>
                      @php $i = 1 @endphp
                      @foreach ($customer as $customers)
                      <tr>
                        <td>{{$i++}}</td>
                        <td>{{$customers->customer_name}}</td>
                        <td>{{$customers->customer_email}}</td>
                        <td>{{$customers->customer_phone}}</td>
                        <td>{{Str::limit($customers->customer_address,10)}}</td>
                        <td>
                            <img src="{{asset($customers->customer_image)}}" style="height:50px;width:50px" alt="">
                        </td>
                        <td>
                            <a href="{{route('edit.customer',$customers->id)}}" class="btn btn-primary btn-weight"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a href="{{route('delete.customer',$customers->id)}}" id="delete" class="btn btn-danger btn-weight"><i class="fa-solid fa-trash-can"></i></a>

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
