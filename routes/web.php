<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\StreamsController;
use App\Http\Controllers\StreamsRsvpController;

Route::view('/', 'pages.home')->name('home');
Route::view('/about', 'pages.about')->name('about');
Route::view('/contact', 'pages.contact')->name('contact');
Route::view('/services', 'pages.services')->name('services');
Route::get('/streams', [StreamsController::class, 'index'])->name('streams');
Route::get('/streams/{stream:slug}', [StreamsController::class, 'show'])->name('streams.show');
Route::post('/streams/{stream:slug}/rsvp', [StreamsRsvpController::class, 'store'])->name('streams.rsvp.store');

// submit appointment form
Route::post('/appointment', [AppointmentController::class, 'store'])->name('appointment.store');
// submit rsvp
