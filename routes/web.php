<?php

use App\Http\Controllers\AppController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function (Request $request) {
    return view('index');
});

Route::post('/post-test', function (Request $request) {
    dd(request());
});

//Route::get('hello', function () {
//    return view('hello', [
//        'name' => 'Taylor',
//        'age' => 30,
//        'address' => 'Hà Nội'
//    ]);
//});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});



Route::get('/',[AppController::class,'index'])->name('app.index');