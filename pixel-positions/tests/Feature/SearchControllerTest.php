<?php

use App\Models\Job;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('shows jobs whose titles match the search query', function () {
    Job::factory()->create(['title' => 'Web Developer']);
    Job::factory()->create(['title' => 'Graphic Designer']);

    $this->get('/search?q=Web')
        ->assertOk()
        ->assertSeeText('Web Developer')
        ->assertDontSeeText('Graphic Designer');
});

it('shows an empty state when no job title matches the search query', function () {
    Job::factory()->create(['title' => 'Graphic Designer']);

    $this->get('/search?q=Web')
        ->assertOk()
        ->assertSeeText('No jobs found for "Web".');
});
