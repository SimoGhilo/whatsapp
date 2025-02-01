<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>What's app - New Contact</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Add New Contact</h1>

        <form method="POST" action="{{ route('createContact')}}" enctype="multipart/form-data">
            @csrf <!-- Laravel's CSRF token for form security -->

            <!-- Name Field -->
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name"  value="{{ old('name') }}" placeholder="Enter contact name" required>
            </div>

            <!-- Email Field -->
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email"  value="{{ old('email') }}" placeholder="Enter contact email">
            </div>

            <!-- Mobile Field -->
            <div class="mb-3">
                <label for="mobile" class="form-label">Mobile</label>
                <input type="tel" class="form-control" id="mobile" name="mobile"  value="{{ old('mobile') }}" placeholder="Enter contact mobile number" required>
            </div>

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <!-- Submit Button -->
            <button type="submit" class="btn btn-success">Add Contact</button>
            <a href="{{ url()->previous() }}" class="btn btn-secondary">Go Back</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0
