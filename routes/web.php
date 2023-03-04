<?php

use App\Http\Controllers\admin\BrandController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Shop\HomeController;
use App\Http\Controllers\Shop\ShopController;
use App\Http\Middleware\CheckAdminMiddleware as CheckAdminMiddlewareAlias;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

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
    return view('shop.index');
});

Route::get('/login',[AuthController::class,'login'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/registering', [AuthController::class, 'registering'])->name('registering');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/auth/redirect/{provider}',[AuthController::class,'redirect'])->name('auth.redirect');

Route::get('/auth/callback/{provider}', [AuthController::class,'callback'])->name('auth.callback');


Route::group(
    [
        'prefix' => 'home',
        'as' => 'home.'
    ],
    static function () {
        Route::get('/', [HomeController::class, 'home'])->name('home');
    }
);
Route::group(
    [
        'prefix' => 'shop',
        'as' => 'shop.'
    ],
    static function () {
        Route::get('/', [ShopController::class, 'index'])->name('index');
        Route::get('/productDetail/{id}', [ShopController::class, 'productDetail'])->name('productDetail');
        Route::get('/cart', [CartController::class,'index']);
        Route::get('/cart/addCart/{id}', [CartController::class,'addCart']);
        Route::get('/cart/deleteCart/{id}', [CartController::class,'DeleteItemCart']);
        Route::get('/cart/checkout', [CartController::class,'checkout'])->name('checkout');
    }
);

Route::group(
    [
        'prefix' => 'quan-tri',
        'as' => 'quan-tri.',
    ],
    static function () {
        Route::get('/index', [AdminController::class, 'index'])->name('index');
        Route::resource('product', ProductController::class );
        Route::resource('category', CategoryController::class );
        Route::resource('brand', BrandController::class );
        Route::get('/user', [UserController::class, 'index'])->name('user');

    }
)->middleware(CheckAdminMiddlewareAlias::class);





