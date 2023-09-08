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
                            <label for="image">Image</label>
                            <input type="file" id="image" name="image" class="form-control my-1">
                        </div>
                        <div class="form-group my-2">
                        @if(!empty($user2->image))
                        <img class="roune-img" id="show-img" style="width:250px; height:150px" src="{{asset($user2->image)}}" alt="">
                        @else
                        <img id="show-img" style="width:250px; height:150px" src="{{asset('backEndAssets')}}/img.jpg" alt="">
                        @endif
                        <!-- <img class="roune-img" id="show-img" style="width:250px; height:150px" src="{{asset('backEndAssets')}}/assets/img/avatars/1.png" alt=""> -->
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
  $(document).ready(function () {
    $('#image').change(function (e) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#show-img').attr('src', e.target.result); 
        }
        reader.readAsDataURL(e.target.files[0]);
    });
});

</script>
@endsection