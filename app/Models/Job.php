<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\Employer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Job extends Model
{
    /** @use HasFactory<\Database\Factories\JobFactory> */
    use HasFactory;

    public function employer() : BelongsTo {
        return $this->belongsTo(Employer::class);
    }

    public function tag(string $name)  {
        $tag = Tag::firstOrCreate(["name"=>$name]);
        $this->tags()->attach($tag);
    }

    public function tags() {
        return $this->belongsToMany(Tag::class);
    }
}
