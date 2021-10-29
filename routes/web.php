<?php
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CatagoryController;
use App\Http\Controllers\Backend\SubCatagoryController;
use App\Http\Controllers\Backend\SubSubCatagoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\LanguageController;
use App\Models\SubCatagory;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

 Route::group(['prefix'=>'admin','middleware'=>['admin:admin']], function(){

    Route::get('/login',[AdminController::class,'loginForm']);
Route::post('/login',[AdminController::class,'store'])->name('admin.login');
 });
 Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.index');
})->name('dashboard')->middleware('auth:admin');

Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
   $id=Auth::user()->id;
   $user=User::find($id);
    return view('dashboard',compact('user'));
})->name('dashboard');

   Route::middleware(['auth:admin'])->group(function(){
//Admin Routes
Route::get('/admin/logout/',[AdminController::class,'destroy'])->name('admin.logout');
Route::get('/admin/profile/',[AdminProfileController::class,"AdminProfile"])->name('admin.profile');
Route::get('/admin/profile/edit',[AdminProfileController::class,'AdminProfileEdit'])->name('admin.profile.edit');
Route::post('/admin/profile/store',[AdminProfileController::class,'AdminProfileStore'])->name('admin.profile.store');
Route::get('/admin/change/password/',[AdminProfileController::class,'AdminChangePassword'])->name('admin.change.password');
Route::post('admin/update/password/',[AdminProfileController::class,'AdminUpdateChangePassword'])->name('admin.update.password');

// Admin Catagory Routes
Route::prefix('catagory')->group(function()
{
    Route::get('view/',[CatagoryController::class,'CatagoryView'])->name('all.catagory');
    Route::post('store/',[CatagoryController::class,'CatagoryStore'])->name('catagory.store');
    Route::get('edit/{id}',[CatagoryController::class,'CatagoryEdit'])->name('catagory.edit');
    Route::post('update/',[CatagoryController::class,'CatagoryUpdate'])->name('catagory.update');
    Route::get('delete/{id}',[CatagoryController::class,'CatagoryDelete'])->name('catagory.delete');
    //admin subCatagory
    Route::get('/sub/view',[SubCatagoryController::class,'SubCatagoryView'])->name('all.subcatagory');
   Route::post('/sub/store',[SubCatagoryController::class,'SubCatagoryStore'])->name('subcatagory.store');
 Route::get('/sub/edit/{id}',[SubCatagoryController::class,'SubCatagoryEdit'])->name('subcatagory.edit');
Route::post('/sub/update/',[SubCatagoryController::class,'SubCatagoryUpdate'])->name('subcatagory.update');
Route::get('/sub/delete/{id}',[SubCatagoryController::class,'SubCatDelete'])->name('subcatagory.delete');
//admin subsubcatagory
Route::get('/sub/sub/view/',[SubSubCatagoryController::class,'SubSubCatagoryView'])->name('all.subsubcatagory');
 Route::get('/subcategory/ajax/{category_id}',[SubSubCatagoryController::class, 'GetSubCategory']);

 Route::get('/sub-subcategory/ajax/{subcategor_id}',[SubSubCatagoryController::class,'GetSubSubCatagory']);
 Route::post('/sub/sub/store/',[SubSubCatagoryController::class,'SubSubCatagoryStore'])->name('subsubcatagory.store');
Route::get('/sub/sub/edit/{id}',[SubSubCatagoryController::class,'SubSubCatagoryEdit'])->name('subsubcatagory.edit');
Route::post('/sub/sub/update/',[SubSubCatagoryController::class,'SubSubCatagoryUpdate'])->name('subsubcatagory.update');
Route::get('/sub/sub/delete/{id}',[SubSubCatagoryController::class,'SubSubCatagooryDelete'])->name('subsubcatagory.delete');
});

//admin Add product
Route::prefix('product')->group(function()
{
Route::get('/add',[ProductController::class,'AddProduct'])->name('add.product');
Route::post('store/',[ProductController::class,'StoreProduct'])->name('product.store');
Route::get('manage/',[ProductController::class,'ManageProduct'])->name('manage-product');
Route::get('edit/{id}',[ProductController::class,'EditProduct'])->name('product.edit');
Route::post('/data/update/',[ProductController::class,'UpdateProduct'])->name('product.update');
Route::post('/image/update/',[ProductController::class,'UpdateProductImg'])->name('update-product-img');
Route::post('/thumbnil/img/update',[ProductController::class,'UpdateProductThumbnil'])->name('update-product-thumbnil');
Route::get('multi/image/delete/{id}',[ProductController::class,'DeleteProductMultiImage'])->name('product.multiimg.delete');
Route::get('/inactive/{id}',[ProductController::class,'ProductInactive'])->name('product.inactive');
Route::get('/active/{id}',[ProductController::class,"ProductActive"])->name('product.active');
Route::get('/delete/{id}',[ProductController::class,'ProductDelete'])->name('product.delete');
});

// Admin Brand view
Route::prefix('brand')->group(function(){
    Route::get('view/',[BrandController::class,'BrandView'])->name('all.brand');
   Route::post('store/',[BrandController::class,'BrandStore'])->name('brand.store');
   Route::get('edit/{id}/',[BrandController::class,"BrandEdit"])->name('brand.edit');
   Route::post('update/',[BrandController::class,"BrandUpdate"])->name('brand.update');
   Route::get('/delete/{id}',[BrandController::class,'BrandDelete'])->name('brand.delete');
   });
// admin Slider Routes
Route::prefix('slider')->group(function(){
    Route::get('manage/',[SliderController::class,'SliderView'])->name('manage-slider');
   Route::post('store/',[SliderController::class,'SliderStore'])->name('slider.store');
   Route::get('edit/{id}/',[SliderController::class,"SliderEdit"])->name('slider.edit');
   Route::post('update/',[SliderController::class,"SliderUpdate"])->name('slider.update');
   Route::get('/delete/{id}',[SliderController::class,'SliderDelete'])->name('slider.delete');
   Route::get('/incative/{id}',[SliderController::class,'SliderInactive'])->name('slider-incative');
   Route::get('/active/{id}',[SliderController::class,'SliderActive'])->name('slider-active');

   });

});








//frontend route
Route::get('/',[IndexController::class,'index']);
//user profile route
Route::get('/user/logout/',[IndexController::class,'UserLogOut'])->name('user.logout');
Route::get('/user/profile/',[IndexController::class,'UserProfile'])->name('user.profile');
Route::post('/user/profile/store/',[IndexController::class,'UserProfileStore'])->name('user.profile.store');
Route::get('/user/change/password/',[IndexController::class,'UserChangePassword'])->name('user.change.password');
Route::post('/user/password/update/',[IndexController::class,'UserPasswordUpdate'])->name('user.password.update');
//language route
Route::get('/language/english',[LanguageController::class,'EnglishLanguage'])->name('english.language');
Route::get('/language/urdu',[LanguageController::class,'UrduLanguage'])->name('urdu.language');
//product details
Route::get('product/details/{id}',[LanguageController::class,'ProductDetails']);
