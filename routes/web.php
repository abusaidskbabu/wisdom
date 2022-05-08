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


//Frontend Routes
Route::get('/{slug}', 'PageController@index');
Route::get('/', 'PageController@root');
Route::get('/services/view/{id}', 'PageController@viewServices')->name('service.view');
Route::get('/career/apply/{id}', 'PageController@apply')->name('career.apply');
Route::post('/career/apply/{id}', 'PageController@post');
Route::post('/contact', 'PageController@postContact');
Route::get('/clients', function () {
    return view('frontend.clients');
});
Route::get('/disclaimer', function () {
    return view('frontend.disclaimer');
});


//Backend Routes
Auth::routes();

Route::group(['middleware'=>['checkToAccess']], function() {
    Route::get('/dashboard/services', 'ServiceController@index')->name('services.index');
    Route::get('/dashboard/services/create', 'ServiceController@create')->name('services.create');
    Route::post('/dashboard/services/create', 'ServiceController@insert');
    Route::get('/dashboard/services/view/{id}', 'ServiceController@view')->name('services.view');
    Route::get('/dashboard/services/edit/{id}', 'ServiceController@edit')->name('services.edit');
    Route::post('/dashboard/services/edit/{id}', 'ServiceController@update');
    Route::get('/dashboard/services/delete/{id}', 'ServiceController@delete')->name('services.delete');

    Route::get('/dashboard/services/information', 'ServiceInformationController@index')->name('services.information.index');
    Route::get('/dashboard/services/information/create', 'ServiceInformationController@create')->name('services.information.create');
    Route::post('/dashboard/services/information/create', 'ServiceInformationController@insert');
    Route::get('/dashboard/services/information/view/{id}', 'ServiceInformationController@view')->name('services.information.view');
    Route::get('/dashboard/services/information/edit/{id}', 'ServiceInformationController@edit')->name('services.information.edit');
    Route::post('/dashboard/services/information/edit/{id}', 'ServiceInformationController@update');
    Route::get('/dashboard/services/information/delete/{id}', 'ServiceInformationController@delete')->name('services.information.delete');

    Route::get('/dashboard/career', 'JobController@index')->name('career.index');
    Route::get('/dashboard/career/create', 'JobController@create')->name('career.create');
    Route::post('/dashboard/career/create', 'JobController@insert');
    Route::get('/dashboard/career/view/{id}', 'JobController@view')->name('career.view');
    Route::get('/dashboard/career/edit/{id}', 'JobController@edit')->name('career.edit');
    Route::post('/dashboard/career/edit/{id}', 'JobController@update');
    Route::get('/dashboard/career/delete/{id}', 'JobController@delete')->name('career.delete');

    Route::get('/dashboard/career/request', 'RequestController@index')->name('career.request.index');
    Route::get('/dashboard/career/request/view/{id}', 'RequestController@view')->name('career.request.view');
    Route::get('/dashboard/career/request/delete/{id}', 'RequestController@delete')->name('career.request.delete');

    Route::get('/dashboard/cms', 'CmsController@index')->name('cms.index');
    Route::get('/dashboard/cms/create', 'CmsController@create')->name('cms.create');
    Route::post('/dashboard/cms/create', 'CmsController@insert');
    Route::get('/dashboard/cms/view/{id}', 'CmsController@view')->name('cms.view');
    Route::get('/dashboard/cms/edit/{id}', 'CmsController@edit')->name('cms.edit');
    Route::post('/dashboard/cms/edit/{id}', 'CmsController@update');
    Route::get('/dashboard/cms/delete/{id}', 'CmsController@delete')->name('cms.delete');

    Route::get('/dashboard/user/profile', 'HomeController@profile')->name('profile');
    Route::get('/dashboard/user/profile/edit', 'HomeController@editProfile')->name('profile.edit');
    Route::post('/dashboard/user/profile/edit', 'HomeController@updateProfile');

    Route::get('/dashboard/user/profile/settings', 'HomeController@settings')->name('profile.settings');
    Route::post('/dashboard/user/profile/settings', 'HomeController@settingsPost');

});

