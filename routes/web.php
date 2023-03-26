<?php

use App\Http\Controllers\AboutpageController;
use App\Http\Controllers\FteureController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HowItWorkController;
use App\Http\Controllers\SliderController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('layouts.frontend');
});
Route::get('dashboard', function () {
    return view('layouts.backend');
})->name('dashboard');
Route::get('edit_profile', function () {
    return view('layouts.backend');
})->name('edit_profile');

Route::group(['middleware' => ['auth'], 'prefix' => 'dashboard'], function () {
    Route::resource('sliders',SliderController::class);
    Route::resource('how_it_works',HowItWorkController::class);
    Route::post('updateOrder',[HowItWorkController::class,'updateOrder'])->name('menu_update');
    Route::get('update_status',[SliderController::class,'update_status'])->name('sliders.update.status');
    Route::get('aboutpage',[AboutpageController::class,'index'])->name('aboutpage.index');
    Route::post('aboutpage_edit',[AboutpageController::class,'update'])->name('aboutpage.update');
    Route::resource('fteures',FteureController::class);


});


Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');
