<?php

namespace Database\Seeders;

use App\Models\Skill;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $user=User::firstOrCreate(
        ['email' => 'Admin@example.com'],
        [
            'name' => 'Admin',
            'password' => 'password',
            'email_verified_at' => now(),
        ]);
        $this->callWith([
            DepartmentSeeder::class,
            SkillSeeder::class,
            CategorySeeder::class,
            PackageSeeder::class,
            ProjectSeeder::class
        ],[
            "user"=>$user
        ]);
                       
    }
}
