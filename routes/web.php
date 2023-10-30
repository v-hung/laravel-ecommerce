<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\SitemapController;
use Illuminate\Support\Facades\Route;
use TCG\Voyager\Facades\Voyager;

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

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/feedback', [HomeController::class, 'feedback'])->name('feedback');

Route::get('/shop', [ShopController::class, 'shop']);
Route::get('/search', [ShopController::class, 'shop']);

Route::get('/collections', [ProductController::class, 'collections']);
Route::get('/collections/{slug}', [ProductController::class, 'collectionDetail']);
Route::get('/products/{slug}', [ProductController::class, 'productDetail']);

Route::get('/blogs/{blogSlug}', [BlogController::class, 'blogDetail']);
Route::get('/blogs/{blogSlug}/{slug}', [BlogController::class, 'postDetail']);
Route::get('/posts/{slug}', [BlogController::class, 'postDetail']);

// Route::get('/pages', [PageController::class, 'pages']);
Route::get('/pages/{slug}', [PageController::class, 'pageDetail']);

// account
Route::prefix('/account')->group(function () {
  Route::middleware('auth')->group(function() {
    Route::get('/', [AccountController::class, 'profile']);
    Route::post('/update', [AccountController::class, 'update']);
  });
});

Route::fallback([HomeController::class, 'notFound']);

Route::get('/sitemap.xml', [SitemapController::class, 'index']);

Route::get('/dashboard', function () {
  return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::group(['prefix' => 'admin'], function () {
  Voyager::routes();
});
