<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoBoxController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\OffController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductFeatureController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\SliderController;
use Illuminate\Support\Facades\App;
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

Route::middleware(['auth'])->group(function() {

    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

});

Route::middleware(['auth', 'editorLevel'])->prefix('admin')->group(function() {

    Route::resource('brand', BrandController::class)->except(['show', 'update']);

    Route::post('brand/{brand}', [BrandController::class, 'update'])->name('brand.update');

    
    Route::resource('seller', SellerController::class)->except(['show', 'update']);

    Route::post('seller/{seller}', [SellerController::class, 'update'])->name('seller.update');



    Route::resource('infobox', InfoBoxController::class)->except(['show', 'update']);
    
    Route::post('infobox/{infobox}', [InfoBoxController::class, 'update'])->name('infobox.update');



    Route::resource('slider', SliderController::class)->except(['show', 'update']);
    
    Route::post('slider/{slider}', [SliderController::class, 'update'])->name('slider.update');


    
    Route::resource('banner', BannerController::class)->except(['show', 'update']);
    
    Route::post('banner/{banner}', [BannerController::class, 'update'])->name('banner.update');


    Route::resource('category', CategoryController::class)->except('update');

    Route::prefix('category')->group(function() {

        Route::post('/', [CategoryController::class, 'uploadCategories'])->name('category.upload');

        Route::post('/{category}', [CategoryController::class, 'update'])->name('category.update');
        
        Route::get('/sub/{category}', [CategoryController::class, 'sub'])->name('category.sub');

    });

    Route::resource('category.features', FeatureController::class)->except('show', 'update')->shallow();

    Route::post('feature/{feature}', [FeatureController::class, 'update'])->name('feature.update');


    Route::resource('blog', BlogController::class)->except(['show', 'update']);

    Route::post('blog/addBatch', [BlogController::class, 'addBatch'])->name('blog.addBatch');

    Route::post('blog/{blog}', [BlogController::class, 'update'])->name('blog.update');


    Route::resource('faq', FAQController::class)->except(['show', 'update']);

    Route::post('faq/{faq}', [FAQController::class, 'update'])->name('faq.update');
    

    Route::resource('off', OffController::class)->except(['show', 'update']);

    Route::post('off/{off}', [OffController::class, 'update'])->name('off.update');


    Route::resource('config', ConfigController::class)->only(['index']);

    Route::post('config', [ConfigController::class, 'update'])->name('config.update');

    
    Route::resource('product', ProductController::class)->except(['show', 'update']);

    Route::prefix('product')->group(function () {
        
        Route::post('/addBatch', [ProductController::class, 'addBatchProducts'])->name('product.addBatch');

        Route::get('/excel', [ProductController::class, 'excel'])->name('product.excel');

        Route::post('/{product}', [ProductController::class, 'update'])->name('product.update');
        
        Route::get('/off/{product}', [ProductController::class, 'editOff'])->name('product.off');
        
        Route::post('/removeOff/{product}', [ProductController::class, 'removeOff'])->name('product.removeOff');

        Route::post('/changeVisibility/{product?}', [ProductController::class, 'changeVisibility'])->name('product.changeVisibility');

        Route::post('/updateAvailableCount/{product?}', [ProductController::class, 'updateAvailableCount'])->name('product.updateAvailableCount');

    });

    Route::resource('mail', MailController::class)->except('show', 'update', 'edit');
    
    Route::get('mail_users', [MailController::class, 'users'])->name('mail.users');


    Route::resource('product.comment', CommentController::class)->except('show', 'update', 'edit')->shallow();

    Route::resource('product.productGallery', GalleryController::class)->except('show', 'update', 'edit')->shallow();
    
    Route::resource('product.productFeature', ProductFeatureController::class)->only('index', 'store', 'destroy')->shallow();


    Route::post('uploadImg', [HomeController::class, 'uploadImg'])->name('uploadImg');

    Route::get('/panel', function () {
        return view('admin.home');
    })->name('panel');

});

Route::post('login', [AuthController::class, 'login'])->name('login');

Route::view('login', 'admin.login')->name('loginPage');

Route::get('/', function () {
    App::setLocale('fa');
    return view('welcome');
})->name('home');

Route::get('/cart', function () {
    return view('cart');
})->name('cart');

Route::get('/cart-empty', function () {
    return view('cart-empty');
})->name('cart-empty');

Route::get('/product/{product}/{productName}', [ProductController::class, 'showDetail'])->name('single-product');

Route::view('alaki', 'alaki');
Route::get('/checkout-successful', function () {
    return view('checkout-successful');
})->name('checkout-successful');

Route::get('/checkout-unsuccessful', function () {
    return view('checkout-unsuccessful');
})->name('checkout-unsuccessful');

Route::get('/login-register', function () {
    return view('login-register');
})->name('login-register');

Route::get('/verification', function () {
    return view('verification');
})->name('verification');

Route::get('/come', function () {
    return view('come');
})->name('come');

Route::get('/password-reset', function () {
    return view('password-reset');
})->name('password-reset');

Route::get('/shop', function () {
    return view('shop');
})->name('shop');

Route::get('/contact-us', function () {
    return view('contact-us');
})->name('contact-us');

Route::get('/profile', function () {
    return view('profile');
})->name('profile');

Route::get('/404', function () {
    return view('404');
})->name('404');

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');