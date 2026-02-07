<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         
        $categories=[
            [
            "skill"=>"FastAPI",
            "title"=>"Python",
            ],
            
            [
            "skill"=>"FastAPI",
            "title"=>"MySQL",
            ],

            
            [
            "skill"=>"Laravel",
            "title"=>"RestFULL API",
            ],
            [
            "skill"=>"Laravel",
            "title"=>"PHP",
            ],
            [
            "skill"=>"Laravel",
            "title"=>"JavaScript",
            ],
            [
            "skill"=>"Laravel",
            "title"=>"MySQL",
            ],
            [
            "skill"=>"Laravel",
            "title"=>"tailwindcss",
            ],


            [
            "skill"=>"Livewire",
            "title"=>"Alpine.js",
            ],
            [
            "skill"=>"Livewire",
            "title"=>"tailwindcss",
            ],
            

            [
            "skill"=>"Inertia",
            "title"=>"React.js",
            ],
            [
            "skill"=>"Inertia",
            "title"=>"Laravel Wayfinder",
            ],
            [
            "skill"=>"Inertia",
            "title"=>"tailwindcss",
            ],


            [
            "skill"=>"Fuzzy Logic",
            "title"=>"PHP",
            ],
            [
            "skill"=>"Fuzzy Logic",
            "title"=>"Design Patterns",
            ],
            [
            "skill"=>"Fuzzy Logic",
            "title"=>"ML Algorithms",
            ],

            [
            "skill"=>"Python LLMs",
            "title"=>"Python",
            ],
            [
            "skill"=>"Python LLMs",
            "title"=>"OpenCV",
            ],
            [
            "skill"=>"Python LLMs",
            "title"=>"Matplotlib",
            ],
            [
            "skill"=>"Python LLMs",
            "title"=>"Numpy",
            ],
            [
            "skill"=>"Python LLMs",
            "title"=>"Pandas",
            ],
        ];
        foreach($categories as $category){
            $skill=Skill::where("title",$category['skill'])->first();
            if($skill){
                $skill->categories()->create([
                    "title"=>$category['title']
                ]);
            }
        }

    }
}
