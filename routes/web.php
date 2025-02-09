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

use App\Models\City;
use App\Models\Town;
use App\Models\Provinces;
use App\Models\Slider;

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

include('admin.php');


// Route::get('/', function(){
//     return view('welcome');
// });

 Route::get('/', [HomesliderController::class, 'index']);

Route::get('master',[MasterController::class, 'index'])->name('master');
 Route::post('/fetch-places', [CIndexController::class, 'getPlacesByCategory']);
 Route::get('/pindex/{categoryId}', [CIndexController::class, 'showPlaces']);


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

 Route::get('categories',[CIndexController::class, 'cindex'])->name('catuser');
 Route::get('places',[PIndexController::class, 'pindex'])->name('placeuser');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('admin')->group(function () {
    Route::get('places/upload', [PlaceImageController::class, 'index'])->name('places.upload');
    Route::post('places/upload', [PlaceImageController::class, 'store'])->name('places.upload.store');
});
