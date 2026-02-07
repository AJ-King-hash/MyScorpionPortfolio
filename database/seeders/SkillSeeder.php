<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(User $user): void
    {
        $skills=[
            [
            "department"=>"Full-Stack Developer",
            "title"=>"Laravel",
            "description"=>"4 years of Experience with Laravel,Can Integrate A Laravel RESTful API Also With ReactJS Projects",
            "percent"=>"85%",
            ],
            [
            "department"=>"Full-Stack Developer",
            "title"=>"Livewire",
            "description"=>"4 years of Experience with Livewire",
            "percent"=>"95%",
            ],
            [
            "department"=>"Full-Stack Developer",
            "title"=>"FastAPI",
            "description"=>"4 years of Experience with FastAPI,Can Integrate A FastAPI RESTful API Also With ReactJS Projects",
            "percent"=>"95%",
            ],
            [
            "department"=>"Full-Stack Developer",
            "title"=>"Inertia",
            "description"=>"4 years of Experience with Inertia,Can Integrate A Full Website Using Only Inertia",
            "percent"=>"95%",
            ],


            [
            "department"=>"Data Analyser",
            "title"=>"Fuzzy Logic",
            "description"=>"3 years of Experience with Data Analysis,Making My Own Data Analysis Package And Having 4 years of Experience in Excel",
            "percent"=>"95%",
            ],
            [
            "department"=>"Data Analyser",
            "title"=>"Excel",
            "description"=>"3 years of Experience in Excel",
            "percent"=>"95%",
            ],
            [
            "department"=>"Data Analyser",
            "title"=>"PowerBI",
            "description"=>"3 years of Experience in PowerBI",
            "percent"=>"95%",
            ],
            [
            "department"=>"Data Analyser",
            "title"=>"Al-Ameen Program",
            "description"=>"1 years of Experience with Data Analysis",
            "percent"=>"95%",
            ],

            [
            "department"=>"AI Software Engineer",
            "title"=>"Python LLMs",
            "description"=>"3 years of Experience with LLMs ",
            "percent"=>"95%",
            ]];
        foreach($skills as $skill){
            $department=$user->departments()->where("title",$skill['department'])->first();
            if($department){
                $department->skills()->create([
                    "user_id"=>$user->id,
                    "title"=>$skill['title'],
                    "description"=>$skill['description'],
                    "percent"=>$skill['percent'],
                ]);
            }
        }
    }
}
