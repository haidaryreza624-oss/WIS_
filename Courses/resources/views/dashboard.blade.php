<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1">

    <title>Course Dashboard</title>

    <!-- Bootstrap CSS -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>

<body class="bg-light">

<!-- Navigation bar -->
<nav class="navbar navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="{{ route('dashboard') }}">
            Course Dashboard
        </a>

        <form method="POST"
              action="{{ route('logout') }}"
              class="mb-0">

            @csrf

            <button type="submit" class="btn btn-outline-light">
                Logout
            </button>
        </form>
    </div>
</nav>

<main class="container py-4">

    <h1 class="h3 mb-2">Dashboard</h1>

    <p class="text-secondary mb-4">
        Welcome, <strong>{{ auth()->user()->name }}</strong>!
        Register a course and view your registered courses below.
    </p>

    <!-- Success message -->
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <!-- Course registration form -->
    <section class="card shadow-sm mb-4">
        <div class="card-header bg-primary text-white">
            <h2 class="h5 mb-0">Register a Course</h2>
        </div>

        <div class="card-body">
            <form method="POST"
                  action="{{ route('courses.store') }}">

                @csrf

                <div class="row g-3">

                    <!-- Course code -->
                    <div class="col-md-6">
                        <label for="course_code" class="form-label">
                            Course Code
                        </label>

                        <input
                            type="text"
                            id="course_code"
                            name="course_code"
                            class="form-control @error('course_code') is-invalid @enderror"
                            value="{{ old('course_code') }}"  
                        >

                        @error('course_code')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Course name -->
                    <div class="col-md-6">
                        <label for="course_name" class="form-label">
                            Course Name
                        </label>

                        <input
                            type="text"
                            id="course_name"
                            name="course_name"
                            class="form-control @error('course_name') is-invalid @enderror"
                            value="{{ old('course_name') }}"
                            maxlength="150"
                            required
                        >

                        @error('course_name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Credit hours -->
                    <div class="col-md-6">
                        <label for="credit_hours" class="form-label">
                            Credit Hours
                        </label>

                        <input
                            type="number"
                            id="credit_hours"
                            name="credit_hours"
                            class="form-control @error('credit_hours') is-invalid @enderror"
                            value="{{ old('credit_hours') }}"
                            required
                        >

                        @error('credit_hours')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Semester -->
                    <div class="col-md-6">
                        <label for="semester" class="form-label">
                            Semester
                        </label>

                        <select
                            id="semester"
                            name="semester"
                            class="form-select @error('semester') is-invalid @enderror"
                            required
                        >
                            <option value="">Select semester</option>

                            <option
                                value="Spring 2026"
                                @selected(old('semester') === 'Spring 2026')
                            >
                                Spring 2026
                            </option>

                            <option
                                value="Fall 2026"
                                @selected(old('semester') === 'Fall 2026')
                            >
                                Fall 2026
                            </option>
                        </select>

                        @error('semester')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Submit button -->
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">
                            Register Course
                        </button>
                    </div>

                </div>
            </form>
        </div>
    </section>

    <!-- Registered courses -->


</main>

</body>
</html>