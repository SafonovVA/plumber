<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', [\App\Http\Controllers\Api\UserController::class, 'index']);
