<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory;
    public function skill(){
        return $this->belongsTo(Skill::class);
    }
    public function projects(){
        return $this->morphedByMany(Project::class,"scategorical","scategories");
    }
    public function packages(){
        return $this->morphedByMany(Package::class,"scategorical","scategories");
    }
}
