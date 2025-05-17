<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\PostController;

Route::apiResource('/posts', PostController::class);


Route::get('/ping', function () {
    return response()->json(['message' => 'pong']);
});
