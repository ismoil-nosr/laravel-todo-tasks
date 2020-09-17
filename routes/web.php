<?php

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

Route::get('/', 'App\Http\Controllers\TaskController@index');
Route::view('/about', 'about');

Route::view('/contacts', 'contacts');
Route::post('/contacts', 'App\Http\Controllers\FeedbackController@store');

Route::view('/admin', 'admin.index');
Route::get('/admin/feedbacks', 'App\Http\Controllers\FeedbackController@index');

Route::resource('tasks', 'App\Http\Controllers\TaskController');

Route::post('/tasks/{task}/steps', 'App\Http\Controllers\TaskStepsController@store');

Route::post('/completed-steps/{step}', 'App\Http\Controllers\CompletedStepsController@store');
Route::delete('/completed-steps/{step}', 'App\Http\Controllers\CompletedStepsController@destroy');