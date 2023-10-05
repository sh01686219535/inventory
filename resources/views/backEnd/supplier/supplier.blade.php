@extends('backEnd.home.master')
@section('title')
Supplier
@endsection
@section('content')
  <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-head">
              <h2 class="text-center my-5">Supplier Table</h2>
              <div class="supplier-main">
                 <a class="btn btn-primary m-3" href="{{route('add.supplier')}}">Add Supplier</a>
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
                          <th>Action</th>
                         </tr>
                      </thead>
                      <tbody>
                      @php $i = 0 @endphp
                      @foreach ($supplier as $suppliers)
                      <tr>
                        <td>{{$i++}}</td>
                        <td>{{$suppliers->supplier_name}}</td>
                        <td>{{$suppliers->supplier_email}}</td>
                        <td>{{$suppliers->supplier_phone}}</td>
                        <td>{{$suppliers->supplier_address}}</td>
                        <td>
                            <a href="{{route('edit.supplier',$suppliers->id)}}" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a href="{{route('delete.supplier',$suppliers->id)}}" onclick="return confirm('are you sure delete this')" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></a>

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
