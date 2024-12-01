<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Criminal_recordController;
use App\Http\Controllers\Offense_recordController;
use App\Http\Controllers\UserController;


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
Route::get('logout','AdministratorController@logout')->name('logout');

Route::prefix("administrator")->name("administrator.")->group(function(){ //admin
    Route::get('home','AdministratorController@home')->name('home');
    Route::get('barangay','AdministratorController@barangay')->name('barangay');
    Route::get('agriculture','AdministratorController@agriculture')->name('agriculture');
    Route::get('population','AdministratorController@population')->name('population');
    Route::get('facilities','AdministratorController@facilities')->name('facilities');



    Route::post('upload_image','AdministratorController@upload_image')->name('upload_image');

    Route::post('update_person_incharge','AdministratorController@update_person_incharge')->name('update_person_incharge');

    Route::get('create_baranggay_record','AdministratorController@create_baranggay_record')->name('create_baranggay_record');
    Route::get('create_agri_record','AdministratorController@create_agri_record')->name('create_agri_record');
    Route::get('create_population_record','AdministratorController@create_population_record')->name('create_population_record');
    Route::get('create_facility_record','AdministratorController@create_facility_record')->name('create_facility_record');
    Route::get('get_facility_record','AdministratorController@get_facility_record')->name('get_facility_record');


    Route::get('get_population_records','AdministratorController@get_population_records')->name('get_population_records');


    Route::get('get_baranggay_record','AdministratorController@get_baranggay_record')->name('get_baranggay_record');
    Route::get('get_agri_record','AdministratorController@get_agri_record')->name('get_agri_record');
    Route::get('get_barangay_chart','AdministratorController@get_barangay_chart')->name('get_barangay_chart');

    Route::get('get_baranggay_record_for_map','AdministratorController@get_baranggay_record_for_map')->name('get_baranggay_record_for_map');


    Route::get('get_facilities_record_for_map','AdministratorController@get_facilities_record_for_map')->name('get_facilities_record_for_map');
    Route::get('get_population_record','AdministratorController@get_population_record')->name('get_population_record');


    Route::get('add_user','AdministratorController@add_user')->name('add_user');





    Route::get('get_all_barangays','AdministratorController@get_all_barangays')->name('get_all_barangays');
});

