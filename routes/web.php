<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DestinationsController;
use App\Http\Controllers\PackageDetailsController;
use App\Http\Controllers\PackagesController;
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
Route::get('/', [HomeController::class, 'index'])->name('/');
Route::get('/destination/{slug}', [HomeController::class, 'single_destination'])->name('destinations.single');
Route::get('/destinations/all', [HomeController::class, 'all_destinations'])->name('destinations.all');
Route::get('/packages/all', [HomeController::class, 'all_packages'])->name('packages.all');

// Auth Routs 
Auth::routes(['register' => false]);

// Dashboard 
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Destinations Back End
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

// Package Back End
Route::get('/package-list', [PackagesController::class, 'list'])->name('package.list');
Route::get('/add-package', [PackagesController::class, 'add'])->name('package.add');
Route::post('/save-package', [PackagesController::class, 'save'])->name('package.save');
Route::get('/package-popular/{id}', [PackagesController::class, 'popular'])->name('package.popular');
Route::get('/package-notpopular/{id}', [PackagesController::class, 'notpopular'])->name('package.notpopular');
Route::get('/package-active/{id}', [PackagesController::class, 'active'])->name('package.active');
Route::get('/package-diactive/{id}', [PackagesController::class, 'diactive'])->name('package.diactive');
Route::get('/package-delete/{id}', [PackagesController::class, 'delete'])->name('package.delete');
Route::post('/package-update', [PackagesController::class, 'update'])->name('package.update');
Route::get('/package-update-view/{id}', [PackagesController::class, 'update_view'])->name('package.update_view');
Route::get('/package-add-details/{id}', [PackagesController::class, 'add_details'])->name('package.add.details');
Route::get('/package-details-list/{id}', [PackagesController::class, 'details_list'])->name('package.details.list');

// Package Details Back End 
Route::post('/save-package-details', [PackageDetailsController::class, 'save'])->name('package.save.details');
Route::get('/package-details-active/{id}', [PackageDetailsController::class, 'active'])->name('package.active.details');
Route::get('/package-details-diactive/{id}', [PackageDetailsController::class, 'diactive'])->name('package.diactive.details');
Route::get('/package-details-delete/{id}', [PackageDetailsController::class, 'delete'])->name('package.delete.details');
Route::post('/package-update-details', [PackageDetailsController::class, 'update'])->name('package.update.details');
Route::get('/package-update-view-details/{id}', [PackageDetailsController::class, 'update_view'])->name('package.update_view.details');