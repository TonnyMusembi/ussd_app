<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VueItemController;
use App\Http\Controllers\GoogleChartController;

use App\Http\Controllers\BlogController;

use App\Http\Livewire\Posts;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('user-pagination', function () {
    return view('default');
});

Route::controller(FileController::class)->group(function(){
    Route::get('file-upload', 'index');
    Route::post('file-upload', 'store')->name('file.upload');
});

Route::get('posts', Posts::class);


Route::get('manage-vue', [VueItemController::class]);
// Route::resource('vueitems',[VueItemController::class]);

Route::get('notification', [HomeController::class,'notification']);

Route::get('chart', [GoogleChartController::class, 'index']);
Route::post('validate-exists', [ BlogController::class,'store'])->name('validate.exists');
Route::get('/index', [ BlogController::class,'index']);


