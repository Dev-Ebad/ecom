<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PaymentController;
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
    Route::post('/checkEmail' , [AdminController::class, 'checkEmail'])->name('admin.checkEmail');

});

 // --------

// User routes

Route::prefix('user')->middleware(['auth', 'user'])->group(function () {
    
    // get routes
    Route::get('/' , [UserController::class, 'index'])->name('user.index');
    Route::get('/mens' , [UserController::class, 'mens'])->name('user.mens');
    Route::get('/womens' , [UserController::class, 'womens'])->name('user.womens');
    Route::get('/product_detail' , [UserController::class, 'product_detail'])->name('user.product_detail');
    Route::get('/about' , [UserController::class, 'about'])->name('user.about');
    Route::get('/single_product/{id}' , [UserController::class, 'single_product'])->name('user.single_product');
    Route::get('/cart' , [UserController::class, 'cart'])->name('user.cart');
    Route::get('/checkout-page/{total}' , [UserController::class, 'checkout_page'])->name('user.checkout-page');
    Route::get('/user_profile' , [UserController::class, 'user_profile'])->name('user.user_profile');
    Route::get('/contact' , [UserController::class, 'contact'])->name('user.contact');
    
    // post route
    Route::post('/addToCart' , [UserController::class, 'addToCart'])->name('user.addToCart');
    Route::post('/change_quantity' , [UserController::class, 'change_quantity'])->name('user.change_quantity');
    Route::post('/remove_cart' , [UserController::class, 'remove_cart'])->name('user.remove_cart');
    Route::post('/count_cart' , [UserController::class, 'count_cart'])->name('user.count_cart');
    Route::post('/filter_brand' , [UserController::class, 'filter_brand'])->name('user.filter_brand');
    Route::post('/search_filter' , [UserController::class, 'search_filter'])->name('user.search_filter');
    Route::post('/edit_user/{id}' , [UserController::class, 'edit_user'])->name('user.edit_user');
    Route::post('/account_details' , [UserController::class, 'account_details'])->name('user.account_details');
    Route::post('/orders' , [UserController::class, 'orders'])->name('user.orders');

    

    
    Route::controller(PaymentController::class)->group(function(){
        
        // Route::post('checkout', 'checkout')->name('user.checkout'); 
        Route::get('stripe', 'stripe')->name('stripe');
        Route::post('stripe', 'stripePost')->name('stripe.post');
    
        
    });
    
});

Route::get('/' , [UserController::class, 'index'])->name('user.index');
Route::get('/mens' , [UserController::class, 'mens'])->name('user.mens');
Route::get('/womens' , [UserController::class, 'womens'])->name('user.womens');
Route::get('/product_detail' , [UserController::class, 'product_detail'])->name('user.product_detail');
Route::get('/about' , [UserController::class, 'about'])->name('user.about');
Route::get('/single_product/{id}' , [UserController::class, 'single_product'])->name('user.single_product');


// - --------

Auth::routes();
