<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\SliderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::get('getDesc/{category?}', [HomeController::class, 'getDesc'])->name('api.getDesc');

Route::get('faq', [FAQController::class, 'list'])->name('api.faq');

Route::get('banner', [BannerController::class, 'list'])->name('api.banner');

Route::get('slider', [SliderController::class, 'list'])->name('api.slider');

Route::post('submitMail', [MailController::class, 'submitMail'])->name('api.submitMail');

Route::domain('localshop.com')->group(base_path('routes/shop_general_routes.php'));

Route::domain('localevent.com')->group(base_path('routes/event_general_routes.php'));