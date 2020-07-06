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

Route::get('/', 'NewsController@index')->name('index');

Route::group(
    [
        "prefix" => "category",
        "as" => "category.",
    ],
    function() {
        Route::get('/', [
            'uses' => 'CategoryController@index',
            'as' => 'index',
        ]);
        
        Route::get('/{id}', [
            'uses' => 'CategoryController@category',
            'as' => 'id',
        ])->where('id', '\d+');
    }
);

Route::group(
    [
        "prefix" => "news",
        "as" => "news.",
    ],
    function() {
        Route::get('/', [
            'uses' => 'NewsController@index',
            'as' => 'index',
        ]);
        
        Route::get('/category/{id}', [
            'uses' => 'NewsController@category',
            'as' => 'category',
        ])->where('id', '\d+');
        
        Route::get('/{id}', [
            'uses' => 'NewsController@news',
            'as' => 'id',
        ])->where('id', '\d+');
        
        Route::get('/create', [
            'uses' => 'NewsController@createNews',
            'as' => 'create',
        ]);
    }
);

Route::get('/login', [
    'uses' => 'UserController@login',
    'as' => 'user.login'
]);

Route::group(
    [
        "prefix" => "feedback",
        "as" => "feedback.",
    ],
    function() {
        Route::get('/', [
            'uses' => 'FeedbackController@index',
            'as' => 'index',
        ]);

        Route::post('/', [
            'uses' => 'FeedbackController@addFeedback',
            'as' => 'index',
        ]);
        
        Route::get('list/{id?}', [
            'uses' => 'FeedbackController@listFeedback',
            'as' => 'list',
        ]);
    }
);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
