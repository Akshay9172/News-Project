<?php

use App\Http\Controllers\LanguageController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\NewsControllernew;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;

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


// Route to display the news carousel
Route::get('/', [NewsController::class, 'ShowCarousel']);


// NEWS
Route::get('/create-news', [NewsController::class, 'Index'])->name('news.create');
Route::post('/store-news', [NewsController::class, 'Store'])->name('news.store');
Route::get('/news-list', [NewsController::class, 'Show'])->name('news.list');
Route::get('/news/{id}', [NewsController::class, 'singleNewsShow']);
// Route for showing the form to edit a specific news item
Route::get('/news/{id}/edit', [NewsController::class, 'Edit'])->name('news.edit');
// Route for updating a specific news item
Route::put('/news/{id}', [NewsController::class, 'Update'])->name('news.update');
// Route for deleting a specific news item
Route::delete('/news/{id}', [NewsController::class, 'Destroy'])->name('news.delete');


// LANGUAGES
Route::get('/languages', [LanguageController::class, 'index'])->name('languages.index');
Route::get('/create-languages', [LanguageController::class, 'create'])->name('languages.create');
Route::post('/languages', [LanguageController::class, 'store'])->name('languages.store');
Route::delete('/languages/{id}', [LanguageController::class, 'destroy'])->name('languages.destroy');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Category Table
Route::get('/add-category', [CategoryController::class, 'addCategory']);
Route::post('/add-category', [CategoryController::class, 'storeCategory']);
Route::get('/show-category', [CategoryController::class, 'showCategory']);
Route::get('/delete-category/{id}', [CategoryController::class, 'deleteCategory']);
