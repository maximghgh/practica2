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


Route::get('/', 'HomeController@index')->name('home');

//ajax

Route::get('/showmore', 'HomeController@showMore')->middleware('auth')->name('showmore');

// Route::get('/alert', function(){
//     return redirect()->route('home')->with('info', 'Вы вошли в аккаунт!');
// });

// авторизация

Route::get('/signup', 'AuthController@getSignup')->middleware('guest')->name('auth.signup');
Route::post('/signup', 'AuthController@postSignup')->middleware('guest');

Route::get('/signin', 'AuthController@getSignin')->middleware('guest')->name('auth.signin');
Route::post('/signin', 'AuthController@postSignin')->middleware('guest');

Route::get('/signout', 'AuthController@getSignout')->name('auth.signout');

//Поиск

Route::get('/search', 'SearchController@getResults')->name('search.results');

//Профили

Route::get('/user/{username}', 'ProfileController@getProfile')->name('profile.index');

Route::get('/profile/edit', 'ProfileController@getEdit')->middleware('auth')->name('profile.edit');
Route::post('/profile/edit', 'ProfileController@postEdit')->middleware('auth')->name('profile.edit');

// Друзья 

Route::get('/friends', 'FriendController@getIndex')->middleware('auth')->name('friend.index');
Route::get('/friends/add/{username}', 'FriendController@getAdd')->middleware('auth')->name('friend.add');
Route::get('/friends/accept/{username}', 'FriendController@getAccept')->middleware('auth')->name('friend.accept');
Route::post('/friends/delete/{username}', 'FriendController@postDelete')->middleware('auth')->name('friend.delete');

//стена объявлений 

Route::post('/status', 'StatusController@postStatus')->middleware('auth')->name('status.post');
Route::post('/status/{statusId}/reply', 'StatusController@postReply')->middleware('auth')->name('status.reply');

//Like 

Route::get('/status/{statusId}/like', 'StatusController@getLike')->middleware('auth')->name('status.like');

//удаление комментария

Route::get('/status/{statusId}/delete', 'StatusController@deleteStatus')->middleware('auth')->name('status.delete');