<?php

namespace Database\Seeders;

use App\Models\Requirement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RequirementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Requirement::insert([
            ['service_id' => 1, 'service_on_id' => 1, 'requirement' => 'Gas refill required'],
            ['service_id' => 1, 'service_on_id' => 2, 'requirement' => 'Remote not working'],
            ['service_id' => 2, 'service_on_id' => 3, 'requirement' => 'Wall mounting kit required'],
            ['service_id' => 2, 'service_on_id' => 4, 'requirement' => 'Power cable missing'],
        ]);
    }
}
