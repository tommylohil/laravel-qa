<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('/token', 'Auth\LoginController@getToken');

Route::get('/questions/{question}-{slug}', 'Api\QuestionDetailController');

Route::middleware(['auth:api'])->group(function() {
    Route::get('/questions', 'Api\QuestionController@index');
    Route::apiResource('/questions', 'Api\QuestionController')->except('index');
});