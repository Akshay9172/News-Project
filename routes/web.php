<?php

use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/news', function () {
//     return view('News.addNews');
// });

// Route::get('/create-news', [NewsController::class, 'index']);

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Category Table
Route::get('/add-category',[CategoryController::class,'addCategory']);
Route::post('/add-category',[CategoryController::class,'storeCategory']);
Route::get('/show-category',[CategoryController::class,'showCategory']);
Route::get('/delete-category/{id}',[CategoryController::class,'deleteCategory']);
