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


define('PAGINATION',3);
Auth::routes(['verify'=>true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
Route::get('/first_time', 'TestmodelController@first_time');
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
    Route::get('/pagination', 'TestmodelController@pagination')-> name('offers.pagination');
    Route::get('/edit/{id}', 'TestmodelController@edit')-> name('offers.edit');
    Route::post('/update/{id}', 'TestmodelController@update')-> name('offers.update');
    Route::get('/delete/{id}', 'TestmodelController@delete')-> name('offers.delete');

});
    Route::get('/youtube', 'TestmodelController@youtube')-> middleware('auth');



});

####### Start AJAX ##############
Route::group(['prefix'=>'offers-ajax'],function(){

    Route::get('/create','AjaxController@create')-> name('ajax.offer.create');
    Route::post('/store','AjaxController@store')-> name('ajax.offer.store');
    Route::get('/indexAJ','AjaxController@indexAJ')-> name('ajax.offer.indexAJ');
    Route::post('/delete','AjaxController@delete')-> name('ajax.offer.delete');
    Route::get('/edit/{id}','AjaxController@edit')-> name('ajax.offer.edit');
    Route::post('/udpate','AjaxController@update')-> name('ajax.offer.update');


});
####### End AJAX ##############

########### start Authentication && guards #########
Route::group(['middleware'=> 'CheckAge','namespace'=> 'Auth'], function(){
    Route::get('customauth', 'CustomAuthController@adult')-> name('adult');

});
Route::group(['prefix'=>'admin','namespace'=> 'Auth'],function (){

Route::get('site', 'CustomAuthController@site')-> middleware('auth:web')-> name('site');
Route::get('admin', 'CustomAuthController@admin')-> middleware('auth:admin')-> name('admin');
Route::get('login', 'CustomAuthController@adminlogin')->name('admin.login');
Route::post('login', 'CustomAuthController@Checkadminlogin')->name('save.admin.login');

});


########### end Authentication && guards #########

########### begin Relations #########
Route::group(['prefix'=>'relation'], function(){
    Route::get('one', 'OneRelationController@one');
    Route::get('one-reverse', 'OneRelationController@onereverse');
    Route::get('Elq-condition', 'OneRelationController@Elq_condition');
    Route::get('index', 'OneRelationController@index')-> name('hospital.index');
    Route::get('indexD/{id}', 'OneRelationController@indexD')-> name('hospital.doctors');
    Route::get('many', 'OneRelationController@many');
    Route::get('hasD', 'OneRelationController@hasdoc');
    Route::get('hasmale', 'OneRelationController@hasmale');
    Route::get('delete/{id}', 'OneRelationController@delete')-> name('hospital.delete');

});
########### end Relations  #########

########### begin Many To Many Relations ############

Route::get('doctor-service', 'OneRelationController@docserv')-> name('doctor.service');
Route::get('service-doctor', 'OneRelationController@servdoc');
Route::get('indexmany', 'OneRelationController@indexmany');
Route::get('services/{id}', 'OneRelationController@services')-> name('doctors.services');
Route::post('storedb', 'OneRelationController@storedb')-> name('doctors.storedb');


########### end begin Many To Many Relations #########

########### Start One Through #########
Route::get('onethr', 'OneRelationController@onethr');
Route::get('through', 'OneRelationController@through')-> name('doctors.through');
Route::get('throughmany', 'OneRelationController@throughmany')-> name('doctors.throughmany');

########### end One Through ###########




