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

 Route::get('/categories', [CIndexController::class, 'search'])->name('categories');

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


// Route::get('categories', function (Request $request) {
//     $category_id = $request->category_id;
//     $search = $request->place;

//     // Get all categories for the dropdown
//     $categories = Categories::all();

//     // Fetch places based on category and search term
//     $places = Places::query();

//     if (!empty($category_id)) {
//         $places->where('category_id', $category_id);
//     }

//     if (!empty($search)) {
//         $places->where('name', 'LIKE', '%' . $search . '%');
//     }

//     $places = $places->get();

//     return view('homeslider.index', compact('places', 'categories'));
// });



// Route::get('/places/{id}', [CIndexController::class, 'show'])->name('homeslider.show');


 Route::get('categories',[CIndexController::class, 'cindex'])->name('catuser');
 Route::get('places',[PIndexController::class, 'pindex'])->name('placeuser');



Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});

Route::post('/gallery/store', [GalleryController::class, 'store'])->name('gallery.store');
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');
Route::delete('/gallery/{id}', [GalleryController::class, 'destroy'])->name('gallery.destroy');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('admin')->group(function () {
    Route::get('places/upload', [PlaceImageController::class, 'index'])->name('places.upload');
    Route::post('places/upload', [PlaceImageController::class, 'store'])->name('places.upload.store');
});
