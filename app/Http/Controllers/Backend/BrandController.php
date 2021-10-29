<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Facades\Redirect;
use Image;
class BrandController extends Controller
{
   public function BrandView()
   {

     $brands=Brand::latest()->get();
      return view('backend.brand.brand_view',compact('brands'));
    }
      public function BrandStore(Request $request)
      {
          $request->validate([
              'brand_name_eng'=>'required',
              'brand_name_urdu'=>'required',
              'brand_image'=>'required',
          ],
          [
            'brand_name_eng.required'=>'Brand English name is required',
            'brand_name_urdu.required'=>'Brand Urdu Name is required',
            'brand_image.required'=>'Brand Image is required',
          ]
        );
         $image=$request->file('brand_image');
         $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalName();
         Image::make($image)->resize(300,300)->save('upload/brand/'.$name_gen);
     $save_url='upload/brand/'.$name_gen;
     Brand::insert([
        'brand_name_eng'=>$request->brand_name_eng,
        'brand_name_urdu'=>$request->brand_name_urdu,
        'brand_slug_eng'=>strtolower(str_replace(' ', '-',$request->brand_name_eng)),
        'brand_slug_urdu'=>str_replace(' ','-',$request->brand_name_urdu),
        'brand_image'=>$save_url,

     ]);
     $notification=array(
        'message' =>'Brand  Add  Successfully ',
        'alert-type' =>'success'
  );
  return Redirect()->back()->with($notification);
      }
      public function BrandEdit($id)
      {
          $brand=Brand::findOrFail($id);

     return view('backend.brand.brand_edit',compact('brand'));
      }
        public function BrandUpdate(Request $request)
        {
                  $brand_id=$request->id;
                  $old_img=$request->old_image;
                   if($request->file('brand_image'))
                   {
                       unlink($old_img);
                    $image=$request->file('brand_image');
                    $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalName();
                    Image::make($image)->resize(300,300)->save('upload/brand/'.$name_gen);
                $save_url='upload/brand/'.$name_gen;
                Brand::findOrFail($brand_id)->update([
                   'brand_name_eng'=>$request->brand_name_eng,
                   'brand_name_urdu'=>$request->brand_name_urdu,
                   'brand_slug_eng'=>strtolower(str_replace(' ', '-',$request->brand_name_eng)),
                   'brand_slug_urdu'=>str_replace(' ','-',$request->brand_name_urdu),
                   'brand_image'=>$save_url,

                ]);
                $notification=array(
                   'message' =>'Brand  Update with   Image Successfully ',
                   'alert-type' =>'info'
             );
             return Redirect()->route('all.brand')->with($notification);

                   }
                   else
                   {
                    Brand::findOrFail($brand_id)->update([
                        'brand_name_eng'=>$request->brand_name_eng,
                        'brand_name_urdu'=>$request->brand_name_urdu,
                        'brand_slug_eng'=>strtolower(str_replace(' ', '-',$request->brand_name_eng)),
                        'brand_slug_urdu'=>str_replace(' ','-',$request->brand_name_urdu),

                     ]);
                     $notification=array(
                        'message' =>'Brand  Update with out Image Successfully ',
                        'alert-type' =>'info'
                  );
                  return Redirect()->route('all.brand')->with($notification);

                   }


        }
        public function BrandDelete($id)
        {
              $brand=Brand::findOrFail($id);
             $img=$brand->brand_image;
                unlink($img);
                  Brand::findOrFail($id)->delete();
                  $notification=array(
                    'message' =>'Brand  Delete Successfully ',
                    'alert-type' =>'success'
              );
              return Redirect()->back()->with($notification);

            }
}
