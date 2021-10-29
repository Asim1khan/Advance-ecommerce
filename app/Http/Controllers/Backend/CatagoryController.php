<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Catagory;
class CatagoryController extends Controller
{

    public function CatagoryView()
    {
         $catagorys=Catagory::latest()->get();
         return view('backend.catagory.catagory_view',compact('catagorys'));
    }
    public function CatagoryStore(Request $request)
    {
        $request->validate([
            'catagory_name_eng'=>'required',
            'catagory_name_urdu'=>'required',
            'catagory_icon'=>'required',

        ],
        [
            'catagory_name_eng.required'=>'Catagory English name is required',
            'catagory_name_urdu.required'=>'Catagory Urdu name is required',
            'catagory_icon.required'=>'Catagory icon is required',]);
            Catagory::insert([
                'catagory_name_eng'=>$request->catagory_name_eng,
                'catagory_name_urdu'=>$request->catagory_name_urdu,
                'catagory_slug_eng'=>strtolower(str_replace(' ', '-',$request->catagory_name_eng)),
                'catagory_slug_urdu'=>str_replace(' ','-',$request->catagory_name_urdu),
                 'catagory_icon'=>$request->catagory_icon,
            ]);
            $notification=array(
                'message' =>'Brand  Add  Successfully ',
                'alert-type' =>'success'
          );
          return Redirect()->back()->with($notification);
        }
        public function CatagoryEdit(Request $request)
        {
           $id=$request->id;
            $catagory=Catagory::findOrFail( $id);
               return view('backend.catagory.catagory_edit',compact('catagory'));
        }
        public function CatagoryUpdate(Request $request)
        {
              $catagory_id=$request->id;
               Catagory::findOrFail($catagory_id)->update([
                'catagory_name_eng'=>$request->catagory_name_eng,
                'catagory_name_urdu'=>$request->catagory_name_urdu,
                'catagory_slug_eng'=>strtolower(str_replace(' ', '-',$request->catagory_name_eng)),
                'catagory_slug_urdu'=>str_replace(' ','-',$request->catagory_name_urdu),
                   'catagory_icon'=>$request->catagory_icon,
                   'updated_at'=>now(),
               ]);
               $notification=array(
                'message' =>'Brand  Update  Successfully ',
                'alert-type' =>'warning'
          );
          return Redirect()->route('all.catagory')->with($notification);
        }

        public function CatagoryDelete($id)
        {
     Catagory::findOrFail($id)->delete();
     $notification=array(
        'message' =>'Brand  Delete  Successfully ',
        'alert-type' =>'error'
  );
     return redirect()->back()->with($notification);

        }
}
