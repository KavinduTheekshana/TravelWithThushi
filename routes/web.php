<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DestinationsController;
use Illuminate\Support\Facades\Auth;
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

// Dashboard 
Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

// Destinations 
Route::get('/destinations-list', [DestinationsController::class, 'list'])->name('destinations.list');
Route::get('/add-destinations', [DestinationsController::class, 'add'])->name('destinations.add');
Route::post('/save-destinations', [DestinationsController::class, 'save'])->name('destinations.save');
Route::get('/destinations-popular/{id}', [DestinationsController::class, 'popular'])->name('destinations.popular');
Route::get('/destinations-notpopular/{id}', [DestinationsController::class, 'notpopular'])->name('destinations.notpopular');
Route::get('/destinations-active/{id}', [DestinationsController::class, 'active'])->name('destinations.active');
Route::get('/destinations-diactive/{id}', [DestinationsController::class, 'diactive'])->name('destinations.diactive');
Route::get('/destinations-delete/{id}', [DestinationsController::class, 'delete'])->name('destinations.delete');
Route::post('/destinations-update', [DestinationsController::class, 'update'])->name('destinations.update');
Route::get('/destinations-update-view/{id}', [DestinationsController::class, 'update_view'])->name('destinations.update_view');

