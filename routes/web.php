<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\PostController;


Route::apiResource('/posts', PostController::class);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return 'This is the About page';
});

