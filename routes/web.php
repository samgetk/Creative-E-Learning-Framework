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

Route::get('/', function () {
    return view('welcome');
})->name('/');

Auth::routes();

Route::get('guide','UserGuide@user_guide')->name('guide');

Route::group(['middleware'=>['auth']],function(){

    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('content', 'ContentController@index')->name('content');

    Route::get('project', 'ProjectController@index')->name('project');

    Route::get('exam', 'ExamController@index')->name('exam');

    Route::get('menu', 'MenuController@index')->name('menu');

    Route::get('media', 'MediaController@index')->name('media');

    Route::get('streaming', 'streaming\StreamingController@create')->name('streaming');

    Route::get('video', 'resources\ResourceController@video')->name('video');

    Route::get('audio', 'resources\ResourceController@audio')->name('audio');

    Route::get('resource', 'resources\ResourceController@index')->name('resource');

    Route::get('course', 'backend\CourseController@index')->name('course');

    Route::get('recents', 'RecentsController@index')->name('recents');

    Route::get('remove_content', 'RecentsController@remove')->name('remove_content');

    Route::post('/project', 'ProjectController@getChoice');

    Route::get('create', 'AccountController@test')->name('create');

    Route::get('open', 'ProjectController@open')->name('open');

    Route::get('admin', 'AccountController@admin')->name('admin');

    Route::get('resource_creator', 'resources\ResourceController@create')->name('resource_creator');

    Route::get('noAdmin', 'AccountController@no_admin')->name('noAdmin');

    Route::get('export', 'project\ProjectExportHandler@export')->name('export');

    Route::get('pages', 'pages\PageCreator@index')->name('pages');

    Route::post('add_page', 'pages\PageCreator@page')->name('add_page');

    Route::post('homepage', 'projectController@homepage')->name('homepage');

    Route::get('theme', 'layouts\theme\ThemeController@index')->name('theme');

    Route::get('delete', 'project\ProjectRemover@delete')->name('delete');

    Route::get('add_Exam', 'ExamController@exam_Manager')->name('add_exam');

    Route::get('remove_Content', 'RemoveContent@remove_Content')->name('remove_Content');

    Route::post('slider', 'project\ProjectCreatorHelper@slider')->name('slider');

    Route::get('use_theme', 'layouts\theme\ThemeController@export')->name('use_theme');

    Route::post('create_menu', 'menu\MenuCreator@create')->name('create_menu');

    Route::get('initiate', 'backend\database\DatabaseInitiator@set_database_file')->name('initiate');

});
