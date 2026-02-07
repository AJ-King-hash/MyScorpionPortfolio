<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    /** @use HasFactory<\Database\Factories\PackageFactory> */
    use HasFactory;
    protected $guarded=[];
    
    protected function likes(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->users()->count(), 
        );
    }
    protected $appends=["likes"];
    
    public function user(){
    return $this->belongsTo(User::class);
    }
    public function users(){
    return $this->morphToMany(User::class,"likeable","likes");
    }
    public function categories(){
        return $this->morphToMany(Category::class,"scategorical","scategories");
    }
    

}
