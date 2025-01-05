<?php


use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CountryController;
use Illuminate\Support\Facades\Route;

Route::middleware('isAdmin')->prefix('admin')->group(function () {

    Route::get('/', function () {
        //return view('admin.master.dashboard');
        return 'hellow admin';
    });


    Route::resource('categories', CategoriesController::class);

    Route::resource('countries', CountryController::class);


});

