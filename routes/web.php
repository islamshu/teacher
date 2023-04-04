<?php

use App\Http\Controllers\AboutpageController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\FteureController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HowItWorkController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;
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
Route::post('company_register',[UserController::class,'company_register'])->name('company_register');
Route::post('login_user',[UserController::class,'login_user'])->name('login_user');
Route::post('teacher_register',[UserController::class,'teacher_register'])->name('teacher_register');
Route::get('teachers',[HomeController::class,'teachers'])->name('teachers');
Route::post('contact_us',[MessageController::class,'contact_us'])->name('contact_us');





Route::get('dashboard', [UserController::class,'dashboard'])->name('dashboard');
Route::get('edit_profile', function () {
    return view('layouts.backend');
})->name('edit_profile');

Route::get('logout_for_user',[UserController::class,'logout_user'])->name('logout_user');
Route::put('teacher_update',[UserController::class,'teacher_update'])->name('teacher_update');


Route::group(['middleware' => ['auth:company','auth:web','auth:teacher']], function () {
    Route::put('company_update',[UserController::class,'company_update'])->name('company_update');

    


});
Route::group(['middleware' => ['auth'], 'prefix' => 'dashboard'], function () {
    Route::resource('sliders',SliderController::class);
    Route::resource('how_it_works',HowItWorkController::class);
    Route::post('updateOrder',[HowItWorkController::class,'updateOrder'])->name('menu_update');
    Route::get('update_status',[SliderController::class,'update_status'])->name('sliders.update.status');
    Route::get('aboutpage',[AboutpageController::class,'index'])->name('aboutpage.index');
    Route::post('aboutpage_edit',[AboutpageController::class,'update'])->name('aboutpage.update');
    Route::resource('fteures',FteureController::class);
    Route::resource('services',ServiceController::class);
    Route::resource('teachers',TeacherController::class);
    Route::resource('schools',CompanyController::class);

    Route::resource('messages',MessageController::class);

    Route::get('setting',[HomeController::class,'setting'])->name('setting');
    Route::get('socal',[HomeController::class,'socal'])->name('socal');

    Route::post('add_general',[HomeController::class,'add_general'])->name('add_general');

    



});


Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');
