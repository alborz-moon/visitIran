<?php

use App\Http\Controllers\Shop\BlogController;
use App\Http\Controllers\Shop\InfoBoxController;
use App\Http\Controllers\Shop\ProductController;
use App\Http\Controllers\Shop\CategoryController;

use Illuminate\Support\Facades\Route;

Route::get('infobox', [InfoBoxController::class, 'list'])->name('api.infobox');

Route::get('blogs', [BlogController::class, 'list'])->name('api.blog.list');

Route::get('blog/{blog?}', [BlogController::class, 'show'])->name('api.blog.show');

Route::get('product/{product?}', [ProductController::class, 'show'])->name('api.product.show');

Route::get('products', [ProductController::class, 'list'])->name('api.product.list');

Route::get('similar_products/{product}', [ProductController::class, 'similars'])->name('api.product.similars');

Route::get('category', [CategoryController::class, 'list'])->name('api.category');

Route::get('get_top_categories_products', [CategoryController::class, 'get_top_categories_products'])->name('api.get_top_categories_products');


Route::middleware(['myAuth'])->group(function() {

    Route::prefix('product/{product}')->group(function() {

        Route::get('/comment', [CommentController::class, 'list'])->name('api.product.comment.list');

        Route::post('/comment', [CommentController::class, 'store'])->name('api.product.comment.store');

    });
    

});

?>