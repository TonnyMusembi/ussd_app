<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;
use App\Http\Controllers\VueItemController;
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
