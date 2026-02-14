<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\ProvincesController;
use App\Http\Controllers\TownController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\PlacesController;
use App\Http\Controllers\PlaceImageController;
use App\Http\Controllers\SliderController;

Route::middleware('isAdmin')->prefix('admin')->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('admin.dashboard');

    Route::get('/app', [DashboardController::class, 'app'])
        ->name('admin.app');

    Route::get('/', [DashboardController::class, 'index']);

    // Resources
    Route::resource('categories', CategoriesController::class);
    Route::get('/categories/{slug}', [CategoriesController::class, 'show'])
    ->name('admin.categories.slug');


    Route::resource('countries', CountryController::class);
    Route::resource('provinces', ProvincesController::class);
    Route::resource('town', TownController::class);
    Route::resource('city', CityController::class);
    Route::resource('places', PlacesController::class);
    Route::resource('placeimage', PlaceImageController::class);
    Route::resource('slider', SliderController::class)->except(['show']);

});
