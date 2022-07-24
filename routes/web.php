<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SettingController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Auth::routes();

// Admin Route
Route::group(['prefix' => 'admin', 'middleware' => ['admin']], function(){
    Route::get('/', [AdminController::class, 'index'])->name('admin');
    Route::get('/settings', [SettingController::class, 'index'])->name('admin.settings');
    Route::post('/settings', [SettingController::class, 'store'])->name('admin.settings.store');

    // Post Route
    Route::get('/posts', [PostController::class, 'index'])->name('admin.posts');
    Route::get('/posts/create', [PostController::class, 'create'])->name('admin.post.create');
    Route::post('/posts/create', [PostController::class, 'store']);
    Route::get('/posts/edit/{id}', [PostController::class, 'edit']);
    Route::post('posts/update/{id}', [PostController::class, 'update']);
    Route::get('/posts/delete/{id}', [PostController::class, 'destroy']);

});