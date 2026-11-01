<?php

namespace Tests\Unit;

use App\Models\Job;
use App\Models\Employer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase; // <-- Crucial: Use Laravel's TestCase instead of PHPUnit's

class JobTest extends TestCase
{
    use RefreshDatabase; // <-- Boots the database and application container

    public function test_belongs_to_an_employer(): void
    {
        $employer = Employer::factory()->create();
        
        $job = Job::factory()->create([
            'employer_id' => $employer->id,
        ]);

        $this->assertTrue($job->employer->is($employer));
    }


    public function test_can_have_tags(): void
    {
        $job = Job::factory()->create();
        $job->tag('Frontend');

        expect($job->tags)->toHaveCount(1);

        
    }
}