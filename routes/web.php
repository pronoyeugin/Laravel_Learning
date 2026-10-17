<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\SessionController;
use App\Models\Job;
use Illuminate\Support\Facades\Route;




Route::view('/', 'welcome')->name('home');
Route::resource('jobs', JobController::class);
Route::view('/contact', 'contact')->name('contact');

Route::get('register', [RegisterUserController::class, 'create']);
Route::post('register', [RegisterUserController::class, 'store']);
Route::get('login', [SessionController::class, 'create']); 
Route::post('login', [SessionController::class, 'store']); 



// Route::controller(JobController::class)->group(function () {
//     Route::get('/jobs', 'index')->name('jobs.index');
//     Route::get('/jobs/create', 'create')->name('jobs.create');
//     Route::post('/jobs', 'store')->name('jobs.store');
//     Route::get('/jobs/{job}', 'show')->name('jobs.show');
//     Route::get('/jobs/{job}/edit', 'edit')->name('jobs.edit');
//     Route::patch('/jobs/{job}', 'update')->name('jobs.update');
//     Route::delete('/jobs/{job}', 'destroy')->name('jobs.destroy');
// });
