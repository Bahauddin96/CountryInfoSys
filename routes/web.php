<?php

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
use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FavouritesController;

Route::get('/', function () {
    return redirect('login');
});

Auth::routes();


Route::get('home', [
  'middleware' => 'auth', 
  'uses' => 'HomeController@index'
]);

Route::post('home','HomeController@search');

Route::post('setFav', 'FavouritesController@setFav');

Route::post('removeFav', 'FavouritesController@removeFav');

Route::get('getCountries', 'HomeController@getCountries');