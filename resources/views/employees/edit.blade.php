@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Employee</h1>
        <form method="POST" action="{{ route('employees.update', $employee->id) }}">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $employee->name }}">
            </div>

            <div class="mb-3">
                <label for="dob" class="form-label">Date of Birth:</label>
                <input type="text" class="form-control" id="dob" name="dob" value="{{ $employee->dob }}">
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status:</label>
                <input type="text" class="form-control" id="status" name="status" value="{{ $employee->status }}">
            </div>

            <div class="mb-3">
                <label for="joinDate" class="form-label">Join Date:</label>
                <input type="text" class="form-control" id="joinDate" name="joinDate" value="{{ $employee->join_date }}">
            </div>

            <div class="mb-3">
                <label for="experience" class="form-label">Experience:</label>
                <input type="text" class="form-control" id="experience" name="experience" value="{{ $employee_detail->experience }}">
            </div>

            <div class="mb-3">
                <label for="jobTitle" class="form-label">Job Title:</label>
                <input type="text" class="form-control" id="jobTitle" name="jobTitle" value="{{ $employee_detail->job_title }}">
            </div>

            <div class="mb-3">
                <label for="jobDesc" class="form-label">Job Description:</label>
                <input type="text" class="form-control" id="jobDesc" name="jobDesc" value="{{ $employee_detail->job_desc }}">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ url()->previous() }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
