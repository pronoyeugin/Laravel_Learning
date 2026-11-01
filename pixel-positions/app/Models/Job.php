<?php

namespace App\Models;

use App\Models\Employer;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Job extends Model
{
    /** @use HasFactory<\Database\Factories\JobFactory> */
    use HasFactory;

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }

    public function tag(string $Name)
    {
        $tag = Tag::firstOrCreate(['name' => $Name]);

        $this->tags()->attach($tag);

    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
       
    }


}



