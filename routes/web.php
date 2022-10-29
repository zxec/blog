<?php

use App\Http\Controllers\Main\IndexController;

//use App\Http\Controllers\Admin\Main\IndexController;
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

Route::group(['namespace' => '\App\Http\Controllers\Main'], function () {
    Route::get('/', 'IndexController')->name('main.index');
});

Route::name('admin.')->prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::group(['namespace' => '\App\Http\Controllers\Admin\Main', 'as' => 'main.'], function () {
        Route::get('/', 'IndexController')->name('index');
    });

    Route::group(['namespace' => '\App\Http\Controllers\Admin\Category', 'prefix' => 'categories', 'as' => 'category.'], function () {
        Route::get('/', 'IndexController')->name('index');
        Route::get('/create', 'CreateController')->name('create');
        Route::post('/', 'StoreController')->name('store');
        Route::get('/{category}', 'ShowController')->name('show');
        Route::get('/{category}/edit', 'EditController')->name('edit');
        Route::patch('/{category}', 'UpdateController')->name('update');
        Route::delete('/{category}', 'DestroyController')->name('destroy');
    });

    Route::group(['namespace' => '\App\Http\Controllers\Admin\Tag', 'prefix' => 'tags', 'as' => 'tag.'], function () {
        Route::get('/', 'IndexController')->name('index');
        Route::get('/create', 'CreateController')->name('create');
        Route::post('/', 'StoreController')->name('store');
        Route::get('/{tag}', 'ShowController')->name('show');
        Route::get('/{tag}/edit', 'EditController')->name('edit');
        Route::patch('/{tag}', 'UpdateController')->name('update');
        Route::delete('/{tag}', 'DestroyController')->name('destroy');
    });

    Route::group(['namespace' => '\App\Http\Controllers\Admin\Post', 'prefix' => 'posts', 'as' => 'post.'], function () {
        Route::get('/', 'IndexController')->name('index');
        Route::get('/create', 'CreateController')->name('create');
        Route::post('/', 'StoreController')->name('store');
        Route::get('/{post}', 'ShowController')->name('show');
        Route::get('/{post}/edit', 'EditController')->name('edit');
        Route::patch('/{post}', 'UpdateController')->name('update');
        Route::delete('/{post}', 'DestroyController')->name('destroy');
    });

    Route::group(['namespace' => '\App\Http\Controllers\Admin\User', 'prefix' => 'users', 'as' => 'user.'], function () {
        Route::get('/', 'IndexController')->name('index');
        Route::get('/create', 'CreateController')->name('create');
        Route::post('/', 'StoreController')->name('store');
        Route::get('/{user}', 'ShowController')->name('show');
        Route::get('/{user}/edit', 'EditController')->name('edit');
        Route::patch('/{user}', 'UpdateController')->name('update');
        Route::delete('/{user}', 'DestroyController')->name('destroy');
    });
});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
