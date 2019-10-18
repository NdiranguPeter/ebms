<?php

use App\Question;
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
Route::middleware('auth:api')->get('/survey', function (Request $request) {
    return $request->user()->surveys;
});
Route::middleware('auth:api')->get('/questions/{survey_id}', function ($id) {

    $questions = Question::where('survey_id', $id)->orderBy('qn_order', 'asc')->get();

    return $questions;
});
