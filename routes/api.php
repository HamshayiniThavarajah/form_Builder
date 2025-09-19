<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\SubmissionController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// --- Add these below ---
Route::apiResource('forms', FormController::class);
Route::apiResource('submissions', SubmissionController::class);
