<?php

use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
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

// Route::domain('admin')->group(function(){
//     Route::get('/home', [AdminHomeController::class, 'index'])->name('admin.home');
// });

Route::get("/", [HomeController::class, 'index'])->name('home');
Route::post("/login", [AuthController::class, 'login'])->name('login');

Route::get('/register', [AuthController::class, 'register_page'])->name('page.register');
Route::post('/register', [AuthController::class, 'register'])->name('post.register');

Route::get('/forgot', [AuthController::class, 'forgot_password_page'])->name('page.forgot');
Route::post('/forgot', [AuthController::class, 'forgot_password'])->name('post.forgot');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard')->middleware('user_api_key');

Route::prefix('fingerprints')->group(function(){
    Route::get('/', [DashboardController::class, 'fingerprints_page'])->name('page.fingerprints');
    Route::get('/export', [DashboardController::class, 'fingerprint_export'])->name('export.fingerprints');
})->middleware('user_api_key');

Route::prefix('geolocations')->group(function(){
    Route::get('/', [DashboardController::class, 'geolocations_page'])->name('page.geolocations');
    Route::get('/export', [DashboardController::class, 'geolocation_export'])->name('export.geolocations');
})->middleware('user_api_key');

Route::prefix('durations')->group(function(){
    Route::get('/', [DashboardController::class, 'durations_page'])->name('page.durations');
    Route::get('/export', [DashboardController::class, 'durations_export'])->name('export.durations');
})->middleware('user_api_key');


Route::get('/parameters', [DashboardController::class, 'parameters_page'])->name('page.parameters');

Route::post('/generate_api_key', [DashboardController::class, 'generate_api_key'])->name('generate_api_key');
