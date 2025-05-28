<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;


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

// Removed duplicate route - using employees.index as homepage

Route::get('/', [EmployeeController::class, 'index'])->name('employee.index');
Route::post('/employee', [EmployeeController::class, 'store'])->name('employee.store');
Route::get('/employee/create', [EmployeeController::class, 'create'])->name('employee.create');
Route::get('/employee/{employee}/edit', [EmployeeController::class, 'edit'])->name('employee.edit');
Route::put('/employee/{employee}/update', [EmployeeController::class, 'update'])->name('employee.update');
Route::delete('/employee/{employee}/destroy', [EmployeeController::class, 'destroy'])->name('employee.destroy');

// PUT THIS AT THE END — so it doesn't override everything else
Route::get('/employee/{employee}', [EmployeeController::class, 'show'])->name('employee.show');