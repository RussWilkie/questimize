<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ObjectiveController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\SubSkillController;
use App\Http\Controllers\ActivitiesController;

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
Route::resource('skill', SkillController::class);
Route::resource('subskill', SubSkillController::class);
Route::get('subskill/{id}', [SubSkillController::class, 'show']);
Route::resource('skilllog', SkillLogController::class);

Route::get('activities/{id}', [ActivitiesController::class, 'show']);
Route::resource('activities', ActivitiesController::class, ['except' => 'show']);



Route::post('search','App\Http\Controllers\QuestController@search');