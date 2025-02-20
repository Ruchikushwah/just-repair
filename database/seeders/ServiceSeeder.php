<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Service::insert([
            ['name' => 'AC Repair', 'description' => 'Air conditioner maintenance and repair',  'status' => true],
            ['name' => 'TV Installation', 'description' => 'Wall mount and setup for televisions', 'status' => true],
            ['name' => 'AC Repair', 'description' => 'Air conditioner maintenance and repair',  'status' => true],
            ['name' => 'TV Installation', 'description' => 'Wall mount and setup for televisions', 'status' => true],
        ]);
    }
}
