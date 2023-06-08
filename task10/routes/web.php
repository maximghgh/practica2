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


Route::get('/','HomeController@index')->name('home');


Route::get('/signup', 'AuthController@getSignup')->middleware('guest')->name('auth.signup');
Route::post('/signup', 'AuthController@postSignup')->middleware('guest');

Route::get('/signin', 'AuthController@getSignin')->middleware('guest')->name('auth.signin');
Route::post('/signin', 'AuthController@postSignin')->middleware('guest');

Route::get('/signout', 'AuthController@getSignout')->name('auth.signout');

//авторы
Route::get('/avtors', 'AvtorController@getAvtors')->middleware('auth')->name('avtors');

//профиль

Route::get('/avtors/{username}', 'ProfileController@getProfile')->middleware('auth')->name('profile.index');

//книги

Route::get('/book/{bookid}', 'BookController@read')->middleware('auth')->name('book');

//добавление книги
Route::post('/add/{username}', 'BookController@add')->middleware('auth')->name('add');

//редактирование книги
Route::get('/edit/{bookid}', 'BookController@getedit')->middleware('auth')->name('edit');
Route::post('/edit/{bookid}', 'BookController@postEdit')->middleware('auth');

//удаление 
Route::get('/delete/{bookid}', 'BookController@deleteBook')->middleware('auth')->name('delete');

//добавление доступа и удаление из доступа к библиотеке
Route::get('reader/{username}', 'ReaderController@addReader')->middleware('auth')->name('reader');
Route::get('reader/del/{username}', 'ReaderController@delReader')->middleware('auth')->name('reader.del');

//доступ по ссылке

Route::get('link', 'LinkController@getLink')->name('link');

Route::get('links/{username}', 'LinkController@viewLink');

Route::get('links/book/{bookid}', 'BookController@readLink')->middleware('link')->name('links.book');