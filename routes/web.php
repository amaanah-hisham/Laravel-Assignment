<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RentedItemController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductSubCategoryController;
use App\Http\Controllers\ProductTestSubCategoryController;
use App\Livewire\Product\Create;
use App\Livewire\Product\Update;
use App\Livewire\ShopFilter;
use App\Http\Controllers\ShopController;

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

Route::get('/',[HomeController::class,'index'])->name('home');


    Route::get('/products/{category}/{sub_category}/{slug}', [ProductController::class, 'view'])->name('product-details');

    Route::middleware([
        'auth:sanctum',
        config('jetstream.auth_session'),
        'verified',
    ])->group(function () {


Route::get('dashboard',[HomeController::class, 'viewDashboard'])->name('dashboard');

Route::group(['middleware' => ['role:Admin|Renter|Rentee']],function(){

    Route::group(['middleware' => ['role:Admin']],function() {
        Route::get('product-sub-categories', [ProductTestSubCategoryController::class, 'showSubCategories'])->name('product-sub-categories-view');
        Route::get('product-sub-categories/create', [ProductTestSubCategoryController::class, 'viewSubCategoryForm'])->name('product-sub-categories.create');
        Route::post('product-sub-categories/create', [ProductTestSubCategoryController::class, 'storeSubCategory'])->name('product-sub-categories.store');
        Route::get('product-sub-categories/edit/{slug}', [ProductTestSubCategoryController::class, 'viewEditSubCategoryForm'])->name('product-sub-categories.edit');

            Route::resource(
                'product-category',
                \App\Http\Controllers\ProductCategoryController::class
            );

            Route::resource(
                'user',
                \App\Http\Controllers\UserController::class

            );
        });

        //products
        Route::get('product/create', Create::class)->name('product.create')->middleware(['role:Renter|Admin']);
        Route::post('product/create',[ProductController::class, 'store'])->name('product.store')->middleware(['role:Renter|Admin']);
        Route::get('edit-product/{slug}/edit', Update::class)->name('product.edit');

        Route::get('view-products', [ProductController::class, 'viewProducts'])->name('product.index');
        Route::get('view-products/{slug}', [ProductController::class, 'viewProductBySlug'])->name('products.view-by-slug')->middleware(['role:Renter|Admin']);

        Route::post('view-products/{slug}/delete', [ProductController::class, 'deleteProductByID'])->name('products.delete')->middleware(['role:Renter|Admin']);


    });




});






