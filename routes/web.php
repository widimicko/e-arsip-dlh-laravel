<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FieldController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\CategoryController;

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

Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticate']);

Route::get('/', [HomeController::class, 'index'])->middleware('auth');

Route::prefix('dashboard')
    ->middleware(['auth'])
    ->group(function() {
        Route::resource('/archives', ArchiveController::class);
        Route::get('/archives/fields/{field}', [ArchiveController::class, 'field']);
        Route::get('/archives/{archive}/download', [ArchiveController::class, 'download']);

        Route::resource('/categories', CategoryController::class)->middleware('admin');
        Route::resource('/fields', FieldController::class)->middleware('admin');
        Route::resource('/users', UserController::class)->middleware('admin');

        Route::get('/change-password', [AuthController::class, 'showChangePassword']);
        Route::post('/change-password', [AuthController::class, 'changePassword']);
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
