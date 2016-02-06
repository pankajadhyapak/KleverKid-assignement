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


Route::get('tagSeed', function(){

    $tags = ['technical','arts','commerce','science','economics'];

    foreach($tags as $tag){
        \App\Tag::create(['name' => $tag]);
   }

});

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

    Route::get('/', 'AcademyController@index');
    Route::resource('academies', 'AcademyController');
    Route::get('academies/{id}/addImages', 'AcademyController@addImages');
    Route::post('academies/{id}/addImages', 'AcademyController@saveImages');
    Route::get('academies/{id}/complete', 'AcademyController@complete');
});
