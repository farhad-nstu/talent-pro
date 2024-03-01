<?php

use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['middleware' => ['throttle:api','cors','json.response']],function () {
    // auth routes
    Route::post('/login', [AuthController::class, 'login'])->name('login.api');
    Route::post('/register',[AuthController::class, 'register'])->name('register.api');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout.api');

    Route::middleware('auth:api')->group(function () {
        // our routes to be protected will go in here
        // Route::post('/logout', 'Api\AuthController@logout')->name('logout.api');
        Route::get('users', [UserController::class, 'getUsers']);
        Route::get('user/{id}', [UserController::class, 'getSingleUser']);
        Route::post('user/create', [UserController::class, 'createUser']);
        Route::put('user/edit/{id}', [UserController::class, 'editUser']);
        Route::delete('user/delete/{id}', [UserController::class, 'deleteUser']);
    });
});
