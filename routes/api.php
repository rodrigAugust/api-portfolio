<?php

use App\Http\Controllers\UsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::post('/user/store', [UsersController::class, 'store']);
Route::post('/user/edit/{id}', [UsersController::class, 'edit']);
Route::post('/user/erase/{id}', [UsersController::class, 'erase']);
Route::post('/user/information/{id}', [UsersController::class, 'information']);


Route::post('/gender/store', 'GenderController@store');
