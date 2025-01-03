<?php

use App\Http\Controller\DepartmentController;
use Illuminate\Support\Facades\Route;
Route::middleware('isAdmin')->prefix('admin')->group(function () {

    Route::get('/', function () {
        return view('admin.master.dashboard');
        //return 'hellow admin';
    });

    Route::resource('departments', DepartmentController::class);

});

