<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;




Route::get('/', function () {
    return view('welcome');
});

Route::get('/jobs', function () {
    $job = Job::with('employer')->latest()->simplePaginate(10);

    return view('jobs.index', [
        'jobs' => $job
    ]);
});

//Job page
Route::get('/jobs/create', function () {
    return view('jobs.create');
});

//create job
Route::post('/jobs', function () {
    request()->validate([
        'title' => 'required',
        'salary' => 'required|numeric'
    ]);

    Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 1

    ]);

    return redirect('/jobs');
});

//show job
Route::get('/jobs/{id}', function ($id) {

    $job = Job::find($id);
    return view('jobs.show', ['job' => $job]);
});

//Edit job
Route::get('/jobs/{id}/edit', function ($id) {
    $job = Job::find($id);
    return view('jobs.edit', ['job' => $job]);
});

//Update job
Route::patch('/jobs/{id}', function ($id) {
    // validates
    request()->validate([
        'title' => 'required',
        'salary' => 'required|numeric'
    ]);

    //authorize (On..Hold)

    //Update the job
    $job = Job::findOrFail($id);

    $job->update([
        'title' => request('title'),
        'salary' => request('salary')
    ]);

    //redirect
    return redirect('/jobs/' . $job->id);
});


//Destroy job
Route::delete('/jobs/{id}', function ($id) {

    //authorize (On..Hold)

    //delete the job
    Job::findOrFail($id)->delete();

    //redirect
    return redirect('/jobs');
});


Route::get('/contact', function () {
    return view('contact');
});
