<?php
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\LanguageController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
//Route::middleware(['auth:admin'])->group(function(){

Route::middleware('admin:admin')->group(function(){
    Route::get('admin/login',[AdminController::class,'loginForm']);
    Route::post('admin/login',[AdminController::class,'store'])->name('admin.login');
});
Route::middleware(['auth:sanctum,admin', config('jetstream.auth_session'),'verified'
])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.index');
    })->name('admin.dashboard')->middleware('auth:admin');
});

Route::get('admin/logout',[AdminController::class,'destroy'])->name('admin.logout');

Route::get('admin/profile',[AdminProfileController::class,'AdminProfile'])->name('admin.profile');

Route::get('admin/profile/edit',[AdminProfileController::class,'AdminProfileEdit'])->name('admin.profile.edit');

Route::post('admin/profile/store',[AdminProfileController::class,'AdminProfileStore'])->name('admin.profile.store');


Route::get('admin/change/password',[AdminProfileController::class,'AdminChangePassword'])->name('admin.change.password');

Route::post('change/password/update',[AdminProfileController::class,'UpdateChangePassword'])->name('change.password.update');

//});//end midlleware admin

//****************************** Brand route All************************* */
Route::prefix('brand')->group(function(){
Route::controller(BrandController::class)->group(function(){

    Route::get('/view','BrandView')->name('brand.view');

    Route::get('/add','BrandAdd')->name('brand.add');

    Route::post('/store','BrandStore')->name('brand.store');

    Route::get('/edit/{id}','BrandEdit')->name('brand.edit');

    Route::post('/update','BrandUpdate')->name('brand.update');

    Route::get('/delete/{id}','BrandDelete')->name('brand.delete');

});
});

//****************************** category route All************************* */
Route::prefix('category')->group(function(){
    ///category route
Route::controller(CategoryController::class)->group(function(){

    Route::get('/view','CategoryView')->name('category.view');

    Route::get('/add','CategoryAdd')->name('category.add');

    Route::post('/store','CategoryStore')->name('category.store');

    Route::get('/edit/{id}','CategoryEdit')->name('category.edit');

    Route::post('/update','CategoryUpdate')->name('category.update');

    Route::get('/delete/{id}','CategoryDelete')->name('category.delete');
});
  ///sub category route
  Route::controller(SubCategoryController::class)->group(function(){

    Route::get('/sub/view','SubCategoryView')->name('subcategory.view');

    Route::get('/sub/add','SubCategoryAdd')->name('subcategory.add');

    Route::post('/sub/store','SubCategoryStore')->name('subcategory.store');

    Route::get('/sub/edit/{id}','SubCategoryEdit')->name('subcategory.edit');

    Route::post('/sub/update','SubCategoryUpdate')->name('subcategory.update');

    Route::get('/sub/delete/{id}','SubCategoryDelete')->name('subcategory.delete');

    ///sub sub category route
    Route::get('/sub/sub/view','SubSubCategoryView')->name('sub-subcategory.view');

    Route::get('/sub/sub/add','SubSubCategoryAdd')->name('sub-subcategory.add');

    Route::get('/subcategory/ajax/{category_id}','GetSubCategory');
    Route::get('/sub-subcategory/ajax/{subcategory_id}','GetSubSubCategory');


    Route::post('/sub/sub/store','SubSubCategoryStore')->name('sub-subcategory.store');

    Route::get('/sub/sub/edit/{id}','SubSubCategoryEdit')->name('sub-subcategory.edit');

    Route::post('/sub/sub/update','SubSubCategoryUpdate')->name('sub-subcategory.update');

    Route::get('/sub/sub/delete/{id}','SubSubCategoryDelete')->name('sub-subcategory.delete');

});
});
//******************Manager product route alll************************/
Route::prefix('product')->group(function(){
 Route::controller(ProductController::class)->group(function(){

  Route::get('/view','ProductView')->name('product.view');

  Route::get('/add','ProductAdd')->name('product.add');

  Route::post('/store','ProductStore')->name('product.store');

  Route::get('/edit/{id}','ProductEdit')->name('product.edit');

  Route::post('/update','ProductUpdate')->name('product.update');

  Route::post('image/update','MultiImageUpdate')->name('product-update-image');

  Route::post('thambnail/update','ThambnailImageUpdate')->name('product-update-thambnail');

  Route::get('/inactive/{id}','ProductInactive')->name('product.inactive');

  Route::get('/active/{id}','ProductActive')->name('product.active');

  Route::get('/details/{id}','ProductDetails')->name('product.details');

  Route::get('/delete/{id}','ProductDelete')->name('product.delete');

 });
});

 //******************Manager product route alll************************/
Route::prefix('slider')->group(function(){
    Route::controller(SliderController::class)->group(function(){

     Route::get('/view','SliderView')->name('slider.view');

     Route::get('/add','SliderAdd')->name('slider.add');

     Route::post('/store','SliderStore')->name('slider.store');

     Route::get('/edit/{id}','SliderEdit')->name('slider.edit');

     Route::post('/update','SliderUpdate')->name('slider.update');


     Route::get('/inactive/{id}','SliderInactive')->name('slider.inactive');

     Route::get('/active/{id}','SliderActive')->name('slider.active');

     Route::get('/delete/{id}','SliderDelete')->name('slider.delete');

    });

});


Route::middleware(['auth:sanctum,web', config('jetstream.auth_session'),'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('dashboard',compact('user'));
    })->name('dashboard');
});

Route::get('/',[IndexController::class,'Index']);

Route::get('user/logout',[IndexController::class,'UserLogout'])->name('user.logout');

Route::get('user/profile',[IndexController::class,'UserProfile'])->name('user.profile');

Route::post('user/profile/store',[IndexController::class,'UserProfileStore'])->name('user.profile.store');


Route::get('user/change/password',[IndexController::class,'UserChangePassword'])->name('user.change.password');

Route::post('user/password/update',[IndexController::class,'UserPasswordUpdate'])->name('user.password.update');
/*********************************Frontend route all***********************************/

//manager multip language all route
Route::get('language/french',[LanguageController::class,'French'])->name('language.french');
Route::get('language/english',[LanguageController::class,'English'])->name('language.english');

//frontend product details
Route::get('product/details/{id}',[IndexController::class,'ProductDetails']);

//frontend product tags
Route::get('product/tags/{tag}',[IndexController::class,'TagWiseProduct']);

//frontend product subcategory
Route::get('product/subcategory/{subcateg_id}/{slug}',[IndexController::class,'SubCategoryWiseProduct']);

//frontend product sub subcategory
Route::get('product/subsubcategory/{subsubcateg_id}/{slug}',[IndexController::class,'SubSubCategoryWiseProduct']);


