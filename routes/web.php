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

Route::get('logout', 'Auth\LoginController@logout')->name('logout');
/*
|--------------------------------------------------------------------------
| Feed Routes
|--------------------------------------------------------------------------
*/

Route::get('/feeds', 'FeedController@index')->name('feeds.index');

Route::get('/feeds/moment', 'FeedController@moment')->name('feeds.moment');

Route::get('/feeds/create', 'FeedController@create')->name('feeds.create');

Route::get('/feeds/{feed}', 'FeedController@show')->name('feeds.show');

Route::get('/feeds/{feed}/edit-content', 'FeedController@editContent')->name('feeds.edit-content');

Route::get('/feeds/{feed}/edit-media', 'FeedController@editMedia')->name('feeds.edit-media');

Route::post('/feeds', 'FeedController@store')->name('feeds.store');

Route::put('/feeds/{feed}/update-content', 'FeedController@updateContent')->name('feeds.update-content');

Route::put('/feeds/{feed}/update-media', 'FeedController@updateMedia')->name('feeds.update-media');

Route::get('/feeds/{feed}/delete', 'FeedController@delete')->name('feeds.delete');




/*
|--------------------------------------------------------------------------
| Profile Routes
|--------------------------------------------------------------------------
*/

Route::get('/profile/{profile}', 'ProfileController@show')->name('profile.show')->middleware('profile.exist');

Route::get('/profile/create', 'ProfileController@create')->name('profile.create');

Route::get('/profile/{profile}/edit', 'ProfileController@edit')->name('profile.edit')->middleware('profile.exist');

Route::post('/profile', 'ProfileController@store')->name('profile.store');

Route::put('/profile/{profile}/update', 'ProfileController@update')->name('profile.update')->middleware('profile.exist');

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

Route::get('/notify/{notification_id}', 'NotificationController@show')->name('notify.show');



/*
|--------------------------------------------------------------------------
| VideoRoom Routes
|--------------------------------------------------------------------------
*/

Route::get('room', 'VideoRoomController@matching')->name('room.index');

Route::get('room/join/{room}', 'VideoRoomController@join')->name('room.join');

Route::post('room/create', 'VideoRoomController@create')->name('room.create');

Route::get('room/topic', 'VideoRoomController@topic')->name('room.topic');

Route::get('room/panel', 'VideoRoomController@index')->name('room.panel');

Route::get('room/lounge/{invite}/{token}', 'VideoRoomController@lounge')->name('room.lounge');

Route::get('room/end/{room}', 'VideoRoomController@endRoom')->name('room.end');

Route::post('room/matching/request', 'VideoRoomController@getMatchingRequest')->name('room.request');

Route::post('room/matching/refuse/{invitor}/{token}', 'VideoRoomController@refuse')->name('room.refuse');

Route::get('room/matching/on-refuse/{token}', 'VideoRoomController@onRefuse')->name('room.on-refuse');

Route::post('room/matching/get-refuse', 'VideoRoomController@refuseMatchingRequest')->name('room.get-refuse');



/*
|--------------------------------------------------------------------------
| Record Routes
|--------------------------------------------------------------------------
*/

Route::get('record', 'RecordController@index')->name('record.index');
