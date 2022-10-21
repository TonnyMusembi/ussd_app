<?php

use App\Http\Controllers\Authcontroller;
use App\Http\Controllers\BookController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UssdController;
use GuzzleHttp\Middleware;
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
Route::group(['Middleware'=>'api','prefix'=>'auth'],function($router){
    Route::post('/register',[Authcontroller::class,'register']);
    Route::post('/login',[Authcontroller::class,'login']);


});

Route::post('ussd-session', [UssdController::class,'session']);
Route::resource('tests',TestController::class);

Route::resource('photos',PhotoController::class);

Route::resource('products',ProductController::class);

Route::resource('transactions',TransactionController::class);

Route::resource('books',BookController::class);
