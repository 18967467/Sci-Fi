<?php

use App\Http\Controllers\UserProfileController;

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
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile', 'UserController@profile')->name('profile');
Route::get('/savedlist', 'UserController@savedlist')->name('savedlist');
Route::get('/myshared', 'UserController@myshared')->name('myshared');
Route::get('/changepassword', 'UserController@changepassword');
Route::get('/upload', 'RobotController@upload')->name('upload');
Route::get('/statistic', 'RobotController@statistic')->name('statistic');
Route::get('/detail', 'RobotController@detail')->name('detail');

Route::resource('properties','PropertyController')->middleware('authenticated');
Route::resource('users','UserController')->middleware('authenticated');
Route::get('/userlist','UserController@ShowUserList')->name('userlist')->middleware('authenticated');
Route::get('/dashboard','UserController@dashboard')->name('dashboard')->middleware('authenticated');



