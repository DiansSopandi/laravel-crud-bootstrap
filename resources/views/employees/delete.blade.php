@extends('layouts.app')

<div style="background: #f8f9fa; height: 50vh; display: flex; justify-content: center; align-items: center;">
    <div style="background: white; padding: 50px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
<form method="POST" action="{{ route('employees.destroy', $employee->id) }}" class="d-inline">
    @csrf
    @method('DELETE')

    <div class="mb-3">
        <label for="name" class="form-label">ID:</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $employee->id }}" readonly>
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Name:</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ $employee->name }}" readonly>
    </div>

    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this employee?')">Delete</button>
</form>
</div>
</div>

