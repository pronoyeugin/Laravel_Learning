<?php
namespace App\Models;
use Illuminate\Support\Arr;

class Job{
    public static function all():array
    {
        return [
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
    }
    public static function find(int $id):array
    {
        $job = Arr::first(static::all(), fn($job) => $job['id'] == $id);

        if (!$job) {
            abort(404);
        }

        return $job;
    }
}       
