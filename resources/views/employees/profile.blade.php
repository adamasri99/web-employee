@extends('layouts.app')

@section('title', 'My Profile')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">My Profile</h4>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <p><strong>Full Name:</strong> {{ $employee->full_name }}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Gender:</strong> {{ $employee->gender }}</p>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <p><strong>Email:</strong> {{ $employee->email }}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Phone Number:</strong> {{ $employee->phone_number }}</p>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <p><strong>Address:</strong> {{ $employee->address }}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Birthday:</strong> {{ $employee->birthday ? \Carbon\Carbon::parse($employee->birthday)->format('d M Y') : '—' }}</p>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <p><strong>Department:</strong> {{ $employee->department ?? 'No department yet' }}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Age:</strong> {{ $employee->age ?? '—' }}</p>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <p><strong>Working Location:</strong> {{ $employee->working_location ?? '—' }}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Start Date:</strong> {{ $employee->start_date ? \Carbon\Carbon::parse($employee->start_date)->format('d M Y') : '—' }}</p>
                    </div>
                </div>

                <a href="{{ route('employee.edit-profile') }}" class="btn btn-primary">Edit Profile</a>
            </div>
        </div>
    </div>
</div>
@endsection