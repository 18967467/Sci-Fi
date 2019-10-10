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

Route::get('/ajax',function() {
    return view('message');
});
    Route::post('/getmsg','AdminController@index');




    
    
Route::resource('ajax-crud','AjaxController');
Route::get('/addComment','CommentController@addComment');
Route::get('/getcomment','<a href="mailto:RobotsController@getComment" rel="nofollow">RobotsController@getComment</a>');
Route::post('/writecomment','<a href="mailto:RobotsController@makeComment" rel="nofollow">RobotsController@makeComment</a>');
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::resource('/comments','CommentController');
Route::get('/home', 'UsersController@home')->name('home');
Route::get('/profile', 'UsersController@profile')->name('profile');
Route::get('/saved', 'UsersController@saved')->name('saved');
Route::get('/shared', 'UsersController@shared')->name('shared');
Route::get('/changepassword', 'UsersController@changepassword')->name('changepassword');
Route::get('/upload', 'UsersController@upload')->name('upload');
Route::get('/statistic', 'UsersController@statistic')->name('statistic');
Route::get('/robotdetail/{robotId}', 'UsersController@robotDetail')->name('robotDetail');

Route::get('/dashboard', 'AdminController@dashboard')->name('dashboard');
Route::get('/filter', 'RobotsController@filter')->name('filter');



Route::group([
    'prefix' => 'comments',
], function () {
    Route::get('/', 'CommentsController@index')
    ->name('comments.comment.index');
    Route::get('/create','CommentsController@create')
    ->name('comments.comment.create');
    Route::get('/show/{comment}','CommentsController@show')
    ->name('comments.comment.show');
    Route::get('/{comment}/edit','CommentsController@edit')
    ->name('comments.comment.edit');
    Route::post('/', 'CommentsController@store')
    ->name('comments.comment.store');
    Route::put('comment/{comment}', 'CommentsController@update')
    ->name('comments.comment.update');
    Route::delete('/comment/{comment}','CommentsController@destroy')
    ->name('comments.comment.destroy');
    Route::post('/reply/store','CommentsController@replyStore')->name('reply.add');
});

Route::group([
    'prefix' => 'filters',
], function () {
    Route::get('/', 'FiltersController@index')
    ->name('filters.filter.index');
    Route::get('/create','FiltersController@create')
    ->name('filters.filter.create');
    Route::get('/show/{filter}','FiltersController@show')
    ->name('filters.filter.show');
    Route::get('/{filter}/edit','FiltersController@edit')
    ->name('filters.filter.edit');
    Route::post('/', 'FiltersController@store')
    ->name('filters.filter.store');
    Route::put('filter/{filter}', 'FiltersController@update')
    ->name('filters.filter.update');
    Route::delete('/filter/{filter}','FiltersController@destroy')
    ->name('filters.filter.destroy');
});

Route::group([
    'prefix' => 'input_types',
], function () {
    Route::get('/', 'InputTypesController@index')
    ->name('input_types.input_type.index');
    Route::get('/create','InputTypesController@create')
    ->name('input_types.input_type.create');
    Route::get('/show/{inputType}','InputTypesController@show')
    ->name('input_types.input_type.show');
    Route::get('/{inputType}/edit','InputTypesController@edit')
    ->name('input_types.input_type.edit');
    Route::post('/', 'InputTypesController@store')
    ->name('input_types.input_type.store');
    Route::put('input_type/{inputType}', 'InputTypesController@update')
    ->name('input_types.input_type.update');
    Route::delete('/input_type/{inputType}','InputTypesController@destroy')
    ->name('input_types.input_type.destroy');
});

Route::group([
    'prefix' => 'mails',
], function () {
    Route::get('/', 'MailsController@index')
    ->name('mails.mail.index');
    Route::get('/create','MailsController@create')
    ->name('mails.mail.create');
    Route::get('/show/{mail}','MailsController@show')
    ->name('mails.mail.show');
    Route::get('/{mail}/edit','MailsController@edit')
    ->name('mails.mail.edit');
    Route::post('/', 'MailsController@store')
    ->name('mails.mail.store');
    Route::put('mail/{mail}', 'MailsController@update')
    ->name('mails.mail.update');
    Route::delete('/mail/{mail}','MailsController@destroy')
    ->name('mails.mail.destroy');
});

Route::group([
    'prefix' => 'options',
], function () {
    Route::get('/', 'OptionsController@index')
    ->name('options.option.index');
    Route::get('/create','OptionsController@create')
    ->name('options.option.create');
    Route::get('/show/{option}','OptionsController@show')
    ->name('options.option.show');
    Route::get('/{option}/edit','OptionsController@edit')
    ->name('options.option.edit');
    Route::post('/', 'OptionsController@store')
    ->name('options.option.store');
    Route::put('option/{option}', 'OptionsController@update')
    ->name('options.option.update');
    Route::delete('/option/{option}','OptionsController@destroy')
    ->name('options.option.destroy');
});

Route::group([
    'prefix' => 'properties',
], function () {
    Route::get('/', 'PropertiesController@index')
    ->name('properties.property.index');
    Route::get('/create','PropertiesController@create')
    ->name('properties.property.create');
    Route::get('/show/{property}','PropertiesController@show')
    ->name('properties.property.show');
    Route::get('/{property}/edit','PropertiesController@edit')
    ->name('properties.property.edit');
    Route::post('/', 'PropertiesController@store')
    ->name('properties.property.store');
    Route::put('property/{property}', 'PropertiesController@update')
    ->name('properties.property.update');
    Route::delete('/property/{property}','PropertiesController@destroy')
    ->name('properties.property.destroy');
});

Route::group([
    'prefix' => 'reports',
], function () {
    Route::get('/', 'ReportsController@index')
    ->name('reports.report.index');
    Route::get('/create','ReportsController@create')
    ->name('reports.report.create');
    Route::get('/show/{report}','ReportsController@show')
    ->name('reports.report.show');
    Route::get('/{report}/edit','ReportsController@edit')
    ->name('reports.report.edit');
    Route::post('/', 'ReportsController@store')
    ->name('reports.report.store');
    Route::put('report/{report}', 'ReportsController@update')
    ->name('reports.report.update');
    Route::delete('/report/{report}','ReportsController@destroy')
    ->name('reports.report.destroy');
});

Route::group([
    'prefix' => 'robots',
], function () {
    Route::get('/', 'RobotsController@index')
    ->name('robots.robot.index');
    Route::get('/create','RobotsController@create')
    ->name('robots.robot.create');
    Route::get('/show/{robot}','RobotsController@show')
    ->name('robots.robot.show');
    Route::get('/{robot}/edit','RobotsController@edit')
    ->name('robots.robot.edit');
    Route::post('/store', 'RobotsController@store')
    ->name('robots.robot.store');
    Route::put('robot/{robot}', 'RobotsController@update')
    ->name('robots.robot.update');
    Route::delete('/robot/{robot}','RobotsController@destroy')
    ->name('robots.robot.destroy');
    
    Route::post('/', 'RobotsController@upload')
    ->name('robots.robot.upload');
});

Route::group([
    'prefix' => 'robot_infos',
], function () {
    Route::get('/', 'RobotInfosController@index')
    ->name('robot_infos.robot_info.index');
    Route::get('/create','RobotInfosController@create')
    ->name('robot_infos.robot_info.create');
    Route::get('/show/{robotInfo}','RobotInfosController@show')
    ->name('robot_infos.robot_info.show');
    Route::get('/{robotInfo}/edit','RobotInfosController@edit')
    ->name('robot_infos.robot_info.edit');
    Route::post('/', 'RobotInfosController@store')
    ->name('robot_infos.robot_info.store');
    Route::put('robot_info/{robotInfo}', 'RobotInfosController@update')
    ->name('robot_infos.robot_info.update');
    Route::delete('/robot_info/{robotInfo}','RobotInfosController@destroy')
    ->name('robot_infos.robot_info.destroy');
});

Route::group([
    'prefix' => 'saved_lists',
], function () {
    Route::get('/', 'SavedListsController@index')
    ->name('saved_lists.saved_list.index');
    Route::get('/create','SavedListsController@create')
    ->name('saved_lists.saved_list.create');
    Route::get('/show/{savedList}','SavedListsController@show')
    ->name('saved_lists.saved_list.show');
    Route::get('/{savedList}/edit','SavedListsController@edit')
    ->name('saved_lists.saved_list.edit');
    Route::post('/', 'SavedListsController@store')
    ->name('saved_lists.saved_list.store');
    Route::put('saved_list/{savedList}', 'SavedListsController@update')
    ->name('saved_lists.saved_list.update');
    Route::delete('/saved_list/{savedList}','SavedListsController@destroy')
    ->name('saved_lists.saved_list.destroy');
});

Route::group([
    'prefix' => 'subscribes',
], function () {
    Route::get('/', 'SubscribesController@index')
    ->name('subscribes.subscribe.index');
    Route::get('/create','SubscribesController@create')
    ->name('subscribes.subscribe.create');
    Route::get('/show/{subscribe}','SubscribesController@show')
    ->name('subscribes.subscribe.show');
    Route::get('/{subscribe}/edit','SubscribesController@edit')
    ->name('subscribes.subscribe.edit');
    Route::post('/', 'SubscribesController@store')
    ->name('subscribes.subscribe.store');
    Route::put('subscribe/{subscribe}', 'SubscribesController@update')
    ->name('subscribes.subscribe.update');
    Route::delete('/subscribe/{subscribe}','SubscribesController@destroy')
    ->name('subscribes.subscribe.destroy');
});

Route::get('/home', 'UsersController@home')->name('home');
Route::get('/profile', 'UsersController@profile')->name('profile');
Route::get('/saved', 'UsersController@saved')->name('saved');
Route::get('/shared', 'UsersController@shared')->name('shared');
Route::get('/changepassword', 'UsersController@changepassword')->name('changepassword');
Route::get('/upload', 'UsersController@upload')->name('upload');
Route::get('/statistic', 'UsersController@statistic')->name('statistic');
Route::get('/robotdetail/{robotId}', 'UsersController@robotDetail')->name('robotDetail');

Route::get('/dashboard', 'AdminController@dashboard')->name('dashboard');
Route::get('/filter', 'RobotsController@filter')->name('filter');



Route::group([
    'prefix' => 'comments',
], function () {
    Route::get('/', 'CommentsController@index')
    ->name('comments.comment.index');
    Route::get('/create','CommentsController@create')
    ->name('comments.comment.create');
    Route::get('/show/{comment}','CommentsController@show')
    ->name('comments.comment.show');
    Route::get('/{comment}/edit','CommentsController@edit')
    ->name('comments.comment.edit');
    Route::post('/', 'CommentsController@store')
    ->name('comments.comment.store');
    Route::put('comment/{comment}', 'CommentsController@update')
    ->name('comments.comment.update');
    Route::delete('/comment/{comment}','CommentsController@destroy')
    ->name('comments.comment.destroy');
});

Route::group([
    'prefix' => 'filters',
], function () {
    Route::get('/', 'FiltersController@index')
    ->name('filters.filter.index');
    Route::get('/create','FiltersController@create')
    ->name('filters.filter.create');
    Route::get('/show/{filter}','FiltersController@show')
    ->name('filters.filter.show');
    Route::get('/{filter}/edit','FiltersController@edit')
    ->name('filters.filter.edit');
    Route::post('/', 'FiltersController@store')
    ->name('filters.filter.store');
    Route::put('filter/{filter}', 'FiltersController@update')
    ->name('filters.filter.update');
    Route::delete('/filter/{filter}','FiltersController@destroy')
    ->name('filters.filter.destroy');
});

Route::group([
    'prefix' => 'input_types',
], function () {
    Route::get('/', 'InputTypesController@index')
    ->name('input_types.input_type.index');
    Route::get('/create','InputTypesController@create')
    ->name('input_types.input_type.create');
    Route::get('/show/{inputType}','InputTypesController@show')
    ->name('input_types.input_type.show');
    Route::get('/{inputType}/edit','InputTypesController@edit')
    ->name('input_types.input_type.edit');
    Route::post('/', 'InputTypesController@store')
    ->name('input_types.input_type.store');
    Route::put('input_type/{inputType}', 'InputTypesController@update')
    ->name('input_types.input_type.update');
    Route::delete('/input_type/{inputType}','InputTypesController@destroy')
    ->name('input_types.input_type.destroy');
});

Route::group([
    'prefix' => 'mails',
], function () {
    Route::get('/', 'MailsController@index')
    ->name('mails.mail.index');
    Route::get('/create','MailsController@create')
    ->name('mails.mail.create');
    Route::get('/show/{mail}','MailsController@show')
    ->name('mails.mail.show');
    Route::get('/{mail}/edit','MailsController@edit')
    ->name('mails.mail.edit');
    Route::post('/', 'MailsController@store')
    ->name('mails.mail.store');
    Route::put('mail/{mail}', 'MailsController@update')
    ->name('mails.mail.update');
    Route::delete('/mail/{mail}','MailsController@destroy')
    ->name('mails.mail.destroy');
});

Route::group([
    'prefix' => 'options',
], function () {
    Route::get('/', 'OptionsController@index')
    ->name('options.option.index');
    Route::get('/create','OptionsController@create')
    ->name('options.option.create');
    Route::get('/show/{option}','OptionsController@show')
    ->name('options.option.show');
    Route::get('/{option}/edit','OptionsController@edit')
    ->name('options.option.edit');
    Route::post('/', 'OptionsController@store')
    ->name('options.option.store');
    Route::put('option/{option}', 'OptionsController@update')
    ->name('options.option.update');
    Route::delete('/option/{option}','OptionsController@destroy')
    ->name('options.option.destroy');
});

Route::group([
    'prefix' => 'properties',
], function () {
    Route::get('/', 'PropertiesController@index')
    ->name('properties.property.index');
    Route::get('/create','PropertiesController@create')
    ->name('properties.property.create');
    Route::get('/show/{property}','PropertiesController@show')
    ->name('properties.property.show');
    Route::get('/{property}/edit','PropertiesController@edit')
    ->name('properties.property.edit');
    Route::post('/', 'PropertiesController@store')
    ->name('properties.property.store');
    Route::put('property/{property}', 'PropertiesController@update')
    ->name('properties.property.update');
    Route::delete('/property/{property}','PropertiesController@destroy')
    ->name('properties.property.destroy');
});

Route::group([
    'prefix' => 'reports',
], function () {
    Route::get('/', 'ReportsController@index')
    ->name('reports.report.index');
    Route::get('/create','ReportsController@create')
    ->name('reports.report.create');
    Route::get('/show/{report}','ReportsController@show')
    ->name('reports.report.show');
    Route::get('/{report}/edit','ReportsController@edit')
    ->name('reports.report.edit');
    Route::post('/', 'ReportsController@store')
    ->name('reports.report.store');
    Route::put('report/{report}', 'ReportsController@update')
    ->name('reports.report.update');
    Route::delete('/report/{report}','ReportsController@destroy')
    ->name('reports.report.destroy');
});

Route::group([
    'prefix' => 'robots',
], function () {
    Route::get('/', 'RobotsController@index')
    ->name('robots.robot.index');
    Route::get('/create','RobotsController@create')
    ->name('robots.robot.create');
    Route::get('/show/{robot}','RobotsController@show')
    ->name('robots.robot.show');
    Route::get('/{robot}/edit','RobotsController@edit')
    ->name('robots.robot.edit');
    Route::post('/store', 'RobotsController@store')
    ->name('robots.robot.store');
    Route::put('robot/{robot}', 'RobotsController@update')
    ->name('robots.robot.update');
    Route::delete('/robot/{robot}','RobotsController@destroy')
    ->name('robots.robot.destroy');
    
    Route::post('/', 'RobotsController@upload')
    ->name('robots.robot.upload');
});

Route::group([
    'prefix' => 'robot_infos',
], function () {
    Route::get('/', 'RobotInfosController@index')
    ->name('robot_infos.robot_info.index');
    Route::get('/create','RobotInfosController@create')
    ->name('robot_infos.robot_info.create');
    Route::get('/show/{robotInfo}','RobotInfosController@show')
    ->name('robot_infos.robot_info.show');
    Route::get('/{robotInfo}/edit','RobotInfosController@edit')
    ->name('robot_infos.robot_info.edit');
    Route::post('/', 'RobotInfosController@store')
    ->name('robot_infos.robot_info.store');
    Route::put('robot_info/{robotInfo}', 'RobotInfosController@update')
    ->name('robot_infos.robot_info.update');
    Route::delete('/robot_info/{robotInfo}','RobotInfosController@destroy')
    ->name('robot_infos.robot_info.destroy');
});

Route::group([
    'prefix' => 'saved_lists',
], function () {
    Route::get('/', 'SavedListsController@index')
    ->name('saved_lists.saved_list.index');
    Route::get('/create','SavedListsController@create')
    ->name('saved_lists.saved_list.create');
    Route::get('/show/{savedList}','SavedListsController@show')
    ->name('saved_lists.saved_list.show');
    Route::get('/{savedList}/edit','SavedListsController@edit')
    ->name('saved_lists.saved_list.edit');
    Route::post('/', 'SavedListsController@store')
    ->name('saved_lists.saved_list.store');
    Route::put('saved_list/{savedList}', 'SavedListsController@update')
    ->name('saved_lists.saved_list.update');
    Route::delete('/saved_list/{savedList}','SavedListsController@destroy')
    ->name('saved_lists.saved_list.destroy');
});

Route::group([
    'prefix' => 'subscribes',
], function () {
    Route::get('/', 'SubscribesController@index')
    ->name('subscribes.subscribe.index');
    Route::get('/create','SubscribesController@create')
    ->name('subscribes.subscribe.create');
    Route::get('/show/{subscribe}','SubscribesController@show')
    ->name('subscribes.subscribe.show');
    Route::get('/{subscribe}/edit','SubscribesController@edit')
    ->name('subscribes.subscribe.edit');
    Route::post('/', 'SubscribesController@store')
    ->name('subscribes.subscribe.store');
    Route::put('subscribe/{subscribe}', 'SubscribesController@update')
    ->name('subscribes.subscribe.update');
    Route::delete('/subscribe/{subscribe}','SubscribesController@destroy')
    ->name('subscribes.subscribe.destroy');
});


Route::group([
    'prefix' => 'users',
], function () {
    Route::get('/', 'UsersController@index')
    ->name('users.user.index');
    Route::get('/create','UsersController@create')
    ->name('users.user.create');
    Route::get('/changepass/{user}','UsersController@changepass')
    ->name('users.user.changepass');
    Route::get('/show/{user}','UsersController@show')
    ->name('users.user.show');
    Route::get('/{user}/edit','UsersController@edit')
    ->name('users.user.edit');
    Route::post('/', 'UsersController@store')
    ->name('users.user.store');
    Route::put('user/{user}', 'UsersController@update')
    ->name('users.user.update');
    
    
    Route::put('user/updatepass/{user}', 'UsersController@updatepass')
    ->name('users.user.updatepass');    
    Route::delete('/user/{user}','UsersController@destroy')
    ->name('users.user.destroy');
});