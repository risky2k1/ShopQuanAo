<?php

use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
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



Route::get('/home', [HomeController::class, 'index'])->name('index');

Route::group(
    [
        'prefix' => 'shop',
        'as' => 'shop.'
    ],
    static function () {
        Route::get('/', [ShopController::class, 'index'])->name('index');
    }
);
Auth::routes();
Route::group(
    [
        'prefix' => 'quan-tri',
        'as' => 'quan-tri.',
    ],
    static function () {
        Route::get('/index', [AdminController::class, 'index'])->name('index');
        Route::resource('product', ProductController::class );
    }
);



