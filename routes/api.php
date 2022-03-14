<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\API\ProductController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware('auth:api')->group( function () {
    // Route::resource('products', ProductController::class);
    Route::post('/store', [ProductController::class, 'store'])->name('store');
    Route::get('/index', [ProductController::class, 'index'])->name('index');
    Route::get('/find/{id}', [ProductController::class, 'find'])->name('find');
    Route::delete('/delete/{id}', [ProductController::class, 'delete'])->name('delete');


});
Route::post('/login', [RegisterController::class, 'login'])->name('login');
Route::post('/register', [RegisterController::class, 'register'])->name('register');
Route::put('/put/{id}', [ProductController::class, 'update'])->name('put');
