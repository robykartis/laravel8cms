<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FileManagerController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TagController;



Route::get('/', function () {
    return view('welcome');
});

// Auth::routes();
Auth::routes([
    // 'register' => false
]);

Route::get('/localization/{language}', [LocalizationController::class, 'switch'])->name('localization.switch');

Route::group(['prefix' => 'dashboard', 'middleware' => ['web', 'auth']], function () {
    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
    // category menggunakan resource

    Route::get('/categories/select', [CategoryController::class, 'select'])->name('categories.select');
    Route::resource('/categories', CategoryController::class);
    Route::get('/tags/select', [TagController::class, 'select'])->name('tags.select');
    // Route Tag(except : untuk mengilangkan route how pada tags)
    Route::resource('/tags', TagController::class)->except(['show']);

    // Route Post
    Route::resource('/posts', PostController::class);
    //Route file manager
    Route::group(['prefix' => 'filemanager'], function () {
        Route::get('/index', [FileManagerController::class, 'index'])->name('filemanager.index');
        \UniSharp\LaravelFilemanager\Lfm::routes();
    });

    // Route Roles
    Route::resource('/roles', RoleController::class);
});