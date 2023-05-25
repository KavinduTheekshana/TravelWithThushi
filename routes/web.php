<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DestinationsController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\PackageDetailsController;
use App\Http\Controllers\PackagesController;
use App\Http\Controllers\TestimonialController;
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
Route::get('/packages/{slug}', [HomeController::class, 'single_package'])->name('packages.single');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/gallery', [HomeController::class, 'gallery'])->name('gallery');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

// Booking Routs 
Route::post('/booking/send', [BookingController::class, 'save'])->name('booking.send');

//contact us form
Route::post('/contact/save', [ContactController::class, 'save'])->name('contact.save');


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
Route::get('/package-view/{id}', [PackagesController::class, 'package_view'])->name('package.view');

// Package Details Back End 
Route::post('/save-package-details', [PackageDetailsController::class, 'save'])->name('package.save.details');
Route::get('/package-details-active/{id}', [PackageDetailsController::class, 'active'])->name('package.active.details');
Route::get('/package-details-diactive/{id}', [PackageDetailsController::class, 'diactive'])->name('package.diactive.details');
Route::get('/package-details-delete/{id}', [PackageDetailsController::class, 'delete'])->name('package.delete.details');
Route::post('/package-update-details', [PackageDetailsController::class, 'update'])->name('package.update.details');
Route::get('/package-update-view-details/{id}', [PackageDetailsController::class, 'update_view'])->name('package.update_view.details');

// Bookings Back End 
Route::middleware('auth')->group(function () {
    Route::get('/bookings-list', [BookingController::class, 'list'])->name('bookings.list');
    Route::get('/booking-read/{id}', [BookingController::class, 'read'])->name('booking.read');
    Route::get('/booking-unread/{id}', [BookingController::class, 'unread'])->name('booking.unread');
    Route::get('/booking-delete/{id}', [BookingController::class, 'delete'])->name('booking.delete');
});

// Gallery Back End 
Route::get('/image-list', [GalleryController::class, 'list'])->name('image.list');
Route::get('/add-image', [GalleryController::class, 'add'])->name('image.add');
Route::post('/save-image', [GalleryController::class, 'save'])->name('image.save');
Route::get('/image-popular/{id}', [GalleryController::class, 'popular'])->name('image.popular');
Route::get('/image-notpopular/{id}', [GalleryController::class, 'notpopular'])->name('image.notpopular');
Route::get('/image-active/{id}', [GalleryController::class, 'active'])->name('image.active');
Route::get('/image-diactive/{id}', [GalleryController::class, 'diactive'])->name('image.diactive');
Route::get('/image-delete/{id}', [GalleryController::class, 'delete'])->name('image.delete');


// Contact Back End 
Route::middleware('auth')->group(function () {
    Route::get('/contact-list', [ContactController::class, 'list'])->name('contact.list');
    Route::get('/contact-read/{id}', [ContactController::class, 'read'])->name('contact.read');
    Route::get('/contact-unread/{id}', [ContactController::class, 'unread'])->name('contact.unread');
    Route::get('/contact-delete/{id}', [ContactController::class, 'delete'])->name('contact.delete');
});


// Testimonial back End 
Route::get('/testimonial-list', [TestimonialController::class, 'list'])->name('testimonial.list');
Route::get('/add-testimonial', [TestimonialController::class, 'add'])->name('testimonial.add');
Route::post('/save-testimonial', [TestimonialController::class, 'save'])->name('testimonial.save');
Route::get('/testimonial-active/{id}', [TestimonialController::class, 'active'])->name('testimonial.active');
Route::get('/testimonial-diactive/{id}', [TestimonialController::class, 'diactive'])->name('testimonial.diactive');
Route::get('/testimonial-delete/{id}', [TestimonialController::class, 'delete'])->name('testimonial.delete');