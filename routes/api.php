<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ObjectiveController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('defaultSettings', 'App\Http\Controllers\ImportExportController@createDefaultSettings');

Route::middleware('auth:sanctum')->get('/athenticated', function () {
    return true;
});
Route::post('register', 'RegisterController@register');
Route::post('login', 'LoginController@login');
Route::post('logout', 'LoginController@logout');

Route::resource('quest', QuestController::class);

Route::resource('objective', ObjectiveController::class);

Route::post('search','App\Http\Controllers\QuestController@search');