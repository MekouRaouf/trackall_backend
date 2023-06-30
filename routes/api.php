<?php

use App\Http\Controllers\Api\BrowserFingerprintController;
use App\Http\Controllers\Api\GeolocationController;
use App\Http\Controllers\Api\TimespentController;
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

Route::middleware('request_api_key')->group(function(){
    Route::post('/browser.store/{api_key}', [BrowserFingerprintController::class, 'store'])->name('browser.store');
    Route::post('/position.store/{api_key}', [GeolocationController::class, 'store'])->name('position.store');
    Route::post('/timespent.store/{api_key}', [TimespentController::class, 'store'])->name('timespent.store');
});