<?php

use App\Http\Controllers\MasterController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\ProvincesController;
use App\Http\Controllers\CityController;
use App\Models\City;
use Illuminate\Support\Facades\Route;

include('admin.php');


Route::get('/', function(){
    return view('welcome');
});

Route::get('master',[MasterController::class, 'index']);

Route::get('getCities',function(Request $request){

    $province_id=$request->someattribute;
    $citys=City::where('province_id',$province_id)->get();
    echo '<option value="{{ null }}">Select City</option>';
    foreach($citys as $city){
        echo '<option value="'.$city->id.'">'.$city->name.'</option>';
    }

});

//Routes::get('provinces', function(Request $request){
   // $countries=DB::table('countries')->get;
    //$provinces=Provinces::select('countries.name as countrie','provinces.*')->leftJoin('countries','coutnries.id','=','provinces.countrie_id')->get();
   // return view('provinces.index',compact('provinces','countries'));

//});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
