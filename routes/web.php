<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GalleryController;

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

Route::get('/', [HomeController::class, 'index'])->name('welcome');
Route::get('/about', [AboutController::class, 'index'])->name('about.index');
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');
Route::get('/blog/{post:slug}', [HomeController::class, 'viewPost'])->name('blog.view');
Route::post('/contact/create', [ContactController::class, 'create'])->name('contact.create.ticket');

Route::middleware('admin')->group(function () {
    Route::prefix('admin')->controller(AdminController::class)->group(function () {
        Route::get('/', 'index')->name('admin.dashboard');
        Route::get('/tickets', 'tickets')->name('admin.tickets');
        Route::get('/ticket/view/{id}', 'viewTicket')->name('admin.ticket.view');
        Route::post('/ticket/update/{id}', 'updateTicket')->name('admin.ticket.update');
        Route::get('/blog', 'blog')->name('admin.blog.index');
        Route::post('/blog', 'newBlogPost')->name('admin.blog.save');
        Route::get('/upload', 'galleryIndex')->name('admin.gallery.index');
        Route::post('/upload', 'newPhoto')->name('admin.gallery.upload');
        Route::get('/settings', 'settings')->name('admin.settings.index');
        Route::post('/settings', 'saveSettings')->name('admin.settings.save');
    });
});