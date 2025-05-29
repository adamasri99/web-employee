<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    protected $model = Employee::class;

    public function definition(): array
    {
        $gender = $this->faker->randomElement(['Male', 'Female']);
        $department = $this->faker->randomElement(['IT', 'HR', 'Marketing', 'Finance', 'Operations', 'Sales', 'Customer Support', 'Research', 'Development', 'Legal']);
        $workingLocation = $this->faker->randomElement(['Office', 'Remote']);
        
        // Generate a birthday between 20 and 60 years ago
        $birthday = $this->faker->dateTimeBetween('-60 years', '-20 years')->format('Y-m-d');
        
        // Generate a start date between 10 years ago and today
        $startDate = $this->faker->dateTimeBetween('-10 years', 'now')->format('Y-m-d');

        return [
            'full_name' => $this->faker->name($gender),
            'gender' => $gender,
            'email' => $this->faker->unique()->safeEmail(),
            'phone_number' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
            'department' => $department,
            'birthday' => $birthday,
            'start_date' => $startDate,
            'working_location' => $workingLocation,
        ];
    }
}