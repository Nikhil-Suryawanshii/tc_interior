<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminAuthController;
use App\Http\Controllers\seller\SellerAuthController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';



Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLoginForm']);
    Route::post('/login', [AdminAuthController::class, 'login']);
    Route::middleware('admin')->group(function () {
        Route::get('/dashboard', function () {
            return 'Admin Dashboard';
        });
    });
});


Route::prefix('seller')->group(function () {
    Route::get('/login', [SellerAuthController::class, 'showLoginForm']);
    Route::post('/login', [SellerAuthController::class, 'login']);
    Route::middleware('seller')->group(function () {
        Route::get('/dashboard', function () {
            return 'Seller Dashboard';
        });
    });
});
