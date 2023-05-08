<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// Frontend Routes 
Route::get('/', function () {
    return view('frontend/home');
});

// Backend Routs 
Auth::routes(['register' => false]);

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

// Destinations 
Route::get('/destinations-list', [App\Http\Controllers\DestinationsController::class, 'list'])->name('destinations-list');
Route::get('/add-destinations', [App\Http\Controllers\DestinationsController::class, 'add'])->name('add-destinations');
Route::post('/save-destinations', [App\Http\Controllers\DestinationsController::class, 'save'])->name('save-destinations');

