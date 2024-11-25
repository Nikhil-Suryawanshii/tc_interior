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



// Route::prefix('admin')->group(function () {
//     Route::get('/login', [AdminAuthController::class, 'showLoginForm']);
//     Route::post('/login', [AdminAuthController::class, 'login']);
//     Route::middleware('admin')->group(function () {
//         Route::get('/dashboard', function () {
//             return 'Admin Dashboard';
//         });
//     });
// });


// Route::prefix('seller')->group(function () {
//     Route::get('/login', [SellerAuthController::class, 'showLoginForm']);
//     Route::post('/login', [SellerAuthController::class, 'login']);
//     Route::middleware('seller')->group(function () {
//         Route::get('/dashboard', function () {
//             return 'Seller Dashboard';
//         });
//     });
// });



// Admin Routes
Route::prefix('admin')->group(function () {
    Route::middleware('auth:admin')->group(function () {
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');
    });

    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminAuthController::class, 'login']);
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
});

// Seller Routes
Route::prefix('seller')->group(function () {
    Route::middleware('auth:seller')->group(function () {
        Route::get('/dashboard', function () {
            return view('seller.dashboard');
        })->name('seller.dashboard');
    });

    Route::get('/login', [SellerAuthController::class, 'showLoginForm'])->name('seller.login');
    Route::post('/login', [SellerAuthController::class, 'login']);
    Route::post('/logout', [SellerAuthController::class, 'logout'])->name('seller.logout');
});
