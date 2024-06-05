
<?php

use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\ProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [LoginController::class, 'login'])->name('api.login');
Route::get('products', [ProductController::class, 'getProducts'])->name('api.show-renter-products')->middleware(['auth:sanctum', 'role:Renter']);
Route::get('productsl', [ProductController::class, 'getProductsl'])->name('api.show-renter-productsl');

Route::get('get-users',[UserController::class, 'getUsers'])->name('api.get-users')->middleware(['auth:sanctum', 'role:Admin']);
