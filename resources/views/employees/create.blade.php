<!DOCTYPE html>
<html>
<head>
    <title>Create New Employee</title>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        h1 {
            font-family: 'Bebas Neue', sans-serif;
            font-size: 3rem;
            color: #0d6efd;
            letter-spacing: 1px;
        }
        .form-container {
            max-width: 700px;
            margin: 50px auto;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        .form-label {
            font-weight: 600;
        }
    </style>
</head>
<body>
    <div class="container form-container">
        <h1 class="text-center mb-4">Create New Client</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('employee.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="full_name" class="form-label">Full Name</label>
                <input type="text" id="full_name" name="full_name" class="form-control" value="{{ old('full_name') }}" placeholder="Enter full name">
            </div>

            <div class="mb-3">
                <label for="gender" class="form-label">Gender</label>
                <select id="gender" name="gender" class="form-select">
                    <option value="">-- Select Gender --</option>
                    <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                    <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="Enter email">
            </div>

            <div class="mb-3">
                <label for="phone_number" class="form-label">Phone Number</label>
                <input type="text" id="phone_number" name="phone_number" class="form-control" value="{{ old('phone_number') }}" placeholder="Enter phone number">
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <textarea id="address" name="address" class="form-control" rows="3" placeholder="Enter address">{{ old('address') }}</textarea>
            </div>

            <div class="row mb-3">
                <!-- Birthday -->
                <div class="col-md-6">
                    <label for="birthday" class="form-label">Birthday</label>
                    <input type="date" id="birthday" name="birthday" class="form-control" value="{{ old('birthday', $employee->birthday ?? '') }}">
                </div>
            
                <!-- Start Date -->
                <div class="col-md-6">
                    <label for="start_date" class="form-label">Start Date</label>
                    <input type="date" id="start_date" name="start_date" class="form-control" value="{{ old('start_date', $employee->start_date ?? '') }}">
                </div>
            </div>

            <div class="mb-3">
                <label for="working_location" class="form-label fw-bold">Working Location</label>
                <select id="working_location" name="working_location" class="form-select">
                    <option value="">-- Select Working Location --</option>
                    <option value="Office" {{ old('working_location', $employee->working_location ?? '') == 'Office' ? 'selected' : '' }}>Office</option>
                    <option value="Remote" {{ old('working_location', $employee->working_location ?? '') == 'Remote' ? 'selected' : '' }}>Remote</option>
                </select>
            </div>
            



            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('employee.index') }}" class="btn btn-outline-danger">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>
