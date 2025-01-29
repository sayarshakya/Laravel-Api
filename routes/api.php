<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SalaryController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get("/test", function(){
    return ["name"=>"Sayar shakya", "channel"=>"Code Setp by Step"];
});

Route::post('/salaries', [SalaryController::class, 'storeOrUpdate']);
Route::get('/admin/salaries', [SalaryController::class, 'index']);
Route::put('/admin/salaries/{id}', [SalaryController::class, 'update']);
Route::delete('/admin/salaries/{id}', [SalaryController::class, 'destroy']);
