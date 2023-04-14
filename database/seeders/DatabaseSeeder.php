<?php

namespace Database\Seeders;

use App\Models\Education;
use App\Models\User;
use App\Models\Project;
use App\Models\Skill;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        User::truncate();
        Project::truncate();
        Skill::truncate();
        Education::truncate();
        
        User::factory()->count(2)->create();
        Project::factory()->count(4)->create();
        Skill::factory()->count(5)->create()->each(function($skill){
            $projects = Project::all()->random(rand(1,2) )->pluck('id');
            $skill->projects()->attach($projects);
        });
        Education::factory()->count(2)->create();
    }
}
