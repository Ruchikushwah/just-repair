<?php

namespace Database\Seeders;

use App\Models\ServiceOn;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceOnSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ServiceOn::insert([
            ['service_id' => 1, 'name' => 'Split AC Repair'],
            ['service_id' => 1, 'name' => 'Window AC Repair'],
            ['service_id' => 2, 'name' => 'LED TV Installation'],
            ['service_id' => 2, 'name' => 'LCD TV Installation'],
        ]);

    }
}
