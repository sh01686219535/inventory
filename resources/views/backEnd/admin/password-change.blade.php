@extends('backEnd.home.master')
@section('title')
Password Change
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-6 margin">
            <div class="card">
                <div class="card-body">
                  <form action="" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="old_password">Old Password</label>
                        <input type="password" id="old_password" name="password" class="form-control">
                    </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
