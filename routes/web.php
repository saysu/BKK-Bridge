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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', function () {
  return view('welcome');
});

Route::resource('/events', 'EventController');
Route::resource('/events/{event}/participate', 'ParticipateController');
Route::resource('/events/{event}/keep', 'KeepController');
Route::resource('/users', 'UserController');
Route::resource('/comments', 'CommentController')->middleware('auth');
Route::get('/event/edit', 'EventController@edit')->name('event_edit');
Route::post('/event/edit', 'EventController@update')->name('event_update');
Route::get('/event/delete', 'EventController@delete')->name('event_delete');
Route::post('/event/remove', 'EventController@remove')->name('event_remove');

Route::get('/contact', 'ContactController@index')->name('contact.index');

//確認ページ
Route::post('/contact/confirm', 'ContactController@confirm')->name('contact.confirm');

//送信完了ページ
Route::post('/contact/thanks', 'ContactController@send')->name('contact.send');

// 質問集
Route::get('/question', 'QuestionController@index')->name('question.index');



