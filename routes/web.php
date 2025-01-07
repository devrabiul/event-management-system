<?php

use App\Http\Controllers\Frontend\EventController;
use App\Http\Controllers\Frontend\FrontendHomeController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::controller(FrontendHomeController::class)->group(function() {
    Route::get('/', 'index')->name('frontend.index');
});

Route::controller(EventController::class)->group(function() {
    Route::get('/events',  'index')->name('frontend.events.index');
    Route::post('/events',  'store')->name('frontend.events.store');
    Route::get('/events/{id}',  'show')->name('frontend.events.show');
    Route::get('/events/edit/{id}',  'edit')->name('frontend.events.edit');
    Route::post('/events/update',  'update')->name('frontend.events.update');
    Route::get('/events/delete/{id}',  'destroy')->name('frontend.events.delete');
});
