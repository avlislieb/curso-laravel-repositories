<?php
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return view('welcome');
});

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('posts', 'PostController');
Route::post('comment', 'CommentController@store')->name('comment.store');
Route::get('notifications', 'NotificationController@notifications')->name('notifications.notifications');
