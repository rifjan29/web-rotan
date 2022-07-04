<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\FeaturesController;
use App\Http\Controllers\Frontend\BlogController as FrontendBlogController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\HomeController as FrontendHomeController;
use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriBlogController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\OurTeamsController;
use App\Http\Controllers\ProductController as ControllersProductController;
use App\Http\Controllers\UserController;
use App\Models\Product;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
// beranda
Route::get('/',[FrontendHomeController::class,'index'])->name('home');
// product
Route::get('/product/{slug}',[ProductController::class,'index'])->name('product');
Route::get('/detail/{slug}',[ProductController::class,'detail'])->name('product.detail');
// contact
Route::resource('/contact', ContactController::class);
// ourTeams
Route::get('/our-teams',[FrontendHomeController::class,'ourTeams'])->name('ourteams.index');

// blog
Route::get('/blog', [FrontendBlogController::class,'index'])->name('blogData.index');
Route::get('/detail-blog/{slug}', [FrontendBlogController::class,'detail'])->name('blog.detail');
// Route::get('/detail/{slug}', FrontendBlogController::class,'detail')->name('blog.detail');
Route::middleware(['auth'])->group(function () {
        Route::get('/administrator',[HomeController::class,'Dashboard'])->name('admin.index');
    Route::prefix('administrator')->group(function()
    {
        // kategori
        Route::resource('/kategori', KategoriController::class);
        // kategori produk
        Route::resource('/produk', ControllersProductController::class);
        // Data master beranda
        Route::resource('/master-beranda', HomeController::class);
        // Data master Features
        Route::resource('/master-features', FeaturesController::class);
        //  data contact
        Route::get('/data-contact',[ContactController::class,'DataContact'])->name('data.contact');
        Route::delete('/data-contact/{id}',[ContactController::class,'destroy'])->name('delete.contact');
        // ganti status
        Route::get('/status/{id}', [HomeController::class,'Status'])->name('change.status');
        // Profile admin
        Route::get('/profile/{id}/edit', [UserController::class,'edit'])->name('profile.edit');
        Route::put('/profile/{id}/update', [UserController::class,'update'])->name('profile.update');
        // Route::get('/edit-password/{id}/edit',[UserController::class,'EditPassword'])->name('edit.password');
        Route::put('/edit-password/{id}/update', [UserController::class,'UpdatePassword'])->name('update.password');
        // kategori blog
        Route::resource('/kategori-blog', KategoriBlogController::class);
        // blog
        Route::resource('/blog', BlogController::class);
        // our teams
        Route::resource('/our-teams',OurTeamsController::class);
    });
});

require __DIR__.'/auth.php';
