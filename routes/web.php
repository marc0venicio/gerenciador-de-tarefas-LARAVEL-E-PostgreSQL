<?php

use App\Http\Controllers\TaskController;
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

Route::resource('/tasks', TaskController::class);
Route::resource('/create', TaskController::class);
Route::resource('/edit', TaskController::class);
Route::get('/task_done/{id}', 'App\Http\Controllers\TaskController@task_done')->name('task_done');



Route::any('/task_search', 'App\Http\Controllers\TaskController@search')->name('search');