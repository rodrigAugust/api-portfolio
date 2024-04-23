<?php

use App\Http\Controllers\GendersController;
use App\Http\Controllers\InstitutionsController;
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
// Routes Genders
Route::post('/gender/store', [GendersController::class,'store']);
Route::put('/gender/edit/{id}', [GendersController::class,'edit']);
Route::delete('/gender/erase/{id}', [GendersController::class,'erase']);
Route::get('/gender/listall/{id_user}', [GendersController::class,'listAll']);

// Routes Institutions
Route::post('/institution/store', [InstitutionsController::class,'store']);
Route::put('/institution/edit/{id}', [InstitutionsController::class,'edit']);
Route::delete('/institution/erase/{id}', [InstitutionsController::class,'erase']);
Route::get('/institution/listall/{id_user}', [InstitutionsController::class,'listAll']);

// Routes Users
Route::post('/user/store', [UsersController::class, 'store']);
Route::get('/user/information/{id}', [UsersController::class, 'information']);
Route::put('/user/edit/{id}', [UsersController::class, 'edit']);
Route::delete('/user/erase/{id}', [UsersController::class, 'erase']);