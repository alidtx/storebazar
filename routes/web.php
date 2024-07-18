<?php

use App\Http\Controllers\AttributeController;
use App\Http\Controllers\CategoryController;
use App\Modules\Store\Http\Controllers\CustomerController;
use App\Modules\Store\Http\Controllers\SellerController;
use App\Modules\Store\Http\Controllers\StoreController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ResetPassword;
use App\Http\Controllers\ChangePassword;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CmsController;

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


Route::get('/category/{slug}', [StoreController::class, 'catalogPage'])->name('store.catalog');
Route::get('/search', function(\Illuminate\Http\Request $request) {
    // dd($request->all());
    if($request->category==null && $request->keywords==null) {
        return redirect(route('store.catalog',['slug'=>'honey']));
    } else if($request->category != NULL && $request->category !='honey' && $request->category != 'মধু') {
        return redirect(route('store.coming.soon'));
    } else if($request->category==NULL && $request->keywords != NULL) {
        return redirect(route('store.catalog',['slug'=>'honey','keyword'=>$request->keywords]));
    } else if($request->category !=NULL && $request->keywords == NULL) {
        return redirect(route('store.catalog',['slug'=>$request->category]));
    } else if($request->category !=NULL && $request->keywords != NULL) {
        return redirect(route('store.catalog',['slug'=>$request->category,'keyword'=>$request->keywords]));
    }
    
})->name("search.keyword");
Route::post('/filtered-catalog', [StoreController::class, 'filtered_catalogPage'])->name('store.filtered.catalog');
Route::get('/product/{slug}', [StoreController::class, 'productDetails'])->name('store.product.details');
Route::get('/coming-soon', [StoreController::class, 'comingSoon'])->name('store.coming.soon');
Route::post('/customer-registartion', [CustomerController::class, 'store'])->name('customer.store');
Route::post('/customer-login', [CustomerController::class, 'customerLogin'])->name('customer.login');
Route::get('/seller-registration', [SellerController::class, 'create'])->name('beSeller');
Route::post('/seller-registartion', [SellerController::class, 'store'])->name('seller.store');
Route::get('/', [StoreController::class, 'index'])->name('home');
Route::post('/forgot-password',[StoreController::class,'submit_phone_forgotPassword'])->name('forgot.password.otp');
Route::post('/forgot-password-otp',[StoreController::class,'submit_forgotPass_otp'])->name('forgot.password.otp.submit');
Route::post('/customer-reset-password',[StoreController::class,'reset_password_submit'])->name('reset.password.submit');

Route::group(['middleware' => ['auth']], function () {

    Route::post('/update-notification',[CustomerController::class,'update_user_notification'])->name('user-notification-view');
    Route::get('/customer/profile/{parameters?}', [CustomerController::class, 'customerProfile'])->name('customer.profile');
    Route::get('/logout',  [CustomerController::class, 'customerLogout'])->name('customer.logout');
    Route::post('/user/profile/update',  [CustomerController::class, 'updateCustomerInfo'])->name('user.profile.update');
    Route::post('/user/credentials/update',  [CustomerController::class, 'changePassword'])->name('user.credentials.update');
    Route::get('/seller/profile', [SellerController::class, 'sellerProfile'])->name('seller.profile');
    Route::get('/category-attribute', [CategoryController::class, 'getCategoryAttribute'])->name('category.attribute');
    Route::post('seller/product-add', [SellerController::class, 'addProduct'])->name('seller.product.add');
    Route::post('seller/product-delete', [SellerController::class, 'deleteProduct'])->name('seller.product.delete');
    Route::post('seller/product-data', [SellerController::class, 'retreieve_product_data'])->name('seller.product.retrieve.data');

    Route::post('product/order', [CustomerController::class, 'product_order'])->name("customer.product.order");
    Route::post("customer-info", [CustomerController::class, 'getCustomer'])->name("customer.info");
    Route::post('orders/price/update', [SellerController::class, 'update_order_price'])->name('seller.orders.price.update');
    Route::post('order/confirm-cancel', [SellerController::class, 'confirm_or_cancel_order'])->name('seller.order.confirm.cancel');
    Route::post('product/image/erase', [SellerController::class, 'remove_product_image'])->name('product.image.erase');
});

Route::get('/register', [RegisterController::class, 'create'])->middleware('guest')->name('register');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest')->name('register.perform');
Route::get('/login', [LoginController::class, 'show'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest')->name('login.perform');
Route::get('/reset-password', [ResetPassword::class, 'show'])->middleware('guest')->name('reset-password');
Route::post('/reset-password', [ResetPassword::class, 'send'])->middleware('guest')->name('reset.perform');
Route::get('/change-password', [ChangePassword::class, 'show'])->middleware('guest')->name('change-password');
Route::post('/change-password', [ChangePassword::class, 'update'])->middleware('guest')->name('change.perform');

Route::group(['middleware' => 'auth'], function () {
    
    Route::get('/virtual-reality', [PageController::class, 'vr'])->name('virtual-reality');
    Route::get('/rtl', [PageController::class, 'rtl'])->name('rtl');
    Route::get('/profile', [UserProfileController::class, 'show'])->name('profile')->middleware('admin');
    Route::post('/profile', [UserProfileController::class, 'update'])->name('profile.update')->middleware('admin');
    Route::post('/create-admin', [UserProfileController::class, 'createAdmin'])->name('admin.store')->middleware('admin');
    Route::get('/profile-static', [PageController::class, 'profile'])->name('profile-static');
    Route::get('/sign-in-static', [PageController::class, 'signin'])->name('sign-in-static');
    Route::get('/sign-up-static', [PageController::class, 'signup'])->name('sign-up-static');

    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
    // Route::get('/dashboard', [HomeController::class, 'index'])->name('home')->middleware('admin');
    Route::get('attribute-delete/{id}', [AttributeController::class, 'destroy'])->name('attribute.delete');
    Route::get('product-delete/{id}', [ProductController::class, 'destroy'])->name('product.delete');
    Route::get('category-delete/{id}', [CategoryController::class, 'destroy'])->name('category.delete');
    Route::get('category-edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::get('attribute-edit/{id}', [AttributeController::class, 'edit'])->name('attribute.edit');
    Route::get('product-edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::post('attribute-create-submit', [AttributeController::class, 'store'])->name('attribute.create');
    Route::post('attribute-update-submit', [AttributeController::class, 'update'])->name('attribute.update');
    Route::post('category-create-submit', [CategoryController::class, 'store'])->name('category.create');
    Route::post('category-update-submit', [CategoryController::class, 'update'])->name('category.update');
    Route::post('product-create-submit', [ProductController::class, 'store'])->name('product.create');
    Route::post('product-update-submit', [ProductController::class, 'update'])->name('product.update');

    Route::post('cms-create-submit', [CmsController::class, 'store'])->name('cms.create');
    Route::get('cms-edit/{id}', [CmsController::class, 'edit'])->name('cms.edit');
    Route::post('cms-update-submit', [CmsController::class, 'update'])->name('cms.update');
    Route::get('cms-delete/{id}', [CmsController::class, 'destroy'])->name('cms.delete');
    
    Route::get('/{page}', [PageController::class, 'index'])->middleware('admin')->name('page');
    Route::post('/notification',[PageController::class,'update_notification'])->middleware('admin')->name('notification-view');
    Route::get("user/edit/{id}/{type?}",[UserProfileController::class,'edit'])->middleware('admin')->name('user.edit');
    Route::post("user/update",[UserProfileController::class,'update_child'])->middleware('admin')->name('user.update');
    Route::post("user/delete",[UserProfileController::class,'delete'])->middleware('admin')->name('user.delete');
    Route::get("order/show/{id}",[OrderController::class,'show'])->middleware('admin')->name('order.show');

});

Route::get('info/{slug}', [StoreController::class, 'cmsContents'])->name('service-pages');
Route::get('news-media/{id}', [StoreController::class, 'newsMedia'])->name('news-media'); 

// Route::get('content/about', [StoreController::class, 'about'])->name('about');
// // Route::get('content/about', [StoreController::class, 'about'])->name('about');
// Route::get('content/how-we-work', [StoreController::class, 'howWeWork'])->name('how-we-work');
// Route::get('content/impact-story', [StoreController::class, 'impactStory'])->name('impact-story');



