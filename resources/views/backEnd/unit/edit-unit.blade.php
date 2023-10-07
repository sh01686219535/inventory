@extends('backEnd.home.master')
@section('title')
Edit Unit
@endsection
@section('content')
<div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-head">
              <div class="supplier-main mt-5">
                 <h3 class="m-3">Unit Update</h3>
                  <a class="btn btn-primary m-3" href="{{route('unit')}}">Unit Table</a>
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
                <form action="{{route('update.unit')}}" method="post">
                    @csrf
                    <input type="hidden" name="unit_id" value="{{$unit->id}}">
                    <div class="form-group">
                      <label for="unit_name"><b>Unit Name</b></label>
                      <input type="text" id="unit_name" name="unit_name" value="{{$unit->unit_name}}"class="form-control my-2" placeholder="Enter Unit Name">
                    </div>
                    <input type="submit" class="btn btn-info" value="Submit">
                </form>
            </div>
        </div>
        </div>
      </div>
  </div>
@endsection


