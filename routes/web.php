<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
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

     //Students Routes

     Route::get('/student/create',[StudentController::class,'create'])->name('student.create');
     Route::get('/student/list',[StudentController::class,'list'])->name('student.list');
     Route::post('/student/store',[StudentController::class, 'store'])->name('student.store');
     Route::get('/student/edit/{id}',[StudentController::class,'edit'])->name('student.edit');
     Route::put('/student/update/{id}',[StudentController::class,'update'])->name('student.update');
     Route::get('/student/delete/{id}', [StudentController::class, 'delete'])->name('student.delete');


     //Customer Routes
     Route::get('/customer/create',[CustomerController::class,'create'])->name('customer.create');
     Route::get('/customer/list',[CustomerController::class,'list'])->name('customer.list');
     Route::post('/customer/store',[CustomerController::class, 'store'])->name('customer.store');
     Route::get('/customer/edit/{id}',[CustomerController::class,'edit'])->name('customer.edit');
     Route::put('/customer/update/{id}',[CustomerController::class,'update'])->name('customer.update');
     Route::get('/customer/delete/{id}', [CustomerController::class, 'delete'])->name('customer.delete');

     //Employee Routes
     Route::get('/employee/create',[EmployeeController::class,'create'])->name('employee.create');
     Route::get('/employee/list',[EmployeeController::class,'list'])->name('employee.list');
     Route::post('/employee/store',[EmployeeController::class, 'store'])->name('employee.store');
     Route::get('/employee/edit/{id}',[EmployeeController::class,'edit'])->name('employee.edit');
     Route::put('/employee/update/{id}',[EmployeeController::class,'update'])->name('employee.update');
     Route::get('/employee/delete/{id}', [EmployeeController::class, 'delete'])->name('employee.delete');
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
