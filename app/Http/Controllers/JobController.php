<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

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

        Job::create([
            'title' => request('title'),
            'salary' => request('salary'),
            'employer_id' => 1

        ]);

        return redirect('/jobs');


    }

    public function show(Job $job){
    
        return view('jobs.show', ['job' => $job]);


    }

    public function edit(Job $job){
        return view('jobs.edit', ['job' => $job]);
    }

    public function update(Job $job){
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
        //authorize (On..Hold)

        //delete the job
        $job->delete();

        //redirect
        return redirect('/jobs');


    }



}



