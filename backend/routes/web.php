<?php


// use App\Http\Controllers\TaskController;

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

//以下をコメントアウトする
//Route::get('/', function () {
//    return view('welcome');
//});

// dd(App\Http\Controllers\TaskController::class);
Route::get('/','TaskController@index');
Route::resource('task',TaskController::class);
Route::resource('group',GroupController::class);
// Route::resource('task', App\Http\Controllers\TaskController::class);
// Route::resource('task', App\Http\Controllers\TaskController::class);
Route::post('/complete/{id}','TaskController@complete');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


