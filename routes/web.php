<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;

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
    return view('index');
});

Auth::routes();

Route::get('/user', 'UserController@index')->name('user.index');

/*
|--------------------------------------------------------------------------
| Home Routes
|--------------------------------------------------------------------------
*/

Route::get("/home", 'FeedController@index')->name('home')->middleware('auth');

Route::get("/index", 'HomeController@index')->name('index');

Route::get("/about-yourself", 'HomeController@aboutYourSelf')->name('about-yourself');

Route::get("/about-partner", 'HomeController@aboutPartner')->name('about-partner');

Route::get("/get-started", 'HomeController@signInSignUp')->name('signin-signup');

Route::get('/search', 'HomeController@search')->name('search');


/*
|--------------------------------------------------------------------------
| OAuth Routes
|--------------------------------------------------------------------------
*/

Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider')->name('login.provider');

Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback')->name('login.provider.callback');



/*
|--------------------------------------------------------------------------
| Feed Routes
|--------------------------------------------------------------------------
*/

Route::get('/feeds', 'FeedController@index')->name('feeds.index');

Route::get('/feeds/moment', 'FeedController@moment')->name('feeds.moment');

Route::get('/feeds/create', 'FeedController@create')->name('feeds.create')->middleware('auth');

Route::get('/feeds/resources', 'FeedController@getResources')->name('feeds.resources');

Route::get('/feeds/{feed}/edit-content', 'FeedController@editContent')->name('feeds.edit-content')->middleware('auth');

Route::get('/feeds/{feed}/edit-media', 'FeedController@editMedia')->name('feeds.edit-media')->middleware('auth');

Route::post('/feeds', 'FeedController@store')->name('feeds.store')->middleware('auth');

Route::put('/feeds/{feed}/update-content', 'FeedController@updateContent')->name('feeds.update-content')->middleware('auth');

Route::put('/feeds/{feed}/update-media', 'FeedController@updateMedia')->name('feeds.update-media')->middleware('auth');

Route::delete('/feeds/{feed}', 'FeedController@delete')->name('feeds.delete')->middleware('auth');




/*
|--------------------------------------------------------------------------
| Profile Routes
|--------------------------------------------------------------------------
*/

Route::get('/profile/{user_id}', 'ProfileController@show')->name('profile.show')->middleware('profile.exist');

Route::get('/profile/create', 'ProfileController@create')->name('profile.create');

Route::get('/profile/{profile}/edit', 'ProfileController@edit')->name('profile.edit')->middleware('profile.exist');

Route::post('/profile', 'ProfileController@store')->name('profile.store');

Route::put('/profile', 'ProfileController@update')->name('profile.update')->middleware('profile.exist');

Route::delete('/profile/{profile}', 'ProfileController@delete')->name('profile.delete')->middleware('profile.exist');



/*
|--------------------------------------------------------------------------
| Notification Routes
|--------------------------------------------------------------------------
*/

Route::get('/notify', 'NotificationController@index')->name('notify.index');

Route::get('/notify/create', 'NotificationController@create')->name('notify.create');

Route::get('/notify/{notification}/edit', 'NotificationController@edit')->name('notify.edit');

Route::post('/notify', 'NotificationController@store')->name('notify.store');

Route::put('/notify', 'NotificationController@update')->name('notify.update');



/*
|--------------------------------------------------------------------------
| VideoRoom Routes
|--------------------------------------------------------------------------
*/

Route::get('room', 'VideoRoomController@index')->name('room.index');

Route::get('room/join/{room}', 'VideoRoomController@join')->name('room.join');

Route::post('room/create', 'VideoRoomController@create')->name('room.create');

Route::get('room/topic', 'VideoRoomController@topic')->name('room.topic');


/*
|--------------------------------------------------------------------------
| Record Routes
|--------------------------------------------------------------------------
*/

Route::get('record', 'RecordController@index')->name('record.index');
