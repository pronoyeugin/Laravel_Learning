<?php

use App\Http\Controllers\JobController;
use App\Models\Job;
use Illuminate\Support\Facades\Route;




Route::get('/', function () {
    return view('welcome');
});

Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index');

Route::get('/jobs/create', [JobController::class, 'create'])->name('jobs.create');


//Job page
Route::get('/jobs/create', [JobController::class, 'store'])->name('jobs.create');

//create job
Route::post('/jobs', [JobController::class, 'store'])->name('jobs.store');

//show job
Route::get('/jobs/{job}', [JobController::class, 'show'])->name('jobs.show');

    



//Edit job
Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])->name('jobs.edit');

//Update job
Route::patch('/jobs/{job}', [JobController::class, 'update'])->name('jobs.update');

//Destroy job
Route::delete('/jobs/{job}', [JobController::class, 'destroy'])->name('jobs.destroy');






//Destroy job
Route::delete('/jobs/{job}', function (Job $job) {

    
});


Route::get('/contact', function () {
    return view('contact');
});
