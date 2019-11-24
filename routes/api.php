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
    Route::get('/project', 'API\QuestionsController@project');
Route::get('/indicators/{project_id}', 'API\ProjectController@indicators');
Route::get('/activities/{project_id}', 'API\ProjectController@activities');
Route::get('/risks/{project_id}', 'API\ProjectController@risks');
Route::get('/assumptions/{project_id}', 'API\ProjectController@assumptions');

});
Route::post('/answer', 'API\QuestionsController@answer');
Route::post('/indicatorafter', 'API\QuestionsController@indicatorafter');
Route::post('/riskafter', 'API\QuestionsController@riskafter');
Route::post('/login', 'AuthController@login');
Route::middleware('auth:api')->post('/logout', 'AuthController@logout');
