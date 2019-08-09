<?php



/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
|
*/
	Route::get('/','UserHomeController@index');

	Route::get('/post/{post?}','UserPostController@post')->name('post');

	Route::get('post/tag/{tag?}', 'UserHomeController@tag')->name('tag');
   
	Route::get('post/category/{category?}', 'UserHomeController@category')->name('category');

	Route::get('/show-events','EventsController@show')->name('show-events');
	Route::get('/create-events','EventsController@create')->name('create-events');
	Route::post('/add-events','EventsController@addEvent')->name('addevents');
	
	Auth::routes();
/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
*/
Route::get('admin/home','AdminHomeController@index')->name('admin.home');

//Admins users table
Route::resource('admin/admin','AdminUserController');

//Admins role route
Route::resource('admin/role','AdminRoleController');

//post routes
Route::resource('admin/post','AdminPostController');

//tag routes
Route::resource('admin/tag','TagController');

//category route
Route::resource('admin/category','CategoryController');

//Admins permission
Route::resource('admin/permission','AdminPermissionController');
//Route::resource('/user','UserController');

//Admin authentication
Route::get('admin-login','Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('admin-login','Admin\LoginController@login')->name('admin.login');



/*
|--------------------------------------------------------------------------
| Others
|--------------------------------------------------------------------------
|
*/

Route::view('/about', 'user.about', ['title' => "Anyis Blog - About"]);
Route::get('/contact','ContactController@index');
Route::post('/contactMailable','ContactController@sendWithMailable');
Route::post('/contact','ContactController@sendContactMail');

Route::post('/saveLike','LikeController@store');
Route::get('/home', 'UserController@index')->name('home');
Route::get('postlikeCont','LikeController@count');



Route::get('retrievePosts','UserHomeController@getPosts');


