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

Route::view('/', 'welcome');
Route::view('/admin', 'admin.index');

/**
 * Tasks
 */
Route::resource('tasks', 'App\Http\Controllers\TaskController');

Route::post('/tasks/{task}/steps', 'App\Http\Controllers\TaskStepsController@store');
Route::get('/tasks/tags/{tag}', 'App\Http\Controllers\TagsController@index');

Route::post('/completed-steps/{step}', 'App\Http\Controllers\CompletedStepsController@store');
Route::delete('/completed-steps/{step}', 'App\Http\Controllers\CompletedStepsController@destroy');
