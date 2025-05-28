<!DOCTYPE html>
<html>
<head>
    <title>Edit Employee</title>
    <link href="https://fonts.googleapis.com/css2?family=Cal+Sans&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        h1 {
            font-family: 'Cal Sans', sans-serif;
            font-size: 3rem;
            color: #0d6efd;
            letter-spacing: 4px
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <div class="row align-items-center mb-4">
            <div class="col-md-2 text-start">
                <img src="{{ asset('images/logo.png') }}?v={{ time() }}" alt="Company Logo" style="max-height: 80px;">
            </div>
            <div class="col-md-8 text-center">
                <h1 class="m-0 fw-bold" >Edit Employee Details</h1>
            </div>
            <div class="col-md-2"></div>
        </div>

        <div class="card shadow rounded-4 p-4">
            <form action="{{ route('employee.update', $employee->id) }}" method="POST">
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
                    <label for="email" class="form-label fw-bold fw-bold">Email</label>
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

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="birthday" class="form-label fw-bold">Birthday</label>
                        <input type="date" id="birthday" name="birthday" class="form-control"
                               value="{{ old('birthday', $employee->birthday) }}">
                    </div>
                    <div class="col-md-6">
                        <label for="start_date" class="form-label fw-bold">Start Date</label>
                        <input type="date" id="start_date" name="start_date" class="form-control"
                               value="{{ old('start_date', $employee->start_date) }}">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="department" class="form-label fw-bold">Position</label>
                    <input type="text" id="department" name="department" class="form-control"
                           value="{{ old('department', $employee->department) }}" placeholder="Enter department">
                </div>

                <div class="mb-4">
                    <label for="working_location" class="form-label fw-bold">Working Location</label>
                    <select id="working_location" name="working_location" class="form-select">
                        <option value="">--Select--</option>
                        <option value="Office" {{ old('working_location', $employee->working_location) == 'Office' ? 'selected' : '' }}>Office</option>
                        <option value="Remote" {{ old('working_location', $employee->working_location) == 'Remote' ? 'selected' : '' }}>Remote</option>
                    </select>
                </div>

                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('employee.index') }}" class="btn btn-outline-secondary">Back to Dashboard</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
