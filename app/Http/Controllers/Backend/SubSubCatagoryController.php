<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Catagory;
use App\Models\SubCatagory;
use App\Models\SubSubCatagory;
class SubSubCatagoryController extends Controller
{

    public function SubSubCatagoryView()
    {

          $catagorys=Catagory::orderBy('catagory_name_eng','ASC')->get();
         $subsubcatagory=SubSubCatagory::latest()->get();
            return view('backend.subsubcatagory.subsubcatagory_view',compact('catagorys','subsubcatagory'));
        }
        public function GetSubCategory($category_id)
        {
$subcat=SubCatagory::where('catagory_id',$category_id)->orderBy('sub_catagory_name_eng','ASC')->get();
return json_encode($subcat);

        }
        //product page function
public function GetSubSubCatagory($subcategor_id)
{
    $subsubcat=SubSubCatagory::where('subcatagory_id',$subcategor_id)->orderBy('subsubcatagory_name_eng','ASC')->get();
    return json_encode($subsubcat);
}
        public function SubSubCatagoryStore(Request $request)
        {

      SubSubCatagory::insert([
          'catagory_id'=>$request->category_id,
          'subcatagory_id'=>$request->subcatagory_id,
          'subsubcatagory_name_eng'=>$request->subsubcategory_name_eng,
          'subsubcatagory_name_urdu'=>$request->subsubcategory_name_urdu,
          'subsubcatagory_slug_eng'=>strtolower(str_replace(' ', '-',$request->subsubcategory_name_eng) ),
          'subsubcatagory_slug_urdu'=>str_replace(' ', '-',$request->subsubcategory_name_urdu),
      ]);
      $notification=array(
        'message' =>'Sub Catagory  Add  Successfully ',
        'alert-type' =>'success'
  );
  return Redirect()->back()->with($notification);

        }
        public function SubSubCatagoryEdit($id)
        {
            $catagorys=Catagory::orderBy('catagory_name_eng','ASC')->get();
            $subcatagorys=SubCatagory::orderBy('sub_catagory_name_eng','ASC')->get();
            $subsubcatagorys=SubSubCatagory::findOrFail($id);
            // dd($subsubcatagorys);
            return view('backend.subsubcatagory.subsubcatagory_edit',compact('catagorys','subcatagorys','subsubcatagorys'));
        }
        public function SubSubCatagoryUpdate(Request $request)
        {
            $subsubcata_id=$request->id;
            SubSubCatagory::findOrFail($subsubcata_id)->update([
                'catagory_id'=>$request->category_id,
                'subcatagory_id'=>$request->subcatagory_id,
                'subsubcatagory_name_eng'=>$request->subsubcategory_name_eng,
                'subsubcatagory_name_urdu'=>$request->subsubcategory_name_urdu,
                'subsubcatagory_slug_eng'=>strtolower(str_replace(' ', '-',$request->subsubcategory_name_eng) ),
                'subsubcatagory_slug_urdu'=>str_replace(' ', '-',$request->subsubcategory_name_urdu),
            ]);
            $notification=array(
              'info' =>'Sub Catagory  Update  Successfully ',
              'alert-type' =>'success'
        );
        return Redirect()->route('all.subsubcatagory')->with($notification);

        }
        public function SubSubCatagooryDelete($id)
        {
            SubSubCatagory::findOrFail($id)->delete();
            $notification = array(
                'message' => 'SubCategory Deleted Successfully',
                'alert-type' => 'info'
            );

            return redirect()->back()->with($notification);

        }
}
