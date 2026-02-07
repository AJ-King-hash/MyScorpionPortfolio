<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    /** @use HasFactory<\Database\Factories\SkillFactory> */
    use HasFactory;
    protected $guarded=[];
    public function user(){
    return $this->belongsTo(User::class);    
    }
    public function department(){
        return $this->belongsTo(Department::class);
    }
    public function categories(){
        return $this->hasMany(Category::class);
    }
}
