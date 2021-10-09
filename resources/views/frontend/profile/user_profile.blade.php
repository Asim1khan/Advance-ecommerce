@extends('frontend.main_master')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="body-content">
        <div class="container">
                <div class="row">
                    <br>
                    <div class="col-md-2">
<img id="showImage" class="card-img-top" style="border-radius:50%"
src="{{(!empty($user->profile_photo_path)) ? url ('upload/user_image/'.$user->profile_photo_path) :url('upload/no_image.jpg') }}
                " style="width: 100" height="100">
                <ul class="list-group list-group-flush">
                    <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm btn-block">Home</a>
                    <a href="{{ route('user.profile') }}" class="btn btn-primary btn-sm btn-block">Profile</a>
                    <a href="{{ route('user.change.password') }}" class="btn btn-primary btn-sm btn-block">Change Password</a>
                    <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">Log Out</a>


                </ul>
                    </div>
                    <div class="col-md-2">

                    </div>

                    <div class="col-md-6">
                      <div class="card">
                       <h3 class="text-center"><span class="text-danger">HI...</span>{{ Auth::user()->name }}
                    Update Youer Frofile
                    </h3>
                    <div class="card-body">
                      <form method="POST" action="{{ route('user.profile.store')}}" enctype="multipart/form-data">
                        @csrf
                    	<div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">name <span>*</span></label>
                            <input type="text" class="form-control unicase-form-control text-input"  name="name" value="{{ $user->name }}" >
                        </div>
                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">Email <span></span></label>
                            <input type="email" class="form-control unicase-form-control text-input"  name="email" value="{{ $user->email }}" >
                        </div>
                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">Picture <span></span></label>
                            <input type="file" class="form-control unicase-form-control text-input"  name="profile_photo_path" id="image" >
                        </div>
                        <div class="form-group">
                         <button class="btn btn-danger" type="submit">Update</button>
                        </div>

                      </form>
                    </div>
                      </div>
                    </div>

                </div>
        </div>

    </div>
    <script>

        $(document).ready(function()
        {
            $('#image').change(function(e)
            {
             var reader=new FileReader();
             reader.onload=function(e)
             {
                 $('#showImage').attr('src',e.target.result);
             }
             reader.readAsDataURL(e.target.files['0']);
            });
        });

</script>
@endsection
