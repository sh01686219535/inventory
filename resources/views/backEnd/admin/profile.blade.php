@extends('backEnd.home.master')
@section('title')
Admin Profile
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-6 margin">
            <div class="card">
                <div class="card-body">
                    @if(!empty($user1->image))
                        <img class="rounded-circle" style="width:150px; height:150px" 
                        src="{{asset($user1->image)}}" alt="">
                    
                    @else
                        <img class="rounded-circle" style="width:150px; height:150px" 
                        src="{{asset('backEndAssets')}}/img.jpg" alt="">
                    @endif
                    <p class="h4"><b>Name :</b> {{$user1->name}}</p><hr>
                    <p><b>Email :</b> {{$user1->email}}</p><hr>
                    <a href="{{route('edit.profile',$user1->id)}}" class="btn btn-primary">Edit Profile</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
