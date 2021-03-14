<?php

//User Routes
Route::group(['namespace' => 'User'], function(){
	Route::get('/', 'HomeController@index');
	Route::get('/post/{post}','PostController@post')->name('post');
	// Route::get('tag','Tag\Controller@index')->name('tag');

	//
	Route::get('post/tag/{tag}','HomeController@tag')->name('tag');
	Route::get('post/category/{category}','HomeController@category')->name('category');
});


//Admin Routes
Route::group(['namespace' => 'Admin'], function(){
	//rota para home
	Route::get('admin/home', 'HomeController@home')->name('admin.home');
	//rota para post
	Route::resource('admin/post', 'PostController');
	//rota para tag
	Route::resource('admin/tag', 'TagController');
	//rota para category
	Route::resource('admin/category', 'CategoryController');
	//rota para user
	Route::resource('admin/user', 'UserController');//rota para role
	Route::resource('admin/role', 'RoleController');
	//para role
	Route::resource('admin/permission', 'PermissionController');
	//rota para sobre
	Route::resource('admin/sobre', 'SobreController');

	//admin Auth routes
// Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
	Route::get('admin-login','Auth\LoginController@showLoginForm')->name('admin.login');
	Route::post('admin-login','Auth\LoginController@login');
});


 
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
