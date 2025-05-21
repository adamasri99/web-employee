<!DOCTYPE html>
<html>
<head>
    <title>Zeta Client Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Titan+One&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.0/css/dataTables.dataTables.min.css">

    <style>
        .no-col {
        padding-left: 5px; /* or even 0px */
        text-align: left;
        width: 20px; /* optional: reduce column width */
        }

    </style>

</head>
<body class="bg-light">

    <div class="container py-4">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Header Section -->
        <div class="row align-items-center mb-4">
            <div class="col-2">
                <img src="{{ asset('images/logo.png') }}?v={{ time() }}" alt="Company Logo" style="max-height: 60px;">
            </div>
            <div class="col-8 text-center">
                <h1 class="text-center flex-grow-1 m-0" style="font-family: 'titan one', sans-serif; font-weight: 500;">
                    Zeta Client Dashboard
                </h1>
            </div>
            <div class="col-2"></div>
        </div>

        <!-- Actions Section -->
        <div class="row mb-3">
            <div class="col-md-6">
                <a href="{{ route('employee.create') }}" class="btn btn-primary">+ Add New Client</a>
            </div>

            <div class="col-md-6">
                <form action="{{ route('employees.index') }}" method="GET" class="d-flex">
                    <input type="text" name="search" class="form-control me-2" placeholder="Search by name, email, department...">
                    <button type="submit" class="btn btn-outline-secondary">Search</button>
                </form>
            </div>
        </div>

        <!-- Table Section -->
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="employeeTable" class="table table-striped table-hover align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th class="no-col">No.</th>
                                <th>Name</th>
                                <th>Gender</th>
                                <th>Email</th>
                                <th>Position</th>
                                <th>start date</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($employees as $employee)
                                <tr>
                                    <td class="no-col">{{ $loop->iteration }}</td>
                                    <td>{{ $employee->full_name }}</td>
                                    <td>{{ $employee->gender }}</td>
                                    <td>{{ $employee->email }}</td>
                                    <td>{{ $employee->department ?? '—' }}</td>
                                    <td>{{ $employee->start_date ?? '—' }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('employee.show', $employee->id) }}" class="btn btn-outline-info btn-sm">Show</a>
                                        <a href="{{ route('employee.edit', $employee->id) }}" class="btn btn-outline-warning btn-sm">Edit</a>
                                        <form action="{{ route('employee.destroy', $employee->id) }}" method="POST" style="display:inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger btn-sm"
                                                onclick="return confirm('Are you sure you want to delete this employee?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted">No Client found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/2.3.0/js/dataTables.min.js"></script>
    
    <script>
        $(document).ready(function () {
            $('#employeeTable').DataTable({
                searching: false // disables the default search bar
            });
        });
    </script>
</body>
</html>
