<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Details</title>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .card {
            border-radius: 1rem;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        .title-bar {
            background-color: #214a88;
            color: white;
            font-family: 'Bebas Neue', sans-serif;
            letter-spacing: 2px;
            border-top-left-radius: 1rem;
            border-top-right-radius: 1rem;
            padding: 1rem 2rem;
        }

        h1 {
            color: rgb(0, 0, 0);
            font-family: 'Bebas Neue', sans-serif;
            font-size: 2.8rem;
            font-weight: 600;
            letter-spacing: 4px;
            border-top-left-radius: 1rem;
            border-top-right-radius: 1rem;
            padding: 1rem 2rem;
        }
    </style>
</head>

<body>
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <!-- Logo -->
            <div class="d-flex align-items-center">
                <img src="{{ asset('images/logo.png') }}?v={{ time() }}" alt="Company Logo"
                    style="max-height: 80px;">
            </div>

            <!-- Title -->
            <h1 class="text-center flex-grow-1 m-0">
                Employee Details
            </h1>


            <!-- Back Button -->
            @if (auth()->user()->role === 'admin')
                <a href="{{ route('employee.index') }}" class="btn btn-outline-secondary">Back to Dashboard</a>
            @else
                <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                    @csrf
                    <button type="submit" class="btn btn-danger">Logout</button>
                </form>
            @endif
        </div>

        <div class="card">
            <div class="title-bar">
                <h4 class="mb-0">Personal Information</h4>
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
                        <p><strong>Birthday:</strong>
                            {{ $employee->birthday ? \Carbon\Carbon::parse($employee->birthday)->format('d M Y') : '—' }}
                        </p>
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
                        <p><strong>Start Date:</strong>
                            {{ $employee->start_date ? \Carbon\Carbon::parse($employee->start_date)->format('d M Y') : '—' }}
                        </p>
                    </div>
                </div>

                <a href="{{ route('employee.edit', $employee->id) }}" class="btn btn-primary">Edit Information</a>
            </div>
        </div>
    </div>
</body>

</html>
