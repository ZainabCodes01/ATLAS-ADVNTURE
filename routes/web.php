<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\MasterController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\ProvincesController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\PlaceImageController;
use App\Http\Controllers\Category_PlaceController;
use App\Http\Controllers\Categories_OverviewController;
use App\Http\Controllers\HomesliderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RateController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\AboutusController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\FestivalsController;
use App\Http\Controllers\PlacesController;

include('admin.php');

// Home
Route::get('/', [HomesliderController::class, 'index'])->name('homeslider');
Route::get('master', [MasterController::class, 'index'])->name('master');

// Categories & Places
Route::post('/fetch-places', [Categories_OverviewController::class, 'getPlacesByCategory']);
Route::get('/category_place/{categoryId}', [Categories_OverviewController::class, 'showPlaces']);
Route::get('/place/{id}', [HomesliderController::class, 'showPlace'])->name('homeslider.show');
Route::get('/country/{countryId}/places',
    [HomesliderController::class, 'showPlaces']
)->name('country.places');

Route::get('/get-places/{id}', [HomesliderController::class, 'getPlaces'])->name('get.places');

// Favorites & Rating
Route::post('/toggle-favorite', [FavoriteController::class, 'toggleFavorite'])->middleware('auth');
Route::post('/rate-place', [RateController::class, 'store'])->middleware('auth');

// Profile
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile/favorites', [FavoriteController::class, 'index'])->name('profile.favorites');
});

// Static Pages
Route::get('About', [AboutusController::class,'index'])->name('aboutus');
Route::get('categories', [Categories_OverviewController::class, 'categories_overview'])->name('categories.user');
Route::get('places', [Category_PlaceController::class, 'category_place'])->name('placeuser');

// Food & Festivals
Route::get('/foods', [FoodController::class, 'index'])->name('food.index');
Route::get('/foods/{id}', [FoodController::class, 'show'])->name('foods.show');
Route::get('/Festivals', [FestivalsController::class, 'index'])->name('Festivals.index');
Route::get('/Festivals/{id}', [FestivalsController::class, 'show'])->name('Festivals.show');

// AJAX Routes (Duplicate removed)
Route::get('/get-provinces/{country_id}', [ProvincesController::class, 'getProvincesByCountry']);
Route::get('/get-cities/{province_id}', [CityController::class, 'getCities']);

// Gallery
Route::post('/gallery/store', [GalleryController::class, 'store'])->name('gallery.store');
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');
Route::delete('/gallery/{id}', [GalleryController::class, 'destroy'])->name('gallery.destroy');

// Auth
Auth::routes(['verify' => true]);
