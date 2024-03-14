<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CheckoutController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [FrontController::class,'index'])->name('front.index');
Route::get('/cart', [CartController::class,'cart'])->name('front.cart');
Route::get('/blogs', [FrontController::class,'blog'])->name('front.blogs');
Route::get('/products', [FrontController::class,'products'])->name('front.products');
Route::get('/about', [FrontController::class,'about'])->name('front.about');



Route::get('/test', [FrontController::class,'test'])->name('front.test');
Route::get('/contact', [FrontController::class,'contact'])->name('front.contact');
Route::post('/contact-us/store', [FrontController::class,'contact_us_store'])->name('front.contact.us.store');

Route::get('/search/products', [FrontController::class,'search_product'])->name('front.search.product');
Route::get('/blog/details/{url}', [FrontController::class,'blog_details'])->name('front.blog.details');

Route::post('/add-to-cart', [CartController::class,'addToCart'])->name('front.add.to.cart');
Route::post('/update-cart', [CartController::class,'update_cart'])->name('front.update.cart');
Route::post('/delete-cart', [CartController::class,'delete_cart'])->name('front.delete.cart');
Route::get('/shop/{categorySlug?}', [ShopController::class,'index'])->name('front.shop');
Route::get('/product/{slug}', [ShopController::class,'product'])->name('front.product');

Route::get('/cart-checkout', [CartController::class,'checkout'])->name('front.checkout.cart');
Route::post('/checkout', [CheckoutController::class,'store'])->name('checkout.store');
Route::get('/welcome', [CheckoutController::class,'welcome_checkout'])->name('welcome.view');

Route::group(['prefix' => 'account'], function () {

  
    Route::group(['middleware' => 'guest'], function () {
        Route::get('/registration', [AuthController::class,'registration'])->name('front.registration');
        Route::post('/register', [AuthController::class,'register'])->name('front.register');
        Route::get('/login', [AuthController::class,'login'])->name('front.login');
   
        Route::post('/authenticate', [AuthController::class,'authenticate'])->name('front.authenticate');
    });
    Route::group(['middleware' => 'customer.auth'], function () {
        Route::get('/profile', [AuthController::class,'profile'])->name('front.profile');
        Route::get('/logout', [AuthController::class,'logout'])->name('front.logout');
    });

    });


Route::group(['middleware' => 'guest'], function () {
    Route::get('/admin/login', [AdminLoginController::class,'index'])->name('admin.login');
    Route::post('/admin/authenticate', [AdminLoginController::class,'authenticate'])->name('admin.authenticate');
});

Route::group(['as' => 'admin.', 'prefix' => 'admin'], function () {  
Route::group(['middleware' => 'admin.auth'], function () {
    Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');
    Route::get('/logout', [AdminLoginController::class,'logout'])->name('logout');
    Route::get('/about/info', [AboutController::class,'index'])->name('about.index');
    Route::post('/about/info/store', [AboutController::class,'store'])->name('about.us.info.store');
    Route::get('/all-category', [CategoryController::class,'getAll'])->name('get.all.category');
    Route::resource('category', CategoryController::class);
    Route::get('/all-product', [ProductController::class,'getAll'])->name('get.all.product');
    Route::get('/all-blog', [BlogController::class,'getAll'])->name('blog.get.all');
    Route::get('/all-page', [PageController::class,'getAll'])->name('page.get.all');
    Route::resource('page', PageController::class);
    Route::resource('product', ProductController::class);
    Route::resource('blog', BlogController::class);
    Route::get('/all/blog-category', [BlogCategoryController::class,'getAll'])->name('blog.category.get.all');
    Route::resource('blog-category', BlogCategoryController::class);

    Route::get('/settings/index', [SettingsController::class,'index'])->name('settings.index');
    Route::post('/settings/app/store', [SettingsController::class,'app_store'])->name('settings.app.store');


    });
});

Route::get('/{page}', [FrontController::class,'page'])->name('front.page');