@extends('backEnd.home.master')
@section('title')
Update Customer
@endsection
@section('content')
<div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-head">
              <div class="supplier-main mt-5">
                 <h3 class="m-3">Customer Update</h3>
                  <a class="btn btn-primary m-3" href="{{route('customer')}}">Customer Table</a>
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
                <form action="{{route('update.customer')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="customer_id" value="{{$customer->id}}">
                    <div class="form-group">
                      <label for="customer_name"><b>Customer Name</b></label>
                      <input type="text" id="customer_name" name="customer_name"value="{{$customer->customer_name}}" class="form-control my-2" placeholder="Enter Customer Name">
                    </div>
                    <div class="form-group">
                        <label for="customer_email"><b>Customer Email</b></label>
                        <input type="email" id="customer_email" name="customer_email" value="{{$customer->customer_email}}"class="form-control my-2" placeholder="Enter Customer Email">
                    </div>
                    <div class="form-group">
                        <label for="customer_phone"><b>Customer Phone Number</b></label>
                        <input type="text" id="customer_phone" name="customer_phone" value="{{$customer->customer_phone}}"class="form-control my-2" placeholder="Enter Customer Phone Number">
                    </div>
                    <div class="form-group">
                        <label for="customer_address"><b>Customer Address</b></label>
                        <input type="text" id="customer_address" name="customer_address" value="{{$customer->customer_address}}"class="form-control my-2" placeholder="Enter Customer Address">
                    </div>
                    <div class="form-group">
                        <label for="customer_image"><b>Customer Image</b></label>
                        <input type="file" id="customer_image" name="customer_image" class="form-control my-2">
                        <img id="show_image" src="{{asset($customer->customer_image)}}" style="height:80px;width:80px;border-radius:8px" alt="">
                    </div>
                    <input type="submit" class="btn btn-info mt-2" value="Submit">
                </form>
            </div>
        </div>
        </div>
      </div>
  </div>
@endsection
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {

        $('#customer_image').change(function (e) {
            var render = new FileReader();
            render.onload = function (e) {
                $('#show_image').attr('src',e.target.result);
            }
            render.readAsDataURL(e.target.files['0']);
        });
    });
</script>


