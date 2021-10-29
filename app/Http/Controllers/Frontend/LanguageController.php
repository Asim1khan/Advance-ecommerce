<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Product;
class LanguageController extends Controller
{
    public function UrduLanguage()
    {
       session()->get('language');
        session()->forget('language');
        Session::put('language','urdu');
      return redirect()->back();
    }
    public function EnglishLanguage()
    {
        session()->get('language');
        session()->forget('language');
        Session::put('language','english');
      return redirect()->back();
    }
    public function ProductDetails($id){
      $details=Product::findOrFail($id);
        return view('frontend.product.product_detil');
    }
}
