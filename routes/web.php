<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Public Routes
Route::get('/', function () {
    if (Auth::check()) {
        if (Auth::user()->role === 'admin') {
            return redirect()->route('employee.index');
        } else {
            $employee = \App\Models\Employee::where('user_id', Auth::id())->first();
            if ($employee) {
                return redirect()->route('employee.show', $employee->id);
            } else {
                return redirect()->route('employee.create');
            }
        }
    }
    return redirect()->route('login');
})->name('home');

// Admin Routes
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/employees', [EmployeeController::class, 'index'])->name('employee.index');
});

// User Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/employee/create', [EmployeeController::class, 'create'])->name('employee.create');
    Route::post('/employee', [EmployeeController::class, 'store'])->name('employee.store');
    Route::get('/employee/{employee}', [EmployeeController::class, 'show'])->name('employee.show');
    Route::get('/employee/{employee}/edit', [EmployeeController::class, 'edit'])->name('employee.edit');
    Route::put('/employee/{employee}/update', [EmployeeController::class, 'update'])->name('employee.update');
    
    // Admin-only routes
    Route::middleware(['role:admin'])->group(function () {
        Route::delete('/employee/{employee}/destroy', [EmployeeController::class, 'destroy'])->name('employee.destroy');
    });
});
