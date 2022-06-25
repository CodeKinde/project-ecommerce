<?php
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ReportController;
use App\Http\Controllers\Backend\ReturnController;
use App\Http\Controllers\Backend\ShippingAreaController;
use App\Http\Controllers\Backend\SiteSettingController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\HomeBlogController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\LanguageController;
use App\Http\Controllers\Frontend\WishlistController;
use App\Http\Controllers\User\AllUserController;
use App\Http\Controllers\User\CartPageController;
use App\Http\Controllers\User\CashController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\ReviewController;
use App\Http\Controllers\User\StripeController;
use Illuminate\Foundation\Auth\User as AuthUser;
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

  Route::get('product/details/{id}','ProductDetails')->name('product.details');

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

//**Admin Coupon all route **************************************/
Route::prefix('coupon')->group(function(){
    Route::controller(CouponController::class)->group(function(){
        Route::get('/view','CouponView')->name('coupon.view');

        Route::get('/add','CouponAdd')->name('coupon.add');

        Route::post('/store','CouponStore')->name('coupon.store');

        Route::get('/edit/{id}','CouponEdit')->name('coupon.edit');

        Route::post('/update','CouponUpdate')->name('coupon.update');

        Route::get('/delete/{id}','CouponDelete')->name('coupon.delete');

    });
});

//**Admin Shipping Area all route **************************************/
Route::prefix('shipping')->group(function(){
    Route::controller(ShippingAreaController::class)->group(function(){
        ///ship division
        Route::get('/division/view/add','DivisionView')->name('division.view');

        Route::post('division/store','DivisionStore')->name('division.store');

        Route::get('division/edit/{id}','DivisionEdit')->name('division.edit');

        Route::post('division/update','DivisionUpdate')->name('division.update');

        Route::get('division/delete/{id}','DivisionDelete')->name('division.delete');

         ///ship district
         Route::get('/district/view/add','DistrictView')->name('district.view');

         Route::post('district/store','DistrictStore')->name('district.store');

         Route::get('district/edit/{id}','DistrictEdit')->name('district.edit');

         Route::post('district/update','DistrictUpdate')->name('district.update');

         Route::get('district/delete/{id}','DistrictDelete')->name('district.delete');

        ///ship state
        Route::get('/state/view/add','StateView')->name('state.view');

        Route::post('/state/store','StateStore')->name('state.store');

        Route::get('/state/edit/{id}','StateEdit')->name('state.edit');

        Route::post('/state/update','StateUpdate')->name('state.update');

        Route::get('/state/delete/{id}','StateDelete')->name('state.delete');
    });
});

//order route all
Route::prefix('order')->group(function(){
    Route::controller(OrderController::class)->group(function(){

     Route::get('/pending/orders','PendingOrders')->name('pending.order');

     Route::get('/pending/details/{order_id}','PendingOrdersDetails')->name('pending.order.details');

     Route::get('/confirm/orders','ConfirmOrders')->name('confirm.order');

     Route::get('/processing/orders','ProcessingOrders')->name('processing.order');

     Route::get('/picked/orders','PickedOrders')->name('picked.order');

     Route::get('/shipped/orders','ShippedOrders')->name('shipped.order');

     Route::get('/delivered/orders','DeliveredOrders')->name('delivered.order');

     Route::get('/cancel/orders','CancelOrders')->name('cancel.order');

     Route::get('/pending/confirm/{order_id}','PendingToConfirm')->name('pending.confirm');

     Route::get('/confirm/processing/{order_id}','ConfirmToProcessing')->name('confirm-processing');

     Route::get('/processing/picked/{order_id}','ProcessingToPicked')->name('processing-picked');

     Route::get('/picked/shipped/{order_id}','PickedToShipped')->name('picked-shipped');

     Route::get('/shipped/delivered/{order_id}','ShippedToDelivered')->name('shipped-delivered');

     Route::get('/invoice/download/{order_id}','InvoiceDownload')->name('invoice.download');

    });

    Route::post('/return/order/{order_id}',[AllUserController::class,'ReturnOrder'])->name('order-return');

    Route::get('/return/order/list',[AllUserController::class,'ReturnOrderList'])->name('order.return.list');

    Route::get('/cancel/order',[AllUserController::class,'CancelOrder'])->name('cancel-order');

});
Route::prefix('report')->group(function(){
    Route::get('/view',[ReportController::class,'ReportView'])->name('report.view');
});

Route::get('all-view',[AdminProfileController::class, 'AllUserView'])->name('all-user.view');

//=============blog post route all===================///
Route::prefix('blog')->group(function(){
 /// Blog post category
 Route::get('/blog-post/category/view',[BlogController::class,'BlogCategoryView'])->name('category.view');

 Route::post('/blog-post/category/store',[BlogController::class,'BlogCategoryStore'])->name('category.store');

 Route::get('/blog-post/category/edit/{id}',[BlogController::class,'BlogCategoryEdit'])->name('category.edit');

 Route::post('/blog-post/category/update',[BlogController::class,'BlogCategoryUpdate'])->name('category.update');

 Route::get('/blog-post/category/delete/{id}',[BlogController::class,'BlogCategoryDelete'])->name('category.delete');
 /// Blog post
 Route::get('/post/view',[BlogController::class,'BlogPostView'])->name('post.view');

 Route::get('/post/add',[BlogController::class,'BlogPostAdd'])->name('post.add');

 Route::post('/post/store',[BlogController::class,'BlogPostStore'])->name('post.store');

 Route::get('/posts/details/{id}',[BlogController::class,'BlogPostDetails'])->name('post.details');

 Route::get('/post/edit/{id}',[BlogController::class,'BlogPostEdit'])->name('post.edit');

 Route::post('/post/update',[BlogController::class,'BlogPostUpdate'])->name('post.update');

 Route::get('/post/delete/{id}',[BlogController::class,'BlogPostDelete'])->name('post.delete');
});

///=========Site setting route All===============================>
Route::prefix('setting')->group(function(){

//Setting site
Route::get('/site/add/edit',[SiteSettingController::class, 'SiteSetting'])->name('site.add-edit');

Route::post('/site/update',[SiteSettingController::class, 'SiteSettingUpdate'])->name('site.update');
//Setting seo
Route::get('/seo/add/edit',[SiteSettingController::class, 'SeoSetting'])->name('seo.add-edit');

Route::post('/seo/update',[SiteSettingController::class, 'SeoSettingUpdate'])->name('seo.update');

});

///=========Return Order route All===============================>
Route::prefix('return')->group(function(){

Route::get('/admin/request',[ReturnController::class, 'ReturnRequest'])->name('return.request');
Route::get('/admin/approve/{order_id}',[ReturnController::class, 'ReturnRequestApprove'])->name('return.approve');
    //Setting seo
Route::get('/admin/allrequest',[ReturnController::class, 'ReturnRequestAll'])->name('all.request');

    });

///=========frontend review product Route All===============================>
Route::post('review/store',[ReviewController::class, 'ReviewStore'])->name('review.store');
///=========Admin review product Route All===============================>
Route::prefix('review')->group(function(){

Route::get('/view',[ReviewController::class, 'ReviewView'])->name('review.view');

Route::get('admin/publish/{id}',[ReviewController::class, 'ReviewPublish'])->name('review.publish');

Route::get('/publish',[ReviewController::class, 'PublishReview'])->name('publish.review');

Route::get('/publish/delete/{id}',[ReviewController::class, 'PublishDelete'])->name('review.delete');


});



Route::middleware(['auth:sanctum,web', config('jetstream.auth_session'),'verified'
])->group(function () {
    Route::get('/dashboard', function () {

        return view('dashboard',);
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
///start Product view modal with ajax
Route::get('product/view/modal/{id}',[IndexController::class,'ProductViewModal']);

///start Product add to cart with ajax
Route::post('cart/data/store/{id}',[CartController::class,'AddToCart']);

Route::post('cartEn/data/store/{id}',[CartController::class,'AddToCartEn']);


///start get product mini cart
Route::get('/product/mini/cart/',[CartController::class,'AddMiniCart']);

//remove product mini cart
Route::get('/minicart/product-remove/{rowId}',[CartController::class,'RemoveMiniCart']);

//add product to wishliste
Route::post('/add-to-wishlist/{product_id}',[WishlistController::class,'AddToWishlist']);

Route::group(['prefix' => 'user','middleware' => ['user','auth'],'namespace' => 'User'],function(){
//view product to wishliste
Route::get('/wishlist/view',[WishlistController::class,'WishlistView'])->name('wishlist');

//get  wishlist product
Route::get('/get-wishlist-product',[WishlistController::class,'GetWishlistProduct']);

//remove  wishlist product
Route::get('/wishlist/productfr-remove/{id}',[WishlistController::class,'RemoveWishlistProductFr']);

Route::get('/wishlist/product-remove/{id}',[WishlistController::class,'RemoveWishlistProduct'])
;
//my cart Page
Route::get('/myCart',[CartPageController::class,'MyCart'])->name('myCart');

Route::get('/get-cart-product',[CartPageController::class,'GetCartProduct']);

Route::get('/cart-remove/{rowId}',[CartPageController::class,'RemoveCartProduct']);

Route::get('/cart-increment/{rowId}',[CartPageController::class,'CartIncrement']);

Route::get('/cart-decrement/{rowId}',[CartPageController::class,'CartDecrement']);

///frontend coupon apply
Route::post('/coupon-apply',[CartController::class,'CouponApply']);

Route::get('/coupon-calculation',[CartController::class,'CouponCalculation']);

Route::get('/coupon-remove',[CartController::class,'CouponRemove']);

Route::get('/checkout/create',[CartController::class,'CheckoutCreate'])->name('checkout');

Route::get('/district-get/ajax/{division_id}',[CheckoutController::class,'DistrictGet']);

Route::get('/state-get/ajax/{district_id}',[CheckoutController::class,'StateGet']);
///frontend Checkout
Route::post('/checkout/store',[CheckoutController::class,'CheckoutStore'])->name('checkout.store');

Route::post('/stripe/order',[StripeController::class,'StripeOrder'])->name('stripe.order');

Route::post('/cash/order',[CashController::class,'CashOrder'])->name('cash.order');

Route::get('/my/order',[AllUserController::class,'MyOrderView'])->name('my.order');

Route::get('/order-detail/{order_id}',[AllUserController::class,'OrderDetail']);

Route::get('/invoice-download/{order_id}',[AllUserController::class,'InvoiceDownload']);

});

///===================Home frontend Blog======================///
Route::get('/blog',[HomeBlogController::class, 'HomeBlogPost'])->name('home.blog');

Route::get('/blog/post/details/{id}',[HomeBlogController::class, 'BlogPostDetails']);

Route::get('/blog/post/category/{category_id}',[HomeBlogController::class, 'BlogPostCategory']);
