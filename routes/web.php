<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

#Demo Vuetify
Route::get('/demo-vuetify', function () {
    return view('demoVuetify');
});

Route::view('/{any}', 'spa')->where('any', '.*');
Route::get('/', 'QuestionController@index');

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('questions', 'QuestionController')->except('show');
Route::get('/questions/{slug}', 'QuestionController@show')->name('questions.show');
Route::resource('questions.answers', 'AnswerController')->except(['create', 'show']);

Route::post('/answer/{answer}/accept', 'AcceptAnswerController')->name('answers.accept');

Route::post('/questions/{question}/favorites', 'FavoriteController@store')->name('questions.favorite');
Route::delete('/questions/{question}/favorites', 'FavoriteController@destroy')->name('questions.unfavorite');

Route::post('/questions/{question}/vote', 'VoteQuestionController');
Route::post('/answers/{answer}/vote', 'VoteAnswerController');
