<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Authenticate;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/loginAction', [AuthController::class, 'loginAction'])->name('login.action');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::prefix('registration')->group(function () {
    Route::get('/', [RegisterController::class, 'register'])->name('register');
    Route::post('/insert', [RegisterController::class, 'insert'])->name('register.add');
});

Route::middleware('auth', 'auth')->group(function () {
    Route::prefix('dashboard')->group(function () {
        Route::get('/', [HomeController::class, 'index2'])->name('dashboard');
    });
});





// Route::get('product', )