<?php

use Illuminate\Http\Request;

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
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->group(function () {
    Route::get('/questions/{survey_id}', 'API\QuestionsController@show');
    Route::get('/options/{survey_id}', 'API\QuestionsController@options');
    Route::get('/survey', 'API\QuestionsController@survey');
    Route::post('/answer', 'API\QuestionsController@answer');

});

Route::post('/login', 'AuthController@login');
Route::middleware('auth:api')->post('/logout', 'AuthController@logout');
