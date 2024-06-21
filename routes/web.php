<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Admin routes

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    // get routes
    Route::get('/' , [AdminController::class, 'index'])->name('admin.index');
    Route::get('/users' , [AdminController::class, 'users'])->name('admin.users');
    Route::get('/table' , [AdminController::class, 'table'])->name('admin.table');
    Route::get('/products' , [AdminController::class, 'products'])->name('admin.products');
    
    // Post Routes
    
    Route::post('/edit' , [AdminController::class, 'edit_user'])->name('admin.edit_user');
    Route::post('/register' , [AdminController::class, 'create_user'])->name('admin.create_user');
    Route::post('/product' , [AdminController::class, 'create_product'])->name('admin.create_product');
    Route::post('/update' , [AdminController::class, 'update_user'])->name('admin.update_user');
    Route::post('/delete' , [AdminController::class, 'delete_user'])->name('admin.delete_user');
});

 // --------

// User routes

Route::prefix('user')->middleware(['auth', 'user'])->group(function () {
    Route::get('/' , [UserController::class, 'index'])->name('user.index');
});


// - --------

Auth::routes();
