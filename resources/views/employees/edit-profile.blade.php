@extends('layouts.app')

@section('title', 'Edit Profile')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card shadow rounded-4">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Edit Profile</h4>
            </div>
            <div class="card-body p-4">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('employee.update-profile') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="full_name" class="form-label fw-bold">Full Name</label>
                        <input type="text" id="full_name" name="full_name" class="form-control"
                               value="{{ old('full_name', $employee->full_name) }}" placeholder="Enter full name">
                    </div>

                    <div class="mb-3">
                        <label for="gender" class="form-label fw-bold">Gender</label>
                        <select id="gender" name="gender" class="form-select">
                            <option value="">-- Select Gender --</option>
                            <option value="Male" {{ old('gender', $employee->gender) == 'Male' ? 'selected' : '' }}>Male</option>
                            <option value="Female" {{ old('gender', $employee->gender) == 'Female' ? 'selected' : '' }}>Female</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label fw-bold">Email</label>
                        <input type="email" id="email" name="email" class="form-control"
                               value="{{ old('email', $employee->email) }}" placeholder="Enter email">
                    </div>

                    <div class="mb-3">
                        <label for="phone_number" class="form-label fw-bold">Phone Number</label>
                        <input type="text" id="phone_number" name="phone_number" class="form-control"
                               value="{{ old('phone_number', $employee->phone_number) }}" placeholder="Enter phone number">
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label fw-bold">Address</label>
                        <textarea id="address" name="address" class="form-control" rows="3"
                                  placeholder="Enter address">{{ old('address', $employee->address) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="birthday" class="form-label fw-bold">Birthday</label>
                        <input type="date" id="birthday" name="birthday" class="form-control"
                               value="{{ old('birthday', $employee->birthday) }}">
                    </div>

                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">Update Profile</button>
                        <a href="{{ route('employee.profile') }}" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection