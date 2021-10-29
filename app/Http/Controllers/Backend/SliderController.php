<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Carbon;
use Image;
class SliderController extends Controller
{

    public function SliderView()
    {
        $sliders=Slider::latest()->get();
         return view('backend.slider.slider_view',compact('sliders'));
    }
    public function SliderStore(Request $request)
    {
            $request->validate([
                'slider_img'=>'required',

            ],
            [
                'slider_img.required'=>'Plese select image',
                    ] );
         $image=$request->file('slider_img');
         $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalName();
          Image::make($image)->resize(870,370)->save('upload/slider/'.$name_gen);
          $save_url='upload/slider/'.$name_gen;
          Slider::insert([
            'slider_img'=>$save_url,
            'title'=>$request->title,
            'description'=>$request->description,
            'created_at'=>Carbon::now(),
          ]);
          $notification = array(
            'message' => 'Product Data Add Successfully',
            'alert-type' => 'success' );
        return redirect()->back()->with($notification);
    }
    public function SliderInactive($id){
       Slider::findOrFail($id)->update([
           'status'=>0,
           'updated_at'=>Carbon::now()
        ]);
       $notification = array(
        'message' => 'Slider De Activated  Successfully',
        'alert-type' => 'success' );
    return redirect()->back()->with($notification);
    }

    public function SliderActive($id)
    {
        Slider::findOrFail($id)->update([
            'status'=>1,
            'updated_at'=>Carbon::now()

         ]);
        $notification = array(
         'message' => 'Slider Activated  Successfully',
         'alert-type' => 'success' );
     return redirect()->back()->with($notification);

    }
    public function SliderEdit($id)
    {
        $slider=Slider::findOrFail($id);
        return view('backend.slider.slider_edit',compact('slider'));
    }
    public function SliderUpdate(Request $request)
    {
             $slider_id=$request->id;
             $oldImg=$request->old_img;
             if($request->file('slider_img'))
             {
                 unlink($oldImg);
                 $image=$request->file('slider_img');
                 $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalName();
                  Image::make($image)->resize(870,370)->save('upload/slider/'.$name_gen);
                  $save_url='upload/slider/'.$name_gen;
                  Slider::findOrFail($slider_id)->update([
                    'slider_img'=>$save_url,
                    'title'=>$request->title,
                    'description'=>$request->description,
                    'updated_at'=>Carbon::now(),
                  ]);
                  $notification = array(
                    'message' => 'Slider Updated Successfully',
                    'alert-type' => 'info');
                return redirect()->route('manage-slider')->with($notification);

             }
             else
             {
                Slider::findOrFail($slider_id)->update([
                    'title'=>$request->title,
                    'description'=>$request->description,
                    'updated_at'=>Carbon::now(),
                  ]);
                  $notification = array(
                    'message' => 'Slider Update   Successfully with out Image ',
                    'alert-type' => 'success' );
                return redirect()->route('manage-slider')->with($notification);
             }

    }
       public function SliderDelete($id)
       {
              $oldImg=Slider::findOrFail($id);
                unlink($oldImg->slider_img);
                Slider::findOrFail($id)->delete();
                $notification = array(
                    'message' => 'Slider Delete   Successfully with  Image ',
                    'alert-type' => 'warning' );
                return redirect()->back()->with($notification);
       }
}
