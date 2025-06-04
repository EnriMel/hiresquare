<?php

use App\Models\Job;
use App\Models\Employer;

it('belongs to an employer', function () {
    // AAA
    // Arrange
    $employer = Employer::factory()->create();
    $job = Job::factory()->create([
        'employer_id'=> $employer->id
    ]);
    
    // Act: peform some kind of action, interaction with codebase
    // In this case I group action and assertion
    expect($job->employer->is($employer))->toBeTrue();    
});

it('can have tags', function() {
    $job = Job::factory()->create();
    $job->tag('frontend');
    expect($job->tags)toHaveCount(1);
});
