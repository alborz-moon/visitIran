<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Event\EventController;
use App\Http\Controllers\Event\EventTagController;
use App\Http\Controllers\Event\LauncherController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\Event\EventBuyerController;
use App\Http\Controllers\Shop\CategoryController;
use App\Http\Controllers\Shop\ProductController;
use App\Models\EventTag;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use niklasravnsborg\LaravelPdf\Facades\Pdf;

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

Route::middleware(['shareTopCategories'])->group(function() {

    Route::domain(Controller::$SHOP_SITE)->group(function() {

        Route::view('/', 'shop.welcome')->name('home');
    
        Route::get('/product/{product}/{slug}', [ProductController::class, 'showDetail'])->name('single-product');
    
        Route::get('/list/{category}/{slug}', [CategoryController::class, 'show'])->name('single-category');
        
        Route::get('/list/{orderBy}', [CategoryController::class, 'allCategories'])->name('category.list');
    
    
        Route::get('/basket', function () {
            return view('shop.basket');
        })->name('cart');
    
        Route::get('shipping', function() {
            $states = State::orderBy('name', 'asc')->get();
            return view('shop.shipping', compact('states'));
        })->name('shipping');
    
        Route::view('payment', 'shop.payment')->name('payment');
        
    
    });
    
    Route::get('/blog/{blog}/{slug}',  [BlogController::class, 'show'])->name('blog');
    
    Route::view('/blog-list',  'shop.blog-list')->name('blog-list');
    
});


Route::middleware(['myAuth'])->group(function() {

    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('recp/{eventBuyer}', [EventBuyerController::class, 'show'])->name('recp');

});

Route::middleware(['myAuth', 'launcherLevel'])->prefix('admin')
    ->group(function() {

        Route::resource('event', EventController::class)->except('update');

    });


Route::middleware(['myAuth'])->group(base_path('routes/common_routes.php'));

Route::middleware(['myAuth', 'editorLevelWithoutDomainCheck'])->prefix('admin')
    ->group(base_path('routes/common_admin_routes.php'));


Route::middleware(['myAuth', 'editorLevel'])->prefix('admin')->group(function() {

    Route::domain(Controller::$SHOP_SITE)->group(base_path('routes/shop_admin_routes.php'));
    

    Route::domain(Controller::$EVENT_SITE)->group(base_path('routes/event_admin_routes.php'));
    
});

Route::middleware(['notAuth'])->group(function() {

    Route::post('login', [AuthController::class, 'login'])->name('login');

    Route::view('login', 'admin.login')->name('loginPage');

    Route::view('verification', 'verification')->name('verification');

    Route::get('/login-register', function () {
        return view('login-register');
    })->name('login-register');

    Route::get('/verification', function () {
        return view('verification');
    })->name('verification');

});



Route::get('blogs', [BlogController::class, 'list'])->name('api.blog.list');

Route::get('blog/{blog?}', [BlogController::class, 'show'])->name('api.blog.show');

Route::get('blogs/getDistinctTags', [BlogController::class, 'distinctTags'])->name('api.blog.getDistinctTags');


Route::get('/alaki2', function() {
    
        $data = [
            // 'title' => $event->title,
            // 'launcher' => $event->launcher->company_name,
            // 'type' => $event->city_id == null ? 'مجازی' : 'حضوری',
            // 'address' => $event->city_id == null ? $event->link : $event->address,
            // 'name' => $eventBuyer->first_name . ' ' . $eventBuyer->last_name,
            // 'phone' => $eventBuyer->phone,
            // 'tel' => $eventBuyer->tel,
            // 'email' => $eventBuyer->email,
            // 'site' => $eventBuyer->site,
            // 'nid' => $eventBuyer->nid,
            // 'created_at' => self::MiladyToShamsi3($eventBuyer->created_at->timestamp),
            // 'paid' => $eventBuyer->paid,
            // 'qr' => storage_path($filename)
        ];

        view()->share('data', $data);

        $pdf = Pdf::loadView('event.event.receipt', $data, [], 
            [
                'format' => 'A4-L',
                'display_mode' => 'fullpage'
            ]
        );
        return $pdf->download('pdf_file.pdf');
});

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
        
        Route::get('/my-tickets', [ProfileController::class, 'myTickets'])->name('profile.my-tickets');

        Route::get('/report', [ProfileController::class, 'report'])->name('report');
        
        Route::get('/history', [ProfileController::class, 'history'])->name('profile.history');

    });
    
});


Route::middleware(['shareEventTags'])->group(function() {

    Route::domain(Controller::$EVENT_SITE)->group(function() {

        Route::get('/', function() {
            
            $tags = EventTag::visible()->get();

            $whereClause = "events.visibility = true and end_registry > " . time();

            $cities = DB::connection('mysql2')->select('select cities.id, cities.name from events, cities where city_id is not null and city_id = cities.id and ' . $whereClause . ' group by(cities.id)');
            $launchers = DB::connection('mysql2')->select('select distinct(launcher_id) as id, launchers.company_name from launchers, events where launcher_id = launchers.id and ' . $whereClause);

            return view('event.welcome', compact('tags', 'launchers', 'cities'));
        })->name('event.home');


        Route::get('/event/{event}/{slug}', [EventController::class, 'show'])->name('event');

        Route::get('/launcher/{launcher}/{slug}', [LauncherController::class, 'show_detail'])->name('show-launcher');

        Route::view('/launcher-list','event.launcher-list')->name('launcher-list');

        Route::get('/list/{tag}/{slug}', [EventTagController::class, 'list'])->name('event.single-category');
    
        Route::get('/list/{orderBy}', [EventTagController::class, 'allCategories'])->name('event.category.list');



        Route::middleware(['myAuth'])->group(function() {

            Route::view('/my-events', 'event.my-events')->name('my-events');

            Route::view('/profile-favorites-event', 'shop.profile.profile-favorites-event')->name('profile-favorites-event');
            
            Route::get('/launcher-register', [LauncherController::class, 'registry'])->name('launcher');

            Route::get('/launcher-edit-register/{launcher}', [LauncherController::class, 'editRegistry'])->name('launcher-edit');

            Route::get('/launcher-document/{formId?}', [LauncherController::class, 'documents'])->name('launcher-document');

            Route::post('/launcher_send_for_review/{launcher}', [LauncherController::class, 'sendForReview'])->name('launcher.send_for_review');

            Route::get('/launcher-finance/{formId}', function($formId) {
                return view('event.launcher.launcher-finance', compact('formId'));
            })->name('finance');
            
            Route::middleware(['launcherLevel'])->prefix('admin')->group(function() {
            
                Route::domain(Controller::$EVENT_SITE)->group(base_path('routes/event_launcher_routes.php'));
                
            });

        });


    });

});


Route::get('/cart-empty', function () {
    return view('cart-empty');
})->name('cart-empty');


Route::get('/checkout-successful', function () {
    return view('checkout-successful');
})->name('checkout-successful');

Route::get('/checkout-unsuccessful', function () {
    return view('checkout-unsuccessful');
})->name('checkout-unsuccessful');

Route::get('/come', function (Request $request) {
    return view('come', ['is_in_event' => $request->getHost() == Controller::$EVENT_SITE]);
})->name('come');

Route::get('/password-reset', function () {
    return view('password-reset');
})->name('password-reset');

Route::get('/contact-us', function () {
    return view('contact-us');
})->name('contact-us');

Route::view('profile', 'profile')->name('profile');

Route::get('/404', function ($request) {
    dd("ASd");
    return view('404');
})->middleware(['shareEventTags', 'shareTopCategories'])->name('404');

Route::view('403', 'errors.403')->middleware(['shareEventTags', 'shareTopCategories'])->name('403');

