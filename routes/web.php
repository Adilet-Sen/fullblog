<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PostsController;
use App\Http\Controllers\Admin\CommentsController;

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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/about', 'HomeController@about');
Route::get('/contact', 'HomeController@contact');
Route::post('/contact/store', 'HomeController@contactStore');

Route::get('/articles/{slug}', 'HomeController@showPost');
Route::get('/category/{slug}', 'HomeController@category');
Route::get('/tag/{slug}', 'HomeController@tag');

Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', 'AuthController@registerShow');
    Route::post('/register', 'AuthController@register');
    Route::get('/login', 'AuthController@loginShow')->name('login');
    Route::post('/login', 'AuthController@login');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/profile', 'ProfileController@index');
    Route::post('/profile', 'ProfileController@store');
    Route::get('/logout', 'AuthController@logout');
    Route::post('/comments/{id}', 'CommentsController@store');
});

//
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'admin'], function () {
    Route::get('/', 'DashboardController@index')->name('admin');
    Route::get('/profile', 'DashboardController@profile');
    Route::get('/posts/switch/{id}/{value?}', [PostsController::class, 'switch']); // Для изменения status и featured
    Route::get('/comments/switch/{id}', [CommentsController::class, 'switch']);
    Route::resource('/categories', 'CategoriesController');
    Route::resource('/tags', 'TagsController');
    Route::resource('/users', 'UsersController');
    Route::resource('/posts', 'PostsController');
    Route::resource('/comments', 'CommentsController');
    Route::resource('/subscribers', 'SubcriptionsController');
});
