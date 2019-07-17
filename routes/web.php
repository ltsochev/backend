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

Route::get('/', 'SiteController@index');

Route::group(['prefix' => 'projects'], function ($router) {
    $router->get('planner', 'ProjectsController@getPlanner')->name('project-planner');
    $router->post('planner/submit', 'ProjectsController@submitProject')->name('project-submit');

    $router->get('details/{project}', 'ProjectsController@getProject')->name('project');
});

Route::get('admin/login', 'AuthController@getLogin');

Route::group(['middleware' => 'auth', 'prefix' => 'admin', 'namespace' => 'Admin'], function ($router) {
    $router->get('/', 'DashboardController@getIndex');
});
