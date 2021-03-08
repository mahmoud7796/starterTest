<?php

use Illuminate\Support\Facades\Auth;
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



Auth::routes(['verify'=>true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
Route::get('/', function () {
    return view('welcome');
});


/*Route::get('/redirect/{service}','SocialiteController@redirect');
Route::get('/callback/{service}','SocialiteController@callback');*/


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/data', 'TestmodelController@retrieveData');


Route::group(['prefix'=> LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function (){

Route::group(['prefix'=>'offers'], function(){
    Route::get('create','TestmodelController@create')-> name('offers.create');
    Route::post('/store', 'TestmodelController@store')-> name('offers.store');
    Route::get('/index', 'TestmodelController@index')-> name('offers.index');

    });


});

