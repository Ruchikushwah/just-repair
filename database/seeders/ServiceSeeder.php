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
            ['name' => 'AC Repair', 'description' => 'Air conditioner maintenance and repair', 'service_fee' => 500, 'status' => true],
            ['name' => 'TV Installation', 'description' => 'Wall mount and setup for televisions', 'service_fee' => 300, 'status' => true],
        ]);
    }
}
