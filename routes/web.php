<?php
Auth::routes();

Route::get('/', 'PostController@index')->name('posts.index');

Route::resource('/posts', 'PostController')->except(['index','show'])->middleware('auth');

Route::get('/posts/{post}/like', 'PostController@like')->name('posts.like')->middleware('auth');
Route::get('/posts/{post}/unlike', 'PostController@unlike')->name('posts.unlike')->middleware('auth');

Route::get('/posts/{post}/comments', 'CommentController@index')->name('comments.index');
// Route::post('/posts/{post}/comments/store', 'CommentController@store')->name('comments.store');
// Route::get('/posts/{post}/comments/{comment}/edit', 'CommentController@edit')->name('comments.edit');
// Route::put('/posts/{post}/comments/{comment}', 'CommentController@update')->name('comment')
Route::resource('/posts/{post}/comments', 'CommentController')->except(['index', 'show', 'create'])->middleware('auth');

Route::get('/users/{name}', 'UserController@show')->name('users.show');
Route::get('/users/{name}/likes', 'UserController@likes')->name('users.likes');
Route::get('/users/{name}/follow', 'UserController@follow')->name('users.follow')->middleware('auth');
Route::get('/users/{name}/unfollow', 'UserController@unfollow')->name('users.unfollow')->middleware('auth');
Route::get('/users/{name}/followings', 'UserController@followings')->name('users.followings');
Route::get('/users/{name}/followers', 'UserController@followers')->name('users.followers');
