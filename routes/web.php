<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;




Route::get('/', function () {
    return view('welcome');
});

Route::get('/jobs', function ()  {
    $job = Job::with('employer')->latest()->simplePaginate(10);

    return view('jobs.index',[
        'jobs' => $job
    ]);
});

Route :: get('/jobs/create', function() {
    return view('jobs.create');

});
    

Route::get('/jobs/{id}', function ($id) {
    
    $job = Job::find($id);
    return view('jobs.show', ['job' => $job]);
       
});

Route::post('/jobs', function () {

    request()->validate([
        'title' => 'required',
        'salary' => 'required|numeric'
    ]);

    Job:: create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 1

    ]);

    return redirect('/jobs');

});



Route::get('/contact', function () {
    return view('contact');
});
