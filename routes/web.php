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
    
    Route::post('/edit/user' , [AdminController::class, 'edit_user'])->name('admin.edit_user');
    Route::post('/register' , [AdminController::class, 'create_user'])->name('admin.create_user');
    Route::post('/product' , [AdminController::class, 'create_product'])->name('admin.create_product');
    Route::post('/category' , [AdminController::class, 'create_category'])->name('admin.create_category');
    Route::post('/update' , [AdminController::class, 'update_user'])->name('admin.update_user');
    Route::post('/delete' , [AdminController::class, 'delete_user'])->name('admin.delete_user');
    Route::post('/delete/product' , [AdminController::class, 'delete_product'])->name('admin.delete_product');
    Route::post('/edit/product' , [AdminController::class, 'edit_product'])->name('admin.edit_product');
    Route::post('/update/product/{id}' , [AdminController::class, 'update_product'])->name('admin.update_product');
});

 // --------

// User routes

Route::prefix('user')->middleware(['auth', 'user'])->group(function () {
    Route::get('/' , [UserController::class, 'index'])->name('user.index');
    Route::get('/mens' , [UserController::class, 'mens'])->name('user.mens');
    Route::get('/womens' , [UserController::class, 'womens'])->name('user.womens');
    Route::get('/product_detail' , [UserController::class, 'product_detail'])->name('user.product_detail');
    Route::get('/single_product/{id}' , [UserController::class, 'single_product'])->name('user.single_product');
    Route::get('/cart' , [UserController::class, 'cart'])->name('user.cart');
    Route::post('/addToCart' , [UserController::class, 'addToCart'])->name('user.addToCart');
    Route::post('/change_quantity' , [UserController::class, 'change_quantity'])->name('user.change_quantity');
    Route::post('/remove_cart' , [UserController::class, 'remove_cart'])->name('user.remove_cart');
    Route::post('/count_cart' , [UserController::class, 'count_cart'])->name('user.count_cart');
});


// - --------

Auth::routes();
