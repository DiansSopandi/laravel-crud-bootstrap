@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Employees</h1>
        <div class="mb-3">
            <a href="{{ route('employees.create') }}" class="btn btn-primary">Add Employee</a>
        </div>

        <form method="GET" action="{{ route('employees.index') }}" class="mb-3">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search..." name="search">
                <button class="btn btn-outline-secondary" type="submit">Search</button>
            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-striped">

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Date of Birth</th>
                        <th>Status</th>
                        <th>Join Date</th>
                        <th>Experience</th>
                        <th>Job Title</th>
                        <th>Job Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employees as $employee)
                        <tr>
                            <td>{{ $employee->id }}</td>
                            <td>{{ $employee->name }}</td>
                            <td>{{ $employee->dob }}</td>
                            <td>{{ $employee->status }}</td>
                            <td>{{ $employee->join_date }}</td>
                            <td>
                                <ul>
                                    @foreach ($employee->employee_detail as $detail)
                                        <li>{{ $detail->experience }}</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td>
                                <ul>
                                    @foreach ($employee->employee_detail as $detail)
                                        <li>{{ $detail->job_title }}</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td>
                                <ul>
                                    @foreach ($employee->employee_detail as $detail)
                                        <li>{{ $detail->job_desc }}</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Employee Actions">
                                    <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-primary">Edit</a>
                                    <a href="{{ route('employees.delete', $employee->id) }}" class="btn btn-danger">Delete</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center">
            {{ $employees->appends(request()->input())->links() }}
        </div>
    </div>
@endsection
