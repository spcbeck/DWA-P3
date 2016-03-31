<?php
/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {

    Route::get('/articles/create', 'ArticleController@getCreateArticle');
    Route::get('/writers/create', 'ArticleController@getCreateWriter');

    Route::get('/articles/scrape', 'ArticleController@getScrapeArticle');

    Route::get('/', function () {
	    return view("layout.master")->nest("content", "articles.create", ["type" => ""])->nest("articleDisplay", "articles.index");
	});

});
