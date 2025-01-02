<?php

use App\Http\Controller\DepartmentController;
use Illuminate\Support\Facades\Route;
Route::prefix('admin')->group(function () {

    Route::get('/', function () {
        return view('admin.master.dashboard');
    });

    Route::resource('departments', DepartmentController::class);

});
