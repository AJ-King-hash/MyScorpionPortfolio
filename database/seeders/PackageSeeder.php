<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(User $user): void
    {
        $packages=[
            [
                "short_name"=>"scorpfuzzy",
                "name"=>"scorpion/scorpFuzzy",
                "icon"=>asset("storage/scorpsvgrepo1.svg"),
                "doc_path"=>"/packages/scorpion/docs/scorpfuzzy/v1.0.0/index",
                "meta_description"=>"Careful!,A Strong Scorpion Appeared From The Shadows With Full Complete Fuzzy System to analysis the desired descisions of your users in your Projects,He Has The Power of the Predicition.",
                "available"=>true,
                "command"=>"composer require scorpion/scorpfuzzy-demo:v1.0.0"      
            ],
            [
                "short_name"=>"scorpsearch",
                "name"=>"scorpion/scorpsearch",
                "icon"=>asset("storage/Treeval.svg"),
                "available"=>true,
                "doc_path"=>"/packages/scorpion/docs/scorpsearch/v1.0.0/index",
                "meta_description"=>"Oww!,Just A Cute Scorpion Want to Give You Full Complete Information Retrieval System for Simple And Faster And More Search Options In Your Projects.",
                "command"=>"composer require scorpion/scorpsearch"  
            ],
        ];
        $user->packages()->createMany($packages);
        
    }
}
