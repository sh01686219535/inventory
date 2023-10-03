@extends('backEnd.home.master')
@section('title')
Admin Edit Profile
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-6 margin-1">
            <div class="card">
                <div class="card-head">
                     <h4 class="text-center mt-3">Admin Edit Profile</h4>
                </div>
                <div class="card-body">
                    <form action="{{route('store.profile')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" value="{{ $user2->name}}" placeholder="Enter Your Name" class="form-control my-1">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" value="{{ $user2->email}}" placeholder="Enter Your Email" class="form-control my-1">
                        </div>
                        <div class="form-group">
                            <label for="Image">Image</label>
                            <input type="file" id="Image" name="image" class="form-control my-1">
                        </div>
                        <div class="form-group">
                            <label for="Image-show"></label>
                            @if($user2->image)
                            <img id="showImage" src="{{asset($user2->image)}}" id="Image-show" class="rounded avater-lg my-2" style="width:100px; height:100px;" alt="">
                            @else 
                            <img id="showImage" src="{{asset('backEndAssets')}}/img.jpg" id="Image-show" class="rounded avater-lg my-2" style="width:100px; height:100px;" alt="">
                            @endif
                        </div>
                        <input type="submit" value="Submit" class="my-2 btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        $('#Image').change(function (e) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
@endsection