<?php

use Illuminate\Support\Facades\Route;


Route::get('/', [\App\Http\Controllers\HomeController::class, 'HomeIndex']);

Route::get('/services', [\App\Http\Controllers\ServicesController::class, 'ServiceIndex']);
Route::get('/getServicesData',[\App\Http\Controllers\ServicesController::class, 'getServicesData']);
Route::post('/serviceDelete',[\App\Http\Controllers\ServicesController::class, 'ServiceDelete']);
Route::post('/serviceDetails',[\App\Http\Controllers\ServicesController::class, 'getServicesDetails']);
Route::post('/serviceUpdate',[\App\Http\Controllers\ServicesController::class, 'ServiceUpdate']);
Route::post('/serviceAdd',[\App\Http\Controllers\ServicesController::class, 'ServiceAdd']);
