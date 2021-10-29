<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\Catagory;
use Illuminate\Http\Request;
use App\Models\SubCatagory;
class SubCatagoryController extends Controller
{
public function SubCatagoryView()
{
    $catagorys=Catagory::orderBy('catagory_name_eng','ASC')->get();
  $subcatagorys=SubCatagory::latest()->get();

    return view('backend.catagory.sub_catagory_view',compact('subcatagorys','catagorys'));
}
public function SubCatagoryStore(Request $request)
{
   $request->validate([
    'catagory_id'=>'required',
    'sub_catagory_name_eng'=>'required',
    'sub_catagory_name_urdu'=>'required',

   ]);
    SubCatagory::insert([
        'catagory_id'=>$request->catagory_id,
        'sub_catagory_name_eng'=>$request->sub_catagory_name_eng,
        'sub_catagory_name_urdu'=>$request->sub_catagory_name_urdu,
        'sub_catagory_slug_eng'=>strtolower(str_replace(' ', '-',$request->sub_catagory_name_eng)),
        'sub_catagory_slug_urdu'=>str_replace(' ', '-',$request->sub_catagory_name_urdu),
         'created_at'=>now(),
    ]);
    $notification=array(
        'message' =>'Sub Catagory  Add  Successfully ',
        'alert-type' =>'success'
  );
  return Redirect()->back()->with($notification);
}
public function SubCatagoryEdit($id)
{
    $catagorys=Catagory::orderBy('catagory_name_eng','ASC')->get();
    $subcatagory=SubCatagory::findOrFail($id);
    return view('backend.catagory.sub_catagory_edit',compact('subcatagory','catagorys'));
}
public function SubCatagoryUpdate(Request $request)
{
    $id=$request->id;
      SubCatagory::findOrFail($id)->update([
        'catagory_id'=>$request->catagory_id,
        'sub_catagory_name_eng'=>$request->sub_catagory_name_eng,
        'sub_catagory_name_urdu'=>$request->sub_catagory_name_urdu,
        'sub_catagory_slug_eng'=>strtolower(str_replace(' ', '-',$request->sub_catagory_name_eng)),
        'sub_catagory_slug_urdu'=>str_replace(' ', '-',$request->sub_catagory_name_urdu),
      ]);
      $notification=array(
        'message' =>'Sub Catagory Update  Successfully ',
        'alert-type' =>'success'
  );
  return Redirect()->route('all.subcatagory')->with($notification);
}
public function SubCatDelete($id){

    SubCatagory::findOrFail($id)->delete();
    $notification = array(
        'message' => 'SubCategory Deleted Successfully',
        'alert-type' => 'info'
    );

    return redirect()->back()->with($notification);
}
}
