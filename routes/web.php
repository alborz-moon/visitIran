<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Event\EventController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Shop\BlogController;
use App\Http\Controllers\Shop\CategoryController;
use App\Http\Controllers\Shop\ProductController;
use App\Models\State;
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

Route::view('verification', 'verification')->name('verification');

Route::domain(Controller::$SHOP_SITE)->group(function() {

    Route::view('/', 'shop.welcome')->name('home');

    Route::get('/product/{product}/{slug}', [ProductController::class, 'showDetail'])->name('single-product');

    Route::get('/list/{category}/{slug}', [CategoryController::class, 'show'])->name('single-category');


    Route::get('/basket', function () {
        return view('shop.basket');
    })->name('cart');

    Route::get('shipping', function() {
        $states = State::orderBy('name', 'asc')->get();
        return view('shop.shipping', compact('states'));
    })->name('shipping');

    Route::get('/blog/{blog}/{slug}',  [BlogController::class, 'show'])->name('blog');

    Route::view('/blog-list',  'shop.blog-list')->name('blog-list');

    Route::view('payment', 'shop.payment')->name('payment');
    
    Route::middleware(['myAuth'])->group(function() {

        Route::prefix('profile')->group(function() {
            
            Route::get('/', [ProfileController::class, 'profile'])->name('profile.main');

            Route::get('/addresses', [ProfileController::class, 'addresses'])->name('profile.addresses');
            
            Route::get('/comments', [ProfileController::class, 'comments'])->name('profile.comments');
            
            Route::get('/favorites', [ProfileController::class, 'favorites'])->name('profile.favorites');
                    
            Route::get('/my-order-detail', [ProfileController::class, 'myOrderDetail'])->name('profile.my-order-detail');
            
            Route::get('/my-orders', [ProfileController::class, 'myOrders'])->name('profile.my-orders');
            
            Route::get('/notification', [ProfileController::class, 'notification'])->name('profile.notification');
            
            Route::get('/personal-info', [ProfileController::class, 'personalInfo'])->name('profile.personal-info');
            
            Route::get('/tickets-add', [ProfileController::class, 'ticketsAdd'])->name('profile.tickets-add');
            
            Route::get('/tickets-detail', [ProfileController::class, 'ticketsDetail'])->name('profile.tickets-detail');
            
            Route::get('/tickets', [ProfileController::class, 'tickets'])->name('profile.tickets');
            
            Route::get('/history', [ProfileController::class, 'history'])->name('profile.history');

        });
        
    });

});

Route::domain(Controller::$EVENT_SITE)->group(function() {

    Route::view('/', 'event.welcome')->name('event.home');

    Route::view('/event','event.event')->name('event');

    Route::view('/launcher-register','event.launcher.launcher-register')->name('launcher');

    Route::view('/launcher-finance','event.launcher.launcher-finance')->name('finance');

    Route::view('/launcher-create-event','event.launcher.launcher-create-event')->name('create-event');

    Route::view('/launcher-create-time','event.launcher.launcher-create-time')->name('create-time');

    Route::view('/launcher-create-contact','event.launcher.launcher-create-contact')->name('create-contact');

   Route::view('/launcher-create-info','event.launcher.launcher-create-info')->name('create-info');

   Route::view('/launcher-show-events','event.launcher.launcher-show-events')->name('show-events');



});


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

Route::get('/contact-us', function () {
    return view('contact-us');
})->name('contact-us');

Route::view('profile', 'profile')->name('profile');

Route::get('/404', function ($request) {
	dd($request->getHost());
    return view('404');
})->name('404');

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

Route::view('403', 'errors.403')->name('403');
