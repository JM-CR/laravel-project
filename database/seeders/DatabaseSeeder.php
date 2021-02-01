<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Main tables
        $totalUsers = 10;
        User::factory($totalUsers)->create();

        $totalProjects = 20;
        Project::factory($totalProjects)->create();

        // Pivot tables
        foreach (range(1,40) as $index) {
            DB::table('project_user')->insert([
                'project_id' => random_int(1, $totalProjects),
                'user_id' => random_int(1, $totalUsers)
            ]);
        }
    }
}
