<?php

use App\Http\Controllers\MasterController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\ProvincesController;
use App\Http\Controllers\CityController;

use App\Models\City;
use App\Models\Town;
use App\Models\Provinces;

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
include('admin.php');


Route::get('/', function(){
    return view('welcome');
});

Route::get('master',[MasterController::class, 'index']);


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

//Route::get('/test-provinces', function () {
   // $provinces = Provinces::with('country')->get();
    //foreach ($provinces as $province) {
      ///  echo $province->id . ' - ' . $province->country->name . ' - ' . $province->name . '<br>';
    //}
//});


//Route::get('/provinces', function () {
   // $provinces = DB::table('provinces')
      //  ->join('countries', 'provinces.country_id', '=', 'countries.id')
       // ->select('provinces.id', 'countries.name as country_name', //'provinces.name as province_name')
       // ->get();

    //return view('provinces.index', ['provinces' => $provinces]);
//});



//Routes::get('provinces', function(Request $request){
   // $countries=DB::table('countries')->get;
    //$provinces=Provinces::select('countries.name as countrie','provinces.*')->leftJoin('countries','coutnries.id','=','provinces.countrie_id')->get();
   // return view('provinces.index',compact('provinces','countries'));

//});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
