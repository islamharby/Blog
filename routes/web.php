<?php
Route::get('/',function ()
{
	return view('welcome');
});
Route::group([ 'middleware' => ['guest'] ],function(){
    Route::get('/login','LoginController@index')->name('login');
    Route::get('/signup','SignupController@index');
    Route::post('/login','LoginController@process');
	Route::post('/signup','SignupController@process');
});
Route::group([ 'middleware' => ['auth', 'role:user'], 'namespace' => 'User', 'prefix' => 'user' ],function(){

			Route::get('home','SearchController@index' );
			Route::get('profile/{id}','ProfileeditController@index');
			Route::post('profile/{id}','ProfileeditController@process');
			Route::get('post-page','PostController@index');
			Route::post('post-page','PostController@process');
			Route::get('post-delet/{id}','PostController@remove' );
			Route::get('post-edit/{id}','PostController@edit' );
			Route::post('post-edit/{id}','PostController@editProcess' );
			Route::get('post-view/{id}','PostController@viewpost' );
			Route::get('post-edit-view/{id}','PostController@editview' );
			Route::post('post-edit-view/{id}','PostController@editProcessview' );
			Route::get('post-delet-view/{id}','PostController@removeview' );

});
Route::get('/logout', function(){
	Auth::logout();
	return redirect('/');
});

Route::group([ 'middleware' => ['auth', 'role:admin'] , 'namespace' => 'Admin', 'prefix' => 'admin'],
	function(){
			Route::get('panel','AdminController@index');
			Route::get('users','UserController@date');
			Route::get('users-remove/{id}','UserController@remove');
			Route::get('users-edit/{id}','UserController@edit');
			Route::post('users-edit/{id}','UserController@editProcess');
			Route::get('users-add','UserController@addUser');
			Route::post('users-add','UserController@addProcess');
			Route::get('profile/{id}','UserController@profile');
			Route::post('profile/{id}','UserController@profileProcess');
			Route::get('post-add','PostController@add');
			Route::post('post-add','PostController@addprocess');
			Route::get('post-edit/{id}','PostController@edit');
			Route::post('post-edit/{id}','PostController@editProcess');
			Route::get('post-remove/{id}','PostController@remove');
			Route::get('posts','PostController@data');
			Route::get('posts-add','PostController@addcontroll');
			Route::post('posts-add','PostController@addprocesscontroll');
			Route::get('posts-edit/{id}','PostController@editcontroll');
			Route::get('posts-remove/{id}','PostController@removeControll');
			Route::post('posts-edit/{id}','PostController@editProcessControll');
			Route::get('post-view/{id}','PostController@viewpost' );
			Route::get('post-view-edit/{id}','PostController@editview' );
			Route::post('post-view-edit/{id}','PostController@editProcessView' );
			Route::get('settings-page','SettingsController@index');
			Route::post('settings-page','SettingsController@colorprocess');

});

Route::any('{any}', function() {
	return view('notfound');
})->where('any', '.*');
