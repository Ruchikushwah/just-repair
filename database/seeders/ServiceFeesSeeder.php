<?php

namespace Database\Seeders;

use App\Models\ServiceFees;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceFeesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ServiceFees::insert([
            // AC Repair related services
            ['service_id' => 1, 'name' => 'Basic AC Service', 'fees' => 499],
            ['service_id' => 1, 'name' => 'Gas Refill', 'fees' => 999],
            ['service_id' => 1, 'name' => 'Complete Servicing', 'fees' => 1299],
            ['service_id' => 1, 'name' => 'Installation', 'fees' => 799],
            ['service_id' => 1, 'name' => 'Uninstallation', 'fees' => 599],
            
            // TV Installation related services
            ['service_id' => 2, 'name' => 'Wall Mount Installation', 'fees' => 599],
            ['service_id' => 2, 'name' => 'TV Setup & Configuration', 'fees' => 399],
            ['service_id' => 2, 'name' => 'TV Repair', 'fees' => 699],
            ['service_id' => 2, 'name' => 'Full HD TV Service', 'fees' => 799],
            
            // Additional services for other ACs (service_id 3)
            ['service_id' => 3, 'name' => 'AC Deep Cleaning', 'fees' => 899],
            ['service_id' => 3, 'name' => 'AC Repair Visit', 'fees' => 399],
            ['service_id' => 3, 'name' => 'AC Installation', 'fees' => 1299],
            
            // Additional services for TV (service_id 4)
            ['service_id' => 4, 'name' => 'TV Stand Installation', 'fees' => 499],
            ['service_id' => 4, 'name' => 'Smart TV Setup', 'fees' => 599],
            ['service_id' => 4, 'name' => 'Home Theater Setup', 'fees' => 1299],
        ]);
    }
}
