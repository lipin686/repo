<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AdminController;

use App\Http\Controllers\Web\AuthenticationController; 
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\RegisterController;
use App\Http\Controllers\Admin\ItemController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\HomeController;
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


//首頁和登入
Route::get('/', [IndexController::class, 'showProfile'])->name('indexpage');
Auth::routes();
Route::get('/logout', [IndexController::class, 'logout'])->name('logout');
//第三方登入
Route::get( '/auth/{social}', [AuthenticationController::class, 'getSocialRedirect'] )->name('social')
    ->middleware('guest');
Route::get( '/auth/{social}/callback', [AuthenticationController::class, 'getSocialCallback'] )
    ->middleware('guest');

//admin頁面和登入
Route::get('admin', [IndexController::class, 'index'])->name('admin.index')->middleware('auth:admin');
Route::get('admin/login', [LoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin/login', [LoginController::class, 'login']);
Route::get('admin/register', [LoginController::class, 'showRegistrationForm'])->name('admin.register');
Route::post('admin/register', [LoginController::class, 'register']);
Route::get('admin/logout', [LoginController::class, 'logout'])->name('admin.logout');

//admin後台
Route::resource('/admin/users', UserController::class);
Route::resource('/admin/items', ItemController::class);
Route::resource('/admin/tags', TagController::class);
Route::resource('/admin/orders', OrdersController::class);
//Route::get('/admin/users', 'Admin\UserController@index')->name('admin.user.index');
Route::get('/admin/items', [ItemController::class, 'index'])->name('admin.item.index');
Route::get('/admin/tags', [TagController::class, 'index'])->name('admin.tag.index');
Route::get('/admin/orders', [OrdersController::class, 'index'])->name('admin.order.index');


//購物車
Route::get('/view/{id}', [CartController::class, 'index'])->name('view');
Route::get('/add_to_cart/{id}/{count}', [CartController::class, 'getAddToCart'])->name('getAddToCart');
Route::get('/cart', [CartController::class, 'cart'])->name('cart');
Route::get('/increase-one-item/{id}', [CartController::class, 'increaseByOne']);
Route::get('/decrease-one-item/{id}', [CartController::class, 'decreaseByOne']);
Route::get('/remove-item/{id}', [CartController::class, 'removeItem']);
Route::get('/clear-cart', [CartController::class, 'clearCart']);

//訂單
Route::get('/order/new', [OrderController::class, 'new']);
Route::get('/orders', [OrderController::class, 'index']);
Route::post('/orders', [OrderController::class, 'store']);
Route::post('/callback', [OrderController::class, 'callback']);
Route::get('/success', [OrderController::class, 'redirectFromECpay']);

//搜尋
Route::get('/Search/{keyword}', [IndexController::class, 'Search']);
Route::get('/Search', [IndexController::class, 'SearchBackIndex']);

//輪播
Route::get('/Iphone14', [IndexController::class, 'Iphone14']);
Route::get('/newitems', [IndexController::class, 'newitems']);
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
