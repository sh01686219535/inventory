@extends('backEnd.home.master')
@section('title')
Password Change
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8 margin-1">
            <div class="card">
            <div class="card-head">
                     <h4 class="text-center mt-3">Admin Password Change</h4>
                </div>
                @include('backEnd.error')
                <div class="card-body">
                  <form action="{{route('update.password')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="old_password">Old Password</label>
                        <input type="password" id="old_password" name="oldPassword" placeholder="Old Password" class="form-control my-2">
                    </div>
                    <div class="form-group">
                        <label for="new_password">New Password</label>
                        <input type="password" id="new_password" name="newPassword" placeholder="Old Password" class="form-control my-2">
                    </div>
                    <div class="form-group">
                        <label for="con_password">Comfirm Password</label>
                        <input type="password" id="con_password" name="confirmPassword" placeholder="Old Password" class="form-control my-2">
                    </div>
                    <input type="submit" value="Password Change" class="btn btn-primary">
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
