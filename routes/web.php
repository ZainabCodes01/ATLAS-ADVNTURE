<?php

use App\Http\Controllers\MasterController;
use Illuminate\Support\Facades\Route;

include('admin.php');
Route::get('/', function(){
    return view('welcome');
});

Route::get('master',[MasterController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
