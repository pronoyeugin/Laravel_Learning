<?php

namespace App\Policies;

use App\Models\Job;
use App\Models\User;
use App\Policies\JobPolicy;
use Illuminate\Auth\Access\Response;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Gate;

class JobPolicy
{

public function boot(): void
{
    Model::preventLazyLoading();
    
    // ম্যানুয়ালি Policy রেজিস্টার করুন
    Gate::policy(Job::class, JobPolicy::class);
}

    public function edit(User $user, Job $job):bool
    {   
        $job->loadMissing('employer.user');  
        return $job->employer->user->is($user);
        
    }

}
