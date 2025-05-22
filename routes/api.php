<?php

use App\Http\Controllers\API\ServiceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\PostController;

Route::apiResource('/posts', PostController::class);

Route::apiResource('/services', ServiceController::class);

Route::get('/ping', function () {
    return response()->json(['message' => 'pong']);
});
