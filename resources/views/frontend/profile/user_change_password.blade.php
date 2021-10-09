@extends('frontend.main_master')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

{{-- @php
    $user=DB::table('users')->where('id',Auth::user()->id)->first();
@endphp --}}
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
                       <h3 class="text-center"><span class="text-danger">Change Password</span>

                    </h3>
                    <div class="card-body">
                      <form method="POST" action="{{ route('user.password.update')}}">
                        @csrf
                    	<div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">Current Password <span></span></label>
                            <input type="password" class="form-control unicase-form-control text-input"  name="oldpassword" id="oldpassword" >
                        </div>
                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">New Password <span></span></label>
                            <input type="password" class="form-control unicase-form-control text-input"  name="password" id="password"   >
                        </div>
                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">Confirm Password <span></span></label>
                            <input type="password" class="form-control unicase-form-control text-input"  name="password_confirmation" id="password_confirmation"   >
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
    {{-- <script>

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

</script> --}}
@endsection
