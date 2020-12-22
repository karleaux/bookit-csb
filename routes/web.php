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
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//user routes
Route::get('/user/profile', 'UserController@profile')->name('profile');
Route::get('/user/edit', 'UserController@edit')->name('profile-edit');
Route::post('/user/edit', 'UserController@edit_save')->name('profile-edit');
Route::get('/user/details/{user_id}', 'UserController@details')->name('profile-edit');

//user's talent management
Route::get('/user/addtalent', 'UserController@addtalent');
Route::post('/user/addtalent', 'UserController@inserttalent');
Route::get('/user/edittalent/{talent_id}', 'UserController@edittalent');
Route::post('/user/updatetalent/{talent_id}', 'UserController@updatetalent');
Route::post('/user/removetalent/{talent_id}', 'UserController@removetalent');

//client offer
Route::get('/offer/add/{talent_id}', 'OfferController@addoffer');
Route::post('/offer/add/{talent_id}', 'OfferController@insertoffer');
Route::get('/offer/clientviewoffers', 'OfferController@clientviewoffers');
Route::post('/offer/clientcanceloffer/{offer_id}', 'OfferController@clientcanceloffer');

//talent offer
Route::get('/offer/gettalentrequests', 'OfferController@gettalentrequests');
Route::post('/offer/acceptoffer/{offer_id}','OfferController@acceptoffer');
Route::post('/offer/rejectoffer/{offer_id}','OfferController@rejectoffer');
Route::post('/offer/canceloffer/{offer_id}','OfferController@canceloffer');
Route::post('/offer/completeoffer/{offer_id}','OfferController@completeoffer');

// complete offer
Route::post('/filesubmit', 'OfferController@submitcompletedoffer');

// talents page
Route::get('/talents', 'TalentController@view');
Route::get('/talents/{id}','TalentController@details');
//search
Route::any('/search', 'TalentController@search');

//fave add/remove
Route::post('/store/{id}/{idd}','FaveController@store');
Route::post('/remove/{id}/{idd}','FaveController@remove');