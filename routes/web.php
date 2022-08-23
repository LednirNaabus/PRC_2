<?php

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


Route::post('email-validate', [\App\Http\Controllers\EmailController::class, 'checkEmail'])->name('checkEmail');
Route::post('mobile-validate', [\App\Http\Controllers\MobileController::class, 'checkMobile'])->name('checkMobile');

Route::get('/', function () {
    return view('auth/login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', '\App\Http\Controllers\DashboardsController@dashboard')->name('dashboard');

Route::group(['middleware' => 'auth'], function () {

    Route::resource('companies', \App\Http\Controllers\Admin\CompanysController::class); 
    Route::resource('users', \App\Http\Controllers\UsersController::class);
    Route::get('users.registration', 'App\Http\Controllers\UsersController@registration')->name('users.registration');

    Route::resource('events', \App\Http\Controllers\EventsController::class);
    Route::get('events.calendar', 'App\Http\Controllers\EventsController@showCalendar')->name('events.calendar');        
    Route::resource('questions', \App\Http\Controllers\QuestionsController::class);

    Route::resource('applications', \App\Http\Controllers\ApplicationsController::class);
    Route::get('/applications/{id}/certificate', [\App\Http\Controllers\ApplicationsController::class, 'createCertificate'])->name('certificate');

    Route::resource('uploads', \App\Http\Controllers\UploadsController::class);
    
    Route::get('/users/edit/{id}', [\App\Http\Controllers\UsersController::class, 'editApprove'])->name('editApprove');
    Route::put('/users/update/{id}', [\App\Http\Controllers\UsersController::class, 'updateApprove'])->name('updateApprove');

    Route::delete('/applications/{id}', [\App\Http\Controllers\ApplicationsController::class, 'amend'])->name('amend');
    Route::delete('/applications/{id}', [\App\Http\Controllers\ApplicationsController::class, 'cancel'])->name('cancel');
    Route::get('/applications/terms', [\App\Http\Controllers\ApplicationsController::class, 'terms'])->name('terms');

    Route::resource('instructions', \App\Http\Controllers\InstructionsController::class);

    

});
