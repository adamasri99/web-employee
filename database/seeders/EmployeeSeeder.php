<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Employee::create([
            'full_name' => 'John Doe',
            'gender' => 'Male',
            'email' => 'john.doe@example.com',
            'phone_number' => '123-456-7890',
            'address' => '123 Main Street, City',
            'department' => 'IT',
            'birthday' => Carbon::parse('1990-01-15'),
            'start_date' => Carbon::parse('2022-03-01'),
            'working_location' => 'Headquarters'
        ]);

        Employee::create([
            'full_name' => 'Jane Smith',
            'gender' => 'Female',
            'email' => 'jane.smith@example.com',
            'phone_number' => '987-654-3210',
            'address' => '456 Oak Avenue, Town',
            'department' => 'HR',
            'birthday' => Carbon::parse('1988-07-22'),
            'start_date' => Carbon::parse('2021-11-15'),
            'working_location' => 'Branch Office'
        ]);

        Employee::create([
            'full_name' => 'Michael Johnson',
            'gender' => 'Male',
            'email' => 'michael.j@example.com',
            'phone_number' => '555-123-4567',
            'address' => '789 Pine Road, Village',
            'department' => 'Marketing',
            'birthday' => Carbon::parse('1992-04-10'),
            'start_date' => Carbon::parse('2023-01-10'),
            'working_location' => 'Remote'
        ]);
    }
}
