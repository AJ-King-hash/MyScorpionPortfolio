<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(User $user): void
    {
        $deps=[["title"=>"Full-Stack Developer"],["title"=>"Data Analyser"],["title"=>"AI Software Engineer"]];
        $user->departments()->createMany($deps);
    
    }
}
