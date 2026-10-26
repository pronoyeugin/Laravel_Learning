<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\SessionController;
use App\Jobs\TranslateJob;
use App\Models\Job;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;






Route::view('/', 'welcome')->name('home');
Route::view('/contact', 'contact')->name('contact');


Route::get('test', function(){
    
    // dispatch(function(){
    //     logger('Hello form the queue!');
    // });

    // \App\Jobs\TranslateJob::dispatch();

    $job = Job::first();
    TranslateJob::dispatch($job);

    return 'Done';

});


//Jobs
Route::get('/jobs', [JobController::class, 'index']);
Route::get('/jobs/create', [JobController::class, 'create']);
Route::post('/jobs', [JobController::class, 'store'])->middleware('auth');
Route::get('/jobs/{job}', [JobController::class, 'show']);

Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])
    ->middleware('auth')
    ->can('edit', 'job');

Route::patch('/jobs/{job}', [JobController::class, 'update'])
    ->middleware('auth');
Route::delete('/jobs/{job}', [JobController::class, 'destroy'])
    ->middleware('auth');


//Auth
Route::get('/register', [RegisterUserController::class, 'create']);
Route::post('/register', [RegisterUserController::class, 'store']);


Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);


// Route::controller(JobController::class)->group(function () {
//     Route::get('/jobs', 'index')->name('jobs.index');
//     Route::get('/jobs/create', 'create')->name('jobs.create');
//     Route::post('/jobs', 'store')->name('jobs.store');
//     Route::get('/jobs/{job}', 'show')->name('jobs.show');
//     Route::get('/jobs/{job}/edit', 'edit')->name('jobs.edit');
//     Route::patch('/jobs/{job}', 'update')->name('jobs.update');
//     Route::delete('/jobs/{job}', 'destroy')->name('jobs.destroy');
// });
