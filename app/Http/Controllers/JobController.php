<?php

namespace App\Http\Controllers;

use App\Mail\JobPosted;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;

class JobController extends Controller
{
    public function index()
    {
        $job = Job::with('employer')->latest()->simplePaginate(10);
  
        return view('jobs.index', [
            'jobs' => $job
        ]);

    }

    public function create(){

        return view('jobs.create');
        
    }

    public function store(){

        request()->validate([
            'title' => 'required',
            'salary' => 'required|numeric'
        ]);

        $job = Job::create([
            'title' => request('title'),
            'salary' => request('salary'),
            'employer_id' => 1

        ]);


        Mail::to ($job->employer->user)->queue(
            new JobPosted($job)
        );

        return redirect('/jobs');

    }





    public function show(Job $job){
    
        return view('jobs.show', ['job' => $job]);

    }

    public function edit(Job $job){

        $job->load('employer.user');
        return view('jobs.edit', ['job' => $job]);
    }



    public function update(Job $job){

        Gate::authorize('edit', $job);

        // validates
        request()->validate([
            'title' => 'required',
            'salary' => 'required|numeric'
        ]);

        //authorize (On..Hold)

        $job->update([
            'title' => request('title'),
            'salary' => request('salary')
        ]);

        //redirect
        return redirect('/jobs/' . $job->id);


    }

    public function destroy(Job $job){

        Gate::authorize('edit', $job);
       

        //delete the job
        $job->delete();

        //redirect
        return redirect('/jobs');


    }



}



