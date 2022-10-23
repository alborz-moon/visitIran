<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Event\EventController;
use App\Http\Controllers\Shop\CategoryController;
use App\Http\Controllers\Shop\ProductController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

Route::middleware(['auth', 'launcherLevel'])->prefix('admin')
    ->group(function() {

        Route::resource('event', EventController::class)->except('update');

    });


Route::middleware(['auth', 'editorLevelWithoutDomainCheck'])->prefix('admin')
    ->group(base_path('routes/common_admin_routes.php'));


Route::middleware(['auth', 'editorLevel'])->prefix('admin')->group(function() {

    Route::domain(Controller::$SHOP_SITE)->group(base_path('routes/shop_admin_routes.php'));
    
    Route::domain(Controller::$EVENT_SITE)->group(base_path('routes/event_admin_routes.php'));

});

Route::post('login', [AuthController::class, 'login'])->name('login');

Route::view('login', 'admin.login')->name('loginPage');

Route::domain(Controller::$SHOP_SITE)->group(function() {

    Route::view('/', 'shop.welcome')->name('home');

    Route::get('/product/{product}/{slug}', [ProductController::class, 'showDetail'])->name('single-product');

    Route::get('/list/{category}/{slug}', [CategoryController::class, 'show'])->name('single-category');
});

Route::domain(Controller::$EVENT_SITE)->group(function() {

    Route::view('/', 'event.welcome')->name('event.home');

});

Route::get('/cart', function () {
    return view('cart');
})->name('cart');

Route::get('/cart-empty', function () {
    return view('cart-empty');
})->name('cart-empty');


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

Route::get('/404', function ($request) {
	dd($request->getHost());
    return view('404');
})->name('404');

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

Route::view('403', '403')->name('403');
