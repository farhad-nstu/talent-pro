<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AuthSessionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
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

Route::get('/home', [HomeController::class, 'index'])->name('dashboard');
Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
    Route::get('/{id}/show', [UserController::class, 'show'])->name('user_info.show');
    Route::get('/{id}/profile', [UserController::class, 'user_profile'])->name('profile.info');
    Route::post('/update/profile', [UserController::class, 'update_user_profile'])->name('update.profile');
    Route::get('/{id}/change-password', [UserController::class, 'change_password'])->name('change.password');
    Route::patch('user/{id}/change-password', [UserController::class, 'password_update'])->name('update.password');
    Route::get('/{id}/screen_lock', [UserController::class, 'screen_lock'])->name('screen.lock');
});
Route::group(['prefix' => 'shortenUrls', 'as' => 'shortenUrls.'], function () {
    Route::get('/get/urls', [ShortenUrlController::class, 'getUrls'])->name('getUrls');
    Route::get('/create/url', [ShortenUrlController::class, 'createUrl'])->name('createUrl');
    Route::post('/store/url', [ShortenUrlController::class, 'storeUrl'])->name('storeUrl');
    Route::get('/edit/url/{id}', [ShortenUrlController::class, 'editUrl'])->name('editUrl');
    Route::patch('update/url/{id}', [ShortenUrlController::class, 'updateUrl'])->name('updateUrl');
    Route::post('/delete/url', [ShortenUrlController::class, 'deleteUrl'])->name('deleteUrl');
});

Route::get('/shorten-link/{shorten_url}', [ShortenUrlController::class, 'getShortenLink'])->name('getShortenLink');

Route::post('/logout', [AuthSessionController::class, 'destroy'])
    ->name('logout');
