<?php

use App\Events\Message;
use App\Http\Controllers\AboutpageController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\FteureController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HowItWorkController;
use App\Http\Controllers\MeetController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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
})->name('home');
Route::get('googlemeet',[MeetController::class,'createMeeting'])->name('google_meet');
Route::post('company_register', [UserController::class, 'company_register'])->name('company_register');
Route::post('login_user', [UserController::class, 'login_user'])->name('login_user');
Route::post('forget_user', [UserController::class, 'forget_user'])->name('forget_user');


Route::post('teacher_register', [UserController::class, 'teacher_register'])->name('teacher_register');
Route::get('teachers', [HomeController::class, 'teachers'])->name('teachers');
Route::get('jobs', [HomeController::class, 'jobs'])->name('jobs');
Route::get('job/{id}', [HomeController::class, 'job'])->name('job');

Route::post('contact_us', [MessageController::class, 'contact_us'])->name('contact_us');
Route::get('pay_user_new', [UserController::class, 'pay_user_new'])->name('pay_user');

Route::post('add_request_job', [HomeController::class, 'add_request_job'])->name('add_request_job');

Route::get('/chat/{techer_id}',[ChatController::class,'chat_user'])->name('chat_user');
Route::get('end_chat',[ChatController::class,'end_chat'])->name('end_chat');
Route::get('success_chat',[ChatController::class,'success_chat'])->name('success_chat');
Route::get('teachersjob/{id}',[HomeController::class,'teachersjob'])->name('teachersjob');

Route::get('start_chat',[ChatController::class,'start_chat'])->name('start_chat');


Route::get('send-message',[ChatController::class,'send_message'])->name('send_message');
Route::get('success_paid',[HomeController::class, 'success_paid'])->name('success_paid');
Route::get('canceld_paid',[HomeController::class, 'canceld_paid'])->name('canceld_paid');




// Route::middleware('auth')->group(function () {
//     Route::get('/chat', [ChatController::class, 'index'])->name('chat');
//     Route::post('/send-message', [ChatController::class, 'sendMessage'])->name('send-message');
// });

Route::get('dashboard', [UserController::class, 'dashboard'])->name('dashboard');
Route::get('edit_profile', function () {
    return view('layouts.backend');
})->name('edit_profile');


Route::get('logout_for_user', [UserController::class, 'logout_user'])->name('logout_user');
Route::get('pay_user', [HomeController::class, 'pay_user'])->name('payment-verify');

Route::post('send_job_request', [HomeController::class, 'send_job_request'])->name('send_job_request');


Route::put('teacher_update', [UserController::class, 'teacher_update'])->name('teacher_update');

Route::put('company_update', [UserController::class, 'company_update'])->name('company_update');

Route::group(['middleware' => ['auth:company', 'auth:web', 'auth:teacher']], function () {
});
Route::group(['middleware' => ['auth'], 'prefix' => 'dashboard'], function () {
    Route::resource('sliders', SliderController::class);
    Route::resource('how_it_works', HowItWorkController::class);
    Route::post('updateOrder', [HowItWorkController::class, 'updateOrder'])->name('menu_update');
    Route::get('update_status', [SliderController::class, 'update_status'])->name('sliders.update.status');
    Route::get('aboutpage', [AboutpageController::class, 'index'])->name('aboutpage.index');
    Route::post('aboutpage_edit', [AboutpageController::class, 'update'])->name('aboutpage.update');
    Route::resource('fteures', FteureController::class);
    Route::resource('services', ServiceController::class);
    Route::resource('teachers', TeacherController::class);
    Route::resource('schools', CompanyController::class);

    Route::resource('messages', MessageController::class);

    Route::get('setting', [HomeController::class, 'setting'])->name('setting');
    Route::get('socal', [HomeController::class, 'socal'])->name('socal');

    Route::post('add_general', [HomeController::class, 'add_general'])->name('add_general');
});


Auth::routes();
// Route::get('/home', [HomeController::class, 'index'])->name('home');
