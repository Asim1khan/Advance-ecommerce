@extends('frontend.main_master')
@section('content')
    <div class="body-content">
        <div class="container">
                <div class="row">
                    <div class="col-md-2">
<img class="card-img-top" style="border-radius:50%"
src="{{(!empty($user->profile_photo_path)) ? url ('upload/user_image/'.$user->profile_photo_path) :url('upload/no_image.jpg') }}
                " style="width: 100%" height="100%">
                   <br>
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
                      wellcome Easy Online Shop
                    </h3>
                      </div>
                    </div>

                </div>
        </div>

    </div>
@endsection
