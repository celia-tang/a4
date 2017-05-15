<?php

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

Route::get('/', 'TaskController@show');

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

Route::get('/add', 'TaskController@add');

Route::get('/upname', 'TaskController@upname');
Route::get('/uppriority', 'TaskController@uppriority');
Route::get('/completed', 'TaskController@completed');
Route::get('/incomplete', 'TaskController@incomplete');
Route::get('/updue', 'TaskController@updue');
Route::get('/switch/{t}', 'TaskController@switch');
Route::get('/tag/{t}', 'TaskController@tag');
Route::get('/uptag', 'TaskController@updue');
Route::get('/delete/{t}', 'TaskController@delete');



Route::get('/debugbar', function() {

    $data = Array('foo' => 'bar');
    Debugbar::info($data);
    Debugbar::info('Current environment: '.App::environment());
    Debugbar::error('Error!');
    Debugbar::warning('Watch out…');
    Debugbar::addMessage('Another message', 'mylabel');

    return 'Just demoing some of the features of Debugbar';

});