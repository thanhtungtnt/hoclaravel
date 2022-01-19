<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Admin\Users\LoginController;
use \App\Http\Controllers\Admin\MainController;
use \App\Http\Controllers\Admin\MenuController;
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

Route::prefix('admin')->group(function(){
    Route::get('users/login', [LoginController::class, 'index'])->name('login');
    Route::post('users/login/store', [LoginController::class, 'store']);

    //Middleware Auth
    Route::middleware(['auth'])->group(function () {
        Route::get('/', [MainController::class, 'index'])->name('admin');
        Route::get('main', [MainController::class, 'index']);
    });

    //Menu
    Route::prefix('menus')->group(function(){
        Route::get('add', [MenuController::class, 'create']);
        Route::post('add',[MenuController::class, 'store']);
        Route::get('list', [MenuController::class, 'index']);
    });
});

