<link href="{{ asset('css/app.css') }}" rel="stylesheet">

<div class="container mt-5">
    <h1>Add New Employee</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="/employees">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>

        <div class="mb-3">
            <label for="dob" class="form-label">Date of Birth:</label>
            <input type="date" class="form-control" id="dob" name="dob">
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status:</label>
            <select class="form-select" id="status" name="status">
                <option value="single">Single</option>
                <option value="married">Married</option>
                <option value="divorced">Divorced</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="join_date" class="form-label">Join Date:</label>
            <input type="date" class="form-control" id="join_date" name="join_date">
        </div>

        <div class="mb-3">
            <label for="experience" class="form-label">Experience (in years):</label>
            <input type="number" class="form-control" id="experience" name="experience">
        </div>

        <div class="mb-3">
            <label for="job_title" class="form-label">Job Title:</label>
            <input type="text" class="form-control" id="job_title" name="job_title">
        </div>

        <div class="mb-3">
            <label for="job_description" class="form-label">Job Description:</label>
            <textarea class="form-control" id="job_description" name="job_description"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Add New Employee</button>
        <a href="{{ url()->previous() }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
