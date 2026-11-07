<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SearchController extends Controller

{

    public function __invoke()
    {

       $jobs = Job::latest()
            ->with('employer','tags')
            ->where('title','LIKE', '%' . request('q') . '%')
            ->get();

       return view ('results', ['jobs' => $jobs]);

    }



}
