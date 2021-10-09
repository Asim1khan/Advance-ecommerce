<?php

namespace App\Http\Controllers\Frontend;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class IndexController extends Controller
{
    public function  index()
    {
        return view('frontend.index');
    }
    public function UserLogOut()
    {
        Auth::logout();
        return Redirect()->route('login');
    }

   public function UserProfile()
   {
       $id=Auth::user()->id;
        $user=User::find($id);
         return view('frontend.profile.user_profile',compact('user'));
   }
   public function UserProfileStore(Request $request)
   {

    $data=User::find(Auth::user()->id);
    $data->name=$request->name;
    $data->email=$request->email;
    if($request->file('profile_photo_path'))
    {
        $file=$request->file('profile_photo_path');
         @unlink(public_path('upload/user_image/'.$data->profile_photo_path));
        $filename=date('YmdHi').$file->getClientOriginalName();
       $file->move(public_path('upload/user_image'),$filename);
       $data['profile_photo_path']=$filename;

    }
  $data->save();
  $notification=array(
        'message' =>'User Profile Update Successfully ',
        'alert-type' =>'success'
  );

  return redirect()->route('dashboard')->with( $notification);
   }
   public function UserChangePassword()
   {
         $id=Auth::user()->id;
          $user= User::find($id);
          return view('frontend.profile.user_change_password',compact('user'));
   }
   public function UserPasswordUpdate(Request $request)
   {
       $validate=$request->validate([
           'oldpassword'=>'required',
           'password'=>'required|confirmed',
       ]);
          $hashpassword=Auth::user()->password;
     if(Hash::check($request->oldpassword, $hashpassword))
     {
        $user=User::find(Auth::id());
        $user->password= Hash::make($request->password);
        $user->save();
        return Redirect()->route('user.logout');
     }
     else
     {
        $notification=array(
            'message' =>'password Does not math ',
            'alert-type' =>'error'
      );
         return Redirect()->back()->with($notification);
     }
   }
}
