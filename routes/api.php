<?php

use App\Http\Controllers\Authcontroller;
use App\Http\Controllers\BookController;
use App\Http\Controllers\EntryController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\LeagueController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\PopulationController;
use App\Http\Controllers\PredictionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\RewardController;
use App\Http\Controllers\ScoreController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\UssdController;
use App\Http\Controllers\VueItemController;
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
Route::resource('leagues',LeagueController::class);

Route::resource('students',StudentController::class);

Route::resource('predictions',PredictionController::class);
Route::resource('items',VueItemController::class );
Route::resource('entries',EntryController::class);
Route::resource('scores',ScoreController::class);

Route::resource('projects',ProjectController::class);
// Route::post('projects',ProjectController::class);

Route::resource('rewards',RewardController::class);

Route::resource('notifications',NotificationController::class);

Route::resource('populations',PopulationController::class);
Route::resource('forms',FormController::class);

Route::get('api/uploa',UploadController::class);
