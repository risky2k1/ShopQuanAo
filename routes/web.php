<?php

use App\Http\Controllers\admin\BrandController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Shop\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

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
        Route::get('/', [HomeController::class, 'home'])->name('home');
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

    }
);



