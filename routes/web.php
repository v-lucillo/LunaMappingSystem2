<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Criminal_recordController;
use App\Http\Controllers\Offense_recordController;
use App\Http\Controllers\UserController;

// Route::get('/', function () {
//     return view('welcome');
// })->name('sign_in_page');

// Route::get('/admin', function(){
//     return view();
// })->middleware(['auth', 'role:admin'])->name('admin.index');




Route::prefix("view")->name("view.")->group(function(){ // view only
    Route::get('home','PublicController@home')->name('home');
    Route::get('barangay','PublicController@barangay')->name('barangay');
    Route::get('agriculture','PublicController@agriculture')->name('agriculture');
    Route::get('map','PublicController@map')->name('map');
    Route::get('contact','PublicController@contact')->name('contact');
    Route::get('about','PublicController@about')->name('about');
});

// test

Route::prefix("administrator")->name("administrator.")->group(function(){ //admin
    Route::get('home','AdministratorController@home')->name('home');
    Route::get('barangay','AdministratorController@barangay')->name('barangay');
    Route::get('agriculture','AdministratorController@agriculture')->name('agriculture');
    Route::get('map','AdministratorController@map')->name('map');
    Route::get('contact','AdministratorController@contact')->name('contact');
    Route::get('about','AdministratorController@about')->name('about');
});

