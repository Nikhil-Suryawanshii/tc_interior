<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminAuthController;
use App\Http\Controllers\seller\SellerAuthController;
use App\Http\Controllers\admin\StudentController;
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
    return view('frontend.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


// Admin Routes
Route::prefix('admin')->group(function () {
    Route::middleware('auth:admin')->group(function () {
        Route::get('/dashboard', function () {
            return view('admin.index');
        })->name('admin.dashboard');
    });

    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminAuthController::class, 'login']);
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

    Route::get('/create', [StudentController::class, 'create'])->name('student.create');
    Route::post('/store', [StudentController::class, 'store'])->name('student.store');
    Route::get('/index', [StudentController::class, 'index'])->name('student.index');
    Route::get('/edit/{id}', [StudentController::class, 'edit'])->name('student.edit');
    Route::post('/update/{id}', [StudentController::class, 'update'])->name('student.update');
    Route::get('/delete/{id}', [StudentController::class, 'delete'])->name('student.delete');
});

// Seller Routes
Route::prefix('seller')->group(function () {
    Route::middleware('auth:seller')->group(function () {
        Route::get('/dashboard', function () {
            return view('seller.index');
        })->name('seller.dashboard');
    });

    Route::get('/login', [SellerAuthController::class, 'showLoginForm'])->name('seller.login');
    Route::post('/login', [SellerAuthController::class, 'login']);
    Route::post('/logout', [SellerAuthController::class, 'logout'])->name('seller.logout');
});
