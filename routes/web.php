<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect()->route('login');
})->name('general.home');

Route::prefix('admin')
    ->middleware(['auth', 'is_admin'])
    ->group(function() {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//customer vue
Route::prefix('customer')
    ->middleware(['auth', 'is_customer'])
    ->name('customer.')
    ->group(function(){

    Route::get('/', [\App\Http\Controllers\Customer\HomeController::class, 'index'])->name('home');
    Route::resource('products', \App\Http\Controllers\Customer\ProductController::class)
        ->only('index');
    Route::resource('carts', \App\Http\Controllers\Customer\CartController::class)
        ->only('store', 'update');
});

require __DIR__.'/auth.php';
