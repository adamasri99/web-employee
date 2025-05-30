<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    // Only admins can access the index page
    if (Auth::user()->role !== 'admin') {
        $employee = Employee::where('user_id', Auth::id())->first();
        if ($employee) {
            return redirect()->route('employee.show', $employee->id);
        } else {
            return redirect()->route('employee.create');
        }
    }

    $query = Employee::query();

    if ($request->has('search')) {
        $search = $request->input('search');
        $query->where(function ($q) use ($search) {
            $q->where('full_name', 'LIKE', "%$search%")
              ->orWhere('email', 'LIKE', "%$search%")
              ->orWhere('department', 'like', "%{$search}%")
              ->orWhere('address', 'like', "%{$search}%");
        });
    }

    $employees = $query->orderBy('created_at')->get();

    return view('employees.index', compact('employees'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'gender' => 'required',
            'email' => 'required|email|unique:employees,email',
            'phone_number' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'birthday' => 'nullable|date',
            'start_date' => 'nullable|date',
            'working_location' => 'nullable|string',
        ]);
    
        $employee = Employee::create([
            'full_name' => $request->full_name,
            'gender' => $request->gender,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'birthday' => $request->birthday,
            'start_date' => $request->start_date,
            'working_location' => $request->working_location,
            'user_id' => Auth::id(),
        ]);
    
        return redirect()->route('employee.show', $employee->id)->with('success', 'Employee created successfully!');
    }
    
    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
{
    // Check if user has permission to view this employee
    if (Auth::user()->role !== 'admin' && $employee->user_id !== Auth::id()) {
        $userEmployee = Employee::where('user_id', Auth::id())->first();
        if ($userEmployee) {
            return redirect()->route('employee.show', $userEmployee->id);
        } else {
            return redirect()->route('employee.create');
        }
    }
    
    return view('employees.show', compact('employee'));
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
{
    // Check if user has permission to edit this employee
    if (Auth::user()->role !== 'admin' && $employee->user_id !== Auth::id()) {
        return redirect()->route('employee.show', $employee->id)
            ->with('error', 'You do not have permission to edit this employee.');
    }
    
    return view('employees.edit', compact('employee'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'gender' => 'required|in:Male,Female',
            'email' => "required|email|unique:employees,email,{$employee->id}",
            'phone_number' => 'required|string|max:20',
            'address' => 'required|string',
            'department' => 'nullable|string|max:255',
            'birthday' => 'nullable|date',
            'start_date' => 'nullable|date',
            'working_location' => 'nullable|string',
        ]);

        $employee->update($request->only([
            'full_name',
            'gender',
            'email',
            'phone_number',
            'address',
            'department',
            'birthday',
            'start_date',
            'working_location'
        ]));

        return redirect()->route('employee.show', $employee->id)->with('success', 'Employee updated successfully.');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete(); // Soft delete
        return redirect()->route('employee.index')->with('success', 'Employee deleted successfully.');
    }
}
