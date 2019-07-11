<?php

use Illuminate\Support\Facades\Route;

/*
use App\Http\Controllers\TicketsController;
use Symfony\Component\Routing\Annotation\Route;
use Illuminate\Routing\Route;
use Symfony\Component\Routing\Route;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Route;*/

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
Route::get('users/register','Auth\RegisterController@showRegistrationForm');
Route::post('users/register','Auth\RegisterController@register')->name('register');
Route::get('users/login','Auth\LoginController@showLoginForm')->name('login');
Route::post('users/login','Auth\LoginController@Login')->name('login');

Route::post('users/logout','Auth\LoginController@Logout')->name('logout');


Route::view('/', 'layouts/home')->name('page.home');
Route::view('/about', 'layouts/about')->name('page.about');
//ticket
Route::get('/contact', 'TicketsController@create')->name('create');
 Route::post('/contact', 'TicketsController@store')->name('store');

 Route::group(['prefix'=>'admin','as'=>'admin.','namespace'=>'Admin','middleware'=>['manager']], function(){

    Route::get('/', 'PagesController@home')->name('pages.home');
   
    Route::name('tickets.')->group(function(){
        Route::get('/tickets','TicketsController@index')->name('index');
        Route::get('/tickets/{slug}','TicketsController@show')->name('show');
        Route::get('/tickets/{slug}/edit','TicketsController@edit')->name('edit');
        Route::patch('/tickets/{slug}/edit','TicketsController@update')->name('update');
        Route::delete('/ticket/{slug}','TicketsController@destroy')->name('destroy');
    });

    Route::name('roles.')->group(function(){
        Route::get('roles', 'RolesController@index')->name('index');
        Route::get('roles/create', 'RolesController@create')->name('create');
        Route::post('roles/create', 'RolesController@store')->name('store');
    });

    Route::name('users.')->group(function(){
        Route::get('users','UsersController@index')->name('index');
        Route::get('users/{id?}/edit', 'UsersController@edit')->name('edit');
        Route::post('users/{id?}/edit','UsersController@update')->name('update');
    });
        Route::name('categories.')->group(function(){
        Route::get('categories', 'CategoriesController@index')->name('index');
        Route::get('categories/create', 'CategoriesController@create')->name('create');
        Route::post('categories/create', 'CategoriesController@store')->name('store');
    });

    Route::name('posts.')->group(function(){
        Route::get('posts', 'PostsController@index')->name('index');
        Route::get('posts/create','PostsController@create')->name('create');
        Route::post('posts/create','PostsController@store')->name('store');
        Route::get('posts/{id?}/edit', 'PostsController@edit')->name('edit');
        Route::post('posts/{id?}/edit','PostsController@update')->name('update');
    });
    
});


//comments
Route::post('comment','CommentsController@newComment')->name('newComment');
Auth::routes();

Route::get('blog', 'BlogController@index')->name('index');
Route::get('blog/{title?}', 'BlogController@show')->name('show');


Route::get('/home', 'HomeController@index')->name('home');
