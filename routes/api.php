<?php

use App\Http\Controllers\Api\LeadController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProjectController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/posts', [ProjectController::class, 'index']);

Route::get('/technologies', [ProjectController::class, 'technologies']);

Route::get('/types', [ProjectController::class, 'types']);

Route::get('/posts/{id}', [ProjectController::class, 'id']);

Route::post('/send-mail', [LeadController::class, 'store']);
