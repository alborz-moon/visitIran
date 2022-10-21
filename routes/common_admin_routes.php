<?php

use App\Http\Controllers\SliderController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MailController;

use Illuminate\Support\Facades\Route;


Route::resource('slider', SliderController::class)->except(['show', 'update']);

Route::post('slider/{slider}', [SliderController::class, 'update'])->name('slider.update');



Route::resource('banner', BannerController::class)->except(['show', 'update']);

Route::post('banner/{banner}', [BannerController::class, 'update'])->name('banner.update');



Route::resource('faq', FAQController::class)->except(['show', 'update']);

Route::post('faq/{faq}', [FAQController::class, 'update'])->name('faq.update');



Route::resource('mail', MailController::class)->except('show', 'update', 'edit');

Route::get('mail_users', [MailController::class, 'users'])->name('mail.users');


Route::post('uploadImg', [HomeController::class, 'uploadImg'])->name('uploadImg');

?>