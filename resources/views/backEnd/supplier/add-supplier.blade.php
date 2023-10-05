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
              <div class="supplier-main mt-5">
                 <h3 class="m-3">Supplier Create</h3>
                  <a class="btn btn-primary m-3" href="{{route('supplier')}}">Supplier Table</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-3 mb-5">
        @include('backEnd.error')
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                <form action="{{route('save.supplier')}}" method="post">
                    @csrf
                    <div class="form-group">
                      <label for="supplier_name"><b>Supplier Name</b></label>
                      <input type="text" id="supplier_name" name="supplier_name" class="form-control my-2" placeholder="Enter Supplier Name">
                    </div>
                    <div class="form-group">
                        <label for="supplier_email"><b>Supplier Email</b></label>
                        <input type="email" id="supplier_email" name="supplier_email" class="form-control my-2" placeholder="Enter Supplier Email">
                    </div>
                    <div class="form-group">
                        <label for="supplier_phone"><b>Supplier Phone Number</b></label>
                        <input type="text" id="supplier_phone" name="supplier_phone" class="form-control my-2" placeholder="Enter Supplier Phone Number">
                    </div>
                    <div class="form-group">
                        <label for="supplier_address"><b>Supplier Address</b></label>
                        <input type="text" id="supplier_address" name="supplier_address" class="form-control my-2" placeholder="Enter Supplier Address">
                    </div>
                    <input type="submit" class="btn btn-info" value="Submit">
                </form>
            </div>
        </div>
        </div>
      </div>
  </div>
@endsection

