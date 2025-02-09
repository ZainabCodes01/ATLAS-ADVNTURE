<?php


use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\ProvincesController;
use App\Http\Controllers\TownController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\PlacesController;
use App\Http\Controllers\PlaceImageController;
use App\Http\Controllers\FestivalController;
use App\Http\Controllers\SliderController;
use Illuminate\Support\Facades\Route;

Route::middleware('isAdmin')->prefix('admin')->group(function () {

    Route::get('/', function () {
        return view('admin.master.dashboard');
    });


    Route::resource('categories', CategoriesController::class);

    Route::resource('countries', CountryController::class);

    Route::resource('provinces', ProvincesController::class);

    Route::resource('town', TownController::class);

    Route::resource('city', CityController::class);

    Route::resource('places', PlacesController::class);

    Route::resource('placeimage', PlaceImageController::class);

    Route::resource('festival', FestivalController::class);


    Route::resource('slider', SliderController::class)->except(['show']);




});

