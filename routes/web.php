<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Criminal_recordController;
use App\Http\Controllers\Offense_recordController;
use App\Http\Controllers\UserController;


Route::get('/', function () {
    dd("I am here");
});

// Route::get('/admin', function(){
//     return view();
// })->middleware(['auth', 'role:admin'])->name('admin.index');




// Route::prefix("view")->name("view.")->group(function(){ // view only
    Route::get('/','PublicController@home');
    Route::get('home','PublicController@home')->name('home');
    Route::get('barangay','PublicController@barangay')->name('barangay');
    Route::get('agriculture','PublicController@agriculture')->name('agriculture');
    Route::get('map','PublicController@map')->name('map');
    Route::get('contact','PublicController@contact')->name('contact');
    Route::get('about','PublicController@about')->name('about');
// });

// test

Route::get('administrator','AdministratorController@sign_in_page')->name('administrator');
Route::get('login','AdministratorController@login')->name('login');


Route::prefix("administrator")->name("administrator.")->group(function(){ //admin
    Route::get('home','AdministratorController@home')->name('home');
    Route::get('barangay','AdministratorController@barangay')->name('barangay');
    Route::get('agriculture','AdministratorController@agriculture')->name('agriculture');

    Route::post('upload_image','AdministratorController@upload_image')->name('upload_image');

    Route::post('update_person_incharge','AdministratorController@update_person_incharge')->name('update_person_incharge');

    Route::get('create_baranggay_record','AdministratorController@create_baranggay_record')->name('create_baranggay_record');
    Route::get('create_agri_record','AdministratorController@create_agri_record')->name('create_agri_record');


    Route::get('get_baranggay_record','AdministratorController@get_baranggay_record')->name('get_baranggay_record');
    Route::get('get_agri_record','AdministratorController@get_agri_record')->name('get_agri_record');
    Route::get('get_barangay_chart','AdministratorController@get_barangay_chart')->name('get_barangay_chart');

    Route::get('get_baranggay_record_for_map','AdministratorController@get_baranggay_record_for_map')->name('get_baranggay_record_for_map');

});

