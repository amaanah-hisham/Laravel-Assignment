<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductSubCategoryController;
use App\Http\Controllers\ProductTestSubCategoryController;

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
Route::middleware([])->group(function(){
    Route::get('/',[HomeController::class,'index'])->name('home');
});


/*
Route::get('/', function () {
    return view('welcome');
});

Route::get('l', function () {
    return view('bts');
});

Route::get('welcomePPP', function () {
    return view('welcomePage', [
        'name' => 'Amaanah',
        'age' => 22,
        'address' => '43/2, Kotahena'
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


*/

Route::get('/about-us', function (Request $request) {
    return view('about');
})->name('about');


Route::post('/post-test', function (Request $request) {
    dd(request());
});


//For the Renter registration form
Route::get('renter-registration', [UserController::class, 'renterRegistrationForm'])->name('renter-registration');
Route::post('renter-registration', [UserController::class, 'renterRegistration'])->name('renter-registration.post');

//Route::get('hello', function () {
//    return view('hello', [
//        'name' => 'Taylor',
//        'age' => 30,
//        'address' => 'Hà Nội'
//    ]);
//});

Route::group(['middleware' => ['role:Admin']],function(){
    Route::get('product-sub-categories/create',[ProductTestSubCategoryController::class, 'viewSubCategoryForm'])->name('product-sub-categories.create');
    Route::post('product-sub-categories/create',[ProductTestSubCategoryController::class, 'storeSubCategory'])->name('product-sub-categories.store');
});


//to call the product details page
Route::get('/products', function (Request $request) {
    return view('product-details');
})->name('product-details');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource(
        'product-category',
        \App\Http\Controllers\ProductCategoryController::class
    );



    Route::resource(
        'user',
        \App\Http\Controllers\UserController::class

    );



});






