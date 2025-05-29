<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Public Routes
Route::get('/', [EmployeeController::class, 'index'])->name('employee.index');

// Protected Routes - require authentication
Route::middleware(['auth'])->group(function () {
    // Routes for all authenticated users
    Route::get('/employee/{employee}', [EmployeeController::class, 'show'])->name('employee.show');
    
    // Routes for regular users - can only manage their own data
    Route::middleware(['role:user'])->group(function () {
        Route::get('/profile', [EmployeeController::class, 'profile'])->name('employee.profile');
        Route::get('/profile/edit', [EmployeeController::class, 'editProfile'])->name('employee.edit-profile');
        Route::put('/profile', [EmployeeController::class, 'updateProfile'])->name('employee.update-profile');
    });
    
    // Routes for admins - can manage all employees
    Route::middleware(['role:admin'])->group(function () {
        Route::post('/employee', [EmployeeController::class, 'store'])->name('employee.store');
        Route::get('/employee/create', [EmployeeController::class, 'create'])->name('employee.create');
        Route::get('/employee/{employee}/edit', [EmployeeController::class, 'edit'])->name('employee.edit');
        Route::put('/employee/{employee}/update', [EmployeeController::class, 'update'])->name('employee.update');
        Route::delete('/employee/{employee}/destroy', [EmployeeController::class, 'destroy'])->name('employee.destroy');
    });
});