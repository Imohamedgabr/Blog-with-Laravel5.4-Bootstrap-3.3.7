<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

// to add all our routes through the "web" middle ware for security

Route::group(['middleware' => ['web']], function () {

	// check route:list in the Git bash so u can see the route added there

	Route::get('blog/{slug}', ['as' => 'blog.single' , 'uses' =>'BlogController@getSingle'])->where('slug','[\w\d\-\_]+'); // regular expression any word any number or dash or _
	// the plus means however many you want

	// 'as' > gives it a term like a shortcut if you do route:list 
	// it will show under the name 
	Route::get('blog', ['uses'=>'BlogController@getIndex' , 'as'=>'blog.index'] );
	
    Route::get('contact', 'PagesController@getContact'); // get is for http get request
    Route::post('contact', 'PagesController@postContact'); 



	Route::get('about', 'PagesController@getAbout');

	Route::get('/', 'PagesController@getIndex');

	Route::resource('posts','PostController');


	// categories , we set all the routes for categories we dont want the create one
	Route::resource('categories','CategoryController',['except'=> ['create']]);
	// adding all routes for tags
	Route::resource('tags','TagController',['except'=> ['create']]);

	// comments
	Route::post('comments/{post_id}', ['uses' => 'CommentsController@store', 'as' => 'comments.store']);
	Route::get('comments/{id}/edit', ['uses' => 'CommentsController@edit', 'as' => 'comments.edit']);
	Route::put('comments/{id}', ['uses' => 'CommentsController@update', 'as' => 'comments.update']);
	Route::delete('comments/{id}', ['uses' => 'CommentsController@destroy', 'as' => 'comments.destroy']);
	Route::get('comments/{id}/delete', ['uses' => 'CommentsController@delete', 'as' => 'comments.delete']);
	
	Auth::routes();

	Route::get('/home', 'HomeController@index');

	// the /log out wasnt working correctly until u add this route
	Route::get('/logout', 'Auth\LoginController@logout');


});

