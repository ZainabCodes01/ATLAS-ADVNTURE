<?php

use App\Http\Controllers\MasterController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\ProvincesController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\PlaceImageController;
use App\Http\Controllers\PIndexController;
use App\Http\Controllers\CIndexController;
use App\Http\Controllers\HomesliderController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RateController;

use App\Models\City;
use App\Models\Town;
use App\Models\Provinces;
use App\Models\Slider;
use App\Models\Places;
use App\Models\Categories;

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

include('admin.php');


//Route::get('/', function(){
   // return view('welcome');
//});

 Route::get('/', [HomesliderController::class, 'index'])->name('homeslider');


Route::get('master',[MasterController::class, 'index'])->name('master');

 Route::post('/fetch-places', [CIndexController::class, 'getPlacesByCategory']);

 Route::get('/pindex/{categoryId}', [CIndexController::class, 'showPlaces']);


 Route::get('/place/{id}', [HomeSliderController::class, 'showPlace'])->name('homeslider.show'); // Show place details
 Route::get('/places/{countryId}', [HomesliderController::class, 'showPlaces'])->name('places.show');

 Route::get('/get-places/{id}', [HomesliderController::class, 'getPlaces'])->name('get.places');





 Route::get('/place/{id}', [HomeSliderController::class, 'showPlace'])->name('homeslider.show'); // Show place details

Route::get('getProvinces',function(Request $request){
    $country_id=$request->someattribute;
    $provinces=Provinces::where('country_id',$country_id)->get();
    echo '<option value="{{ null }}">Select Province</option>';
    foreach($provinces as $province){
        echo '<option value="'.$province->id.'">'.$province->name.'</option>';
    }

});
Route::get('getCities',function(Request $request){

    $province_id=$request->someattribute;
    $citys=City::where('province_id',$province_id)->get();
    echo '<option value="{{ null }}">Select City</option>';
    foreach($citys as $city){
        echo '<option value="'.$city->id.'">'.$city->name.'</option>';
    }

});
Route::get('getTown',function(Request $request){

    $city_id=$request->someattribute;
    $town=Town::where('city_id',$city_id)->get();
    echo '<option value="{{ null }}">Select Town</option>';
    foreach($town as $twon){
        echo '<option value="'.$twon->id.'">'.$twon->name.'</option>';
    }

});



 Route::get('categories',[CIndexController::class, 'cindex'])->name('categories.user');
 Route::get('places',[PIndexController::class, 'pindex'])->name('placeuser');





 Route::post('/rate-place', [RateController::class, 'store'])->middleware('auth');



Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});

Route::post('/gallery/store', [GalleryController::class, 'store'])->name('gallery.store');
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');
Route::delete('/gallery/{id}', [GalleryController::class, 'destroy'])->name('gallery.destroy');



Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});




Auth::routes();
Route::prefix('admin')->group(function () {
    Route::get('places/upload', [PlaceImageController::class, 'index'])->name('places.upload');
    Route::post('places/upload', [PlaceImageController::class, 'store'])->name('places.upload.store');
});
