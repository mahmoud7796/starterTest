<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AjaxController;
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
Route::get('/first_time', 'TestmodelController@first_time');
Route::get('/youtube', 'TestmodelController@youtube');
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
    Route::get('/edit/{id}', 'TestmodelController@edit')-> name('offers.edit');
    Route::post('/update/{id}', 'TestmodelController@update')-> name('offers.update');
    Route::get('/delete/{id}', 'TestmodelController@delete')-> name('offers.delete');

});



});

####### Start AJAX ##############
Route::group(['prefix'=>'offers-ajax'],function(){

    Route::get('/create','AjaxController@create')-> name('ajax.offer.create');
    Route::post('/store','AjaxController@store')-> name('ajax.offer.store');

});
####### End AJAX ##############


