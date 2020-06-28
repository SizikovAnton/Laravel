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

Route::get('/', 'HomeController@index');

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

// //Страница приветствия пользователя
// Route::get('/hello.html', function () {
//     $name = request()->has('name') ? request()->get('name') : null;
//     if(is_null($name)) {
//         return "Укажите имя";
//     } else {
//         return "Hello, " . $name;
//     }
// });

// //Страница с информацией о проекте
// Route::get('/about.html', function () {
//     return "<h1>Информация о проекте</h1>";
// });

// //Страница для вывода одной новости или списка новостей и проверка адреса без ".html"
// Route::get('/news', function () {
//     $id = request()->has('id') ? request()->get('id') : null;
//     if(is_null($id)) {
//         return "<h1>Список новостей</h1>";
//     } else {
//         return "<h1>Новость с ID=$id</h1>";
//     }
// });