<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ClientsController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeServiceController;
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

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');
Route::get('/about', function () {
    return view('about');
})->name('about');


Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('banner/create', [BannerController::class, 'create'])->name('banner.create');
    Route::post('banner/store', [BannerController::class, 'store'])->name('banner.store');
    Route::get('banner', [BannerController::class, 'index'])->name('banner.index');
    Route::get('banner/{id}/edit', [BannerController::class, 'edit'])->name('banner.edit');
    Route::put('banner/{id}', [BannerController::class, 'update'])->name('banner.update');
    Route::delete('banner/{id}', [BannerController::class, 'destroy'])->name('banner.destroy');
    Route::resource('services', ServiceController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('clients', ClientsController::class);
    Route::resource('testimonial', TestimonialController::class);
    Route::get('/services/filter', [HomeServiceController::class, 'filter']);
    Route::get('/contact', [ContactController::class, 'showMessages'])->name('contact.index');
});
