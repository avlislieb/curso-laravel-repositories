<?php
use Illuminate\Support\Facades\Route;

\Illuminate\Support\Facades\Broadcast::routes();

Route::get('/', function(){
    return view('welcome');
});

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('posts', 'PostController');
Route::post('comment', 'CommentController@store')->name('comment.store');
Route::get('notifications', 'NotificationController@notifications')->name('notifications.notifications');
Route::put('notifications-read', 'NotificationController@markedAsRead')->name('notifications.markAsRead');
Route::put('notifications-read-all', 'NotificationController@markedAllAsRead')->name('notifications.markAllAsRead');
