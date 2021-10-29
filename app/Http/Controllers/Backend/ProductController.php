<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Catagory;
use App\Models\MultiImg;
use App\Models\Product;
use App\Models\SubCatagory;
use App\Models\SubSubCatagory;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Image;
class ProductController extends Controller
{
    public function AddProduct()
    {
         $brands=Brand::latest()->get();
         $categories=Catagory::latest()->get();
           return view('backend.product.product_add',compact('brands','categories'));
    }
    public function StoreProduct(Request $request)
    {


        $image=$request->file('product_thambnail');
        $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalName();
        Image::make($image)->resize(917,1000)->save('upload/product/thambnil/'.$name_gen);
    $save_url='upload/product/thambnil/'.$name_gen;
        $product_id=Product::insertGetId([
        'brand_id'=>$request->brand_id,
        'category_id'=>$request->category_id,
        'subcategor_id'=>$request->subcategor_id,
        'subsubcategory_id'=>$request->subsubcategory_id,
        'product_name_eng'=>$request->product_name_eng,
        'product_name_urdu'=>$request->product_name_urdu,
        'product_slug_eng'=> strtolower(str_replace(' ','-',$request->product_name_eng) ),
        'product_slug_urdu'=>str_replace(' ','-',$request->product_name_urdu),
        'product_code'=>$request->product_code,
        'product_qty'=>$request->product_qty,
        'product_tag_eng'=>$request->product_tag_eng,
        'product_tag_urdu'=>$request->product_tag_urdu,
        'product_size_eng'=>$request->product_size_eng,
        'product_size_urdu'=>$request->product_size_urdu,
       'product_color_eng'=>$request->product_color_eng,
       'product_color_urdu'=>$request->product_color_urdu,
       'selling_price'=>$request->selling_price,
       'discount_price'=>$request->discount_price,
       'short_descp_eng'=>$request->short_descp_eng,
       'short_descp_urdu'=>$request->short_descp_urdu,
       'long_descp_eng'=>$request->long_descp_eng,
       'long_descp_urdu'=>$request->long_descp_urdu,
       'product_thambnail'=>$save_url,
       'hot_deals'=>$request->hot_deals,
       'featured'=>$request->featured,
       'special_offer'=>$request->special_offer,
       'special_deals'=>$request->special_deals,
       'status'=>1,
    'created_at'=>Carbon::now(),

        ]);
        //for multiple image
        $imges=$request->file('multi_imag');
        foreach($imges as $img)
        {
            $make_name=hexdec(uniqid()).'.'.$img->getClientOriginalName();
            Image::make($img)->resize(917,1000)->save('upload/product/multi-img/'.$make_name);
        $uplodPath='upload/product/multi-img/'.$make_name;
          MultiImg::insert([
              'product_id'=>$product_id,
              'photo_name'=>$uplodPath,
              'created_at'=>Carbon::now(),
          ]);
    }
    $notification = array(
        'message' => 'Product Data Add Successfully',
        'alert-type' => 'success' );
    return redirect()->route('manage-product')->with($notification);

    }
    public function ManageProduct()
    {
       $products=Product::latest()->get();
       return view('backend.product.product_view',compact('products'));
    }
    public function EditProduct($id)
    {
        $multimges=MultiImg::where('product_id',$id)->get();
        $brands=Brand::latest()->get();
       $catagories=Catagory::latest()->get();
       $subcatagories=SubCatagory::latest()->get();
       $subsubcatagories=SubSubCatagory::latest()->get();
       $product=Product::findOrFail($id);
        return view('backend.product.product_edit',compact('brands','catagories','subcatagories','subsubcatagories','product','multimges'));

    }
    public function UpdateProduct(Request $request)
    {
            $product_id=$request->id;
                  Product::findOrFail($product_id)->update([
                'brand_id'=>$request->brand_id,
                'category_id'=>$request->category_id,
                'subcategor_id'=>$request->subcategor_id,
                'subsubcategory_id'=>$request->subsubcategory_id,
                'product_name_eng'=>$request->product_name_eng,
                'product_name_urdu'=>$request->product_name_urdu,
                'product_slug_eng'=> strtolower(str_replace(' ','-',$request->product_name_eng) ),
                'product_slug_urdu'=>str_replace(' ','-',$request->product_name_urdu),
                'product_code'=>$request->product_code,
                'product_qty'=>$request->product_qty,
                'product_tag_eng'=>$request->product_tag_eng,
                'product_tag_urdu'=>$request->product_tag_urdu,
                'product_size_eng'=>$request->product_size_eng,
                'product_size_urdu'=>$request->product_size_urdu,
               'product_color_eng'=>$request->product_color_eng,
               'product_color_urdu'=>$request->product_color_urdu,
               'selling_price'=>$request->selling_price,
               'discount_price'=>$request->discount_price,
               'short_descp_eng'=>$request->short_descp_eng,
               'short_descp_urdu'=>$request->short_descp_urdu,
               'long_descp_eng'=>$request->long_descp_eng,
               'long_descp_urdu'=>$request->long_descp_urdu,
               'hot_deals'=>$request->hot_deals,
               'featured'=>$request->featured,
               'special_offer'=>$request->special_offer,
               'special_deals'=>$request->special_deals,
               'status'=>1,
            'updated_at'=>Carbon::now(),

                ]);
                $notification = array(
                    'message' => 'Product Data update without Image Successfully',
                    'alert-type' => 'success' );
                return redirect()->route('manage-product')->with($notification);
        }
        // for multiple image
        public function UpdateProductImg(Request $request)
        {
                   $images=$request->multi_img;
                   foreach($images as $id =>$img)
                  {
                    $imgDel=MultiImg::findOrFail($id);
                     unlink($imgDel->photo_name);
                     $make_name=hexdec(uniqid()).'.'.$img->getClientOriginalName();
                     Image::make($img)->resize(917,1000)->save('upload/product/multi-img/'.$make_name);
                      $uplodpath='upload/product/multi-img/'.$make_name;
                     MultiImg::where('id',$id)->update([
                     'photo_name'=>$uplodpath,
                    'updated_at'=>Carbon::now(),
                   ]);

                }
                $notification = array(
                    'message' => 'Product Data Add Successfully',
                    'alert-type' => 'info' );
                return redirect()->back()->with($notification);

        }

        public function UpdateProductThumbnil(Request $request)
        {
                if($request->file('product_thambnail')){
                  $id=$request->id;
                  $oldimg=$request->old_image;

                  unlink($oldimg);
                  $image=$request->file('product_thambnail');
                  $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalName();
                  Image::make($image)->resize(917,1000)->save('upload/product/thambnil/'.$name_gen);
                 $save_url='upload/product/thambnil/'.$name_gen;
                 Product::findOrFail($id)->update([
                    'product_thambnail'=>$save_url,
                   'updated_at'=>Carbon::now(),
                 ]);
                }
                 $notification = array(
                    'message' => 'Product Data update without Image Successfully',
                    'alert-type' => 'success' );
                return redirect()->route('manage-product')->with($notification);

        }
             public function DeleteProductMultiImage( $id)
             {

                 $oldimg=MultiImg::findOrFail($id);
                 $path='upload/product/thambnil/'.$oldimg->photo_name;
                 if(is_file($path)){

                 unlink($oldimg->photo_name);
                 MultiImg::findOrFail($id)->delete();}
                 $notification = array(
                    'message' => 'Product Data delte  Image Successfully',
                    'alert-type' => 'success' );

                return redirect()->route('manage-product')->with($notification);
             }

            //  for active function
            public function ProductInactive($id)
            {
                                Product::findOrFail($id)->update(['status'=>0]);
                                $notification = array(
                                    'message' => 'Prod In Activ  Successfully',
                                    'alert-type' => 'success' );
                                return redirect()->route('manage-product')->with($notification);
            }
        //  for inactive
        public function ProductActive($id)
        {
            Product::findOrFail($id)->update(['status'=>1]);
            $notification = array(
                'message' => 'Prod  Activ  Successfully',
                'alert-type' => 'success' );
            return redirect()->route('manage-product')->with($notification);
        }
        public function ProductDelete($id)
        {
            $product=Product::findOrFail($id);
            unlink($product->product_thambnail);
            $image=MultiImg::where('product_id',$id)->get();
            foreach($image as $img)
            {
               $path='upload/product/multi-img/'.$img->photo_name;
                unlink( $path);
            }
            Product::findOrFail($id)->delete();
            $notification = array(
                'message' => 'Prod product Delte successfully',
                'alert-type' => 'success' );
            return redirect()->back()->with($notification);
        }
}
