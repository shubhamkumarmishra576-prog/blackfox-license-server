<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LicenseApiController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('v1')->group(function () {

    Route::post('/license/activate', [LicenseApiController::class, 'activate']);

    Route::post('/license/validate', [LicenseApiController::class, 'validateLicense']);

    Route::post('/license/deactivate', [LicenseApiController::class, 'deactivate']);

    Route::get('/license/status', [LicenseApiController::class, 'status']);

});