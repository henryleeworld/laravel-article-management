<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JoinController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');
Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::group(['middleware' => 'auth'], function() {
    Route::resource('articles', ArticleController::class);
    Route::view('invite', 'invite')->name('invite');

    Route::get('join', [JoinController::class, 'create'])->name('join.create');
    Route::post('join', [JoinController::class, 'store'])->name('join.store');

    Route::get('organization/{organization_id}', [JoinController::class, 'organization'])->name('organization');

    // Administrator routes
    Route::group(['middleware' => 'is.admin'], function() {
        Route::resource('categories', CategoryController::class);
    });
});
