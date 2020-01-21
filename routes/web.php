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
    $router->get('planner/complete', 'ProjectsController@getPlannerSuccess')->name('project-planner-success');

    $router->get('details/{project}', 'ProjectsController@getProject')->name('project');
});

Route::get('admin/login', 'Auth\\LoginController@showLoginForm')->name('login');
Route::post('admin/login', 'Auth\\LoginController@login');
Route::get('admin/logout', 'Auth\\LoginController@logout')->name('logout');

Route::group(['middleware' => 'auth', 'prefix' => 'admin', 'namespace' => 'Admin'], function ($router) {
    $router->get('/', 'DashboardController@getIndex')->name('admin.dashboard');

    $router->group(['prefix' => 'translations'], function ($router) {
        $router->get('all', 'TranslationController@getIndex')->name('admin.translations.index');
        $router->get('export/all', 'TranslationController@exportAll')->name('admin.translations.export');

        $router->post('save', 'TranslationController@saveSingle')->name('admin.translations.save');
        $router->post('delete', 'TranslationController@deleteSingle')->name('admin.translations.delete');
    });

    $router->group(['prefix' => 'projects'], function ($router) {
        $router->get('requests', 'ProjectsController@getRequests')->name('admin.projects.requests');
        $router->get('requests/{status}', 'ProjectsController@getRequestsFiltered')->name('admin.projects.requests.filtered');

        $router->get('details/{project}', 'ProjectsController@getProjectDetails')->name('admin.projects.details');

        $router->get('status/{project}/{status}', 'ProjectsController@updateProjectStatus')->name('admin.projects.update.status');

        $router->get('delete/{project}', 'ProjectsController@deleteProject')->name('admin.projects.delete');
    });

    $router->get('settings', 'SettingsController@getDashboard')->name('admin.settings.dashboard');
});

Route::domain('git.ltsochev.com')->group(function() {
    Route::get('/', function() {
        return redirect()->to('https://github.com/ltsochev-dev');
    })
});
