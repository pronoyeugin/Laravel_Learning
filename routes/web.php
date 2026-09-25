<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/jobs', function () {
    return view('jobs',[
        'jobs' => [
            [   
                'id' => 1,
                'title' => 'Web Developer',
                'salary' => '$90,000 per year'
            ],
            [
                'id' => 2,
                'title' => 'Mobile App Developer',
                'salary' => '$80,000 per year'
            ],
            [
                'id' => 3,
                'title' => 'UI/UX Designer',
                'salary' => '$70,000 per year'
            ]
        ]
    ]);
});

Route::get('/jobs/{id}', function ($id) {
    $jobs = [
        [   
            'id' => 1,
            'title' => 'Web Developer',
            'salary' => '$90,000 per year'
        ],
        [
            'id' => 2,
            'title' => 'Mobile App Developer',
            'salary' => '$80,000 per year'
        ],
        [
            'id' => 3,
            'title' => 'UI/UX Designer',
            'salary' => '$70,000 per year'
        ]
    ];
    
    $jobs = Arr::first($jobs, fn($job) => $job['id'] == $id);


    return view('job', ['job' => $jobs]);
       
});


Route::get('/contact', function () {
    return view('contact');
});





