<?php

use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\NewsControllernew;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RepoterController;

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
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/news/{id}', [NewsController::class, 'singleNewsShow']);
Route::get('/show-blog', function () {
    return view('UI.Blog.DisplayBlog');
});
Route::get('/all-type-news', [NewsController::class, 'allNewsShow']);
// Reporter Permission
Route::get('/show-repoter', [RepoterController::class, 'show']);
Route::patch('/user/{id}/updateStatus', [RepoterController::class, 'updateStatus']);


Route::get('/news', [NewsController::class, 'Show'])->name('news.show');


// In your web.php or routes file
Route::get('/news/list', [NewsController::class, 'index'])->name('news.list');














// Advertisment
Route::resource('advertisements', AdvertisementController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['middleware' => ['auth']], function () {

    // NEWS
    Route::get('/create-news', [NewsController::class, 'Index'])->name('news.create');
    Route::post('/store-news', [NewsController::class, 'Store'])->name('news.store');
    Route::get('/news-list', [NewsController::class, 'Show'])->name('news.list');

    Route::get('/news/popup/{id}', [NewsController::class, 'PopupDetails'])->name('news.popup');




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


    //Category Table
    Route::get('/add-category', [CategoryController::class, 'addCategory']);
    Route::post('/add-category', [CategoryController::class, 'storeCategory']);
    Route::get('/show-category', [CategoryController::class, 'showCategory']);
    Route::get('/delete-category/{id}', [CategoryController::class, 'deleteCategory']);

    //ContactUs Table
    Route::get('/contact-us', [ContactUsController::class, 'addContactUs']);
    Route::post('/contact-uss', [ContactUsController::class, 'storeContactUs']);
    Route::get('/show-contactus', [ContactUsController::class, 'showContactUs']);
    Route::get('/delete-contactus/{id}', [ContactUsController::class, 'deleteContactUs']);
    // Blogs Table
    Route::get('/add-blog', [BlogController::class, 'addBlog']);
    Route::post('/add-blog', [BlogController::class, 'storeBlog']);
    Route::get('/delete-blog/{id}', [BlogController::class, 'deleteBlog']);



    // web.php
    Route::get('/blog/{slug}/edit', [BlogController::class, 'edit'])->name('blog.edit');
    Route::put('/blog/{id}', [BlogController::class, 'update'])->name('blog.update');
    Route::get('/show-blog', [BlogController::class, 'showBlog'])->name('show.blog');
    Route::get('/blog', [BlogController::class, 'displayBlog'])->name('blog.display');

    Route::get('/about', [BlogController::class, 'about'])->name('about');
    Route::get('/contact', [ContactController::class, 'index'])->name('contact');

    Route::get('/search-blog', [BlogController::class, 'search'])->name('search.blog');

// Route for displaying all blogs (index)
Route::get('/blogs', [BlogController::class, 'index'])->name('blog.index');

// Route for displaying a single blog detail page
Route::get('/blog/{id}', [BlogController::class, 'showBlog'])->name('blog.show');

// Route for displaying a list of blogs (could be for pagination or a different view)
Route::get('/display-blog', [BlogController::class, 'displayBlog'])->name('blog.display');

// Route for search functionality
Route::get('/search', [BlogController::class, 'search'])->name('blog.search');
});
