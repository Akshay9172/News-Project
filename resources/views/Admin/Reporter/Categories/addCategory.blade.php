<!DOCTYPE html>
<html lang="en">

<head>
    <title>Create Category</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    @extends('Layouts.adminLayout')
    @section('content')
        <div class="container mt-3">
            <h2>Category form</h2>
            <form action="/add-category" method="POST">
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                @endif
                @csrf
                <div class="mb-3 mt-3">
                    <label for="category_name">Category Name:</label>
                    <input type="text" class="form-control" id="category_name" placeholder="Enter Category Name"
                        name="category_name" value="{{ old('category_name') }}">
                    <span class="text-danger">
                        @error('category_name')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Add Category</button>
                </div>
            </form>
        </div>
    @endsection
</body>

</html>
