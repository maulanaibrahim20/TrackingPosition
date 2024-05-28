<?php

use App\Http\Controllers\API\TrackingPositionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post("/update-position", [TrackingPositionController::class, "updatePosition"]);
