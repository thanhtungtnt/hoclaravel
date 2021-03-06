<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Admin\Users\LoginController;
use \App\Http\Controllers\Admin\MainController;
use \App\Http\Controllers\Admin\MenuController;
use \App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UploadController;

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
        Route::get('edit/{menu}', [MenuController::class, 'show']);
        Route::post('edit/{menu}',[MenuController::class, 'update']);
        Route::get('list', [MenuController::class, 'index']);
        Route::DELETE('destroy', [MenuController::class, 'destroy']);
    });

    //Product
    Route::prefix('products')->group(function(){
        Route::get('add', [ProductController::class, 'create']);
        Route::post('add',[ProductController::class, 'store']);
        Route::get('list',[ProductController::class, 'index']);
    });

    //Upload
    Route::post('upload/services', [UploadController::class, 'store']);
});

