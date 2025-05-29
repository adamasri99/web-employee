<?php

namespace App\Console\Commands;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Console\Command;

class AssignEmployeesToAdmin extends Command
{
    protected $signature = 'employees:assign-admin';
    protected $description = 'Assign all existing employees to the admin user';

    public function handle()
    {
        $admin = User::where('role', 'admin')->first();
        
        if (!$admin) {
            $this->error('No admin user found. Please create an admin user first.');
            return 1;
        }
        
        $count = Employee::whereNull('user_id')->update(['user_id' => $admin->id]);
        
        $this->info("Successfully assigned {$count} employees to admin user.");
        
        return 0;
    }
}