<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Advertisement</title>
    <!-- Include Summernote CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css" rel="stylesheet">
    <!-- Include Bootstrap CSS for Summernote -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    @extends('Layouts.adminLayout')
    @section('heading')
        <div>
            <h3 class="card-title"><b>Create Advertisement</b></h3>
        </div>
    @endsection
    @section('content')
        <div class="">
            @if (session('success'))
                <div>
                    {{ session('success') }}
                    <br>
                    <img src="{{ session('url') }}" alt="Uploaded Image">
                    <br>
                    <a href="{{ session('url') }}" target="_blank">{{ session('url') }}</a>
                </div>
            @endif

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
            <div class="row row-cards">
                <form class="card" action="{{ route('advertisements.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row row-cards">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Title</label>
                                    <input type="text" class="form-control" id="title" name="title"
                                        placeholder="Title">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="mb-3">
                                    <label class="form-label">Advertisement Type</label>
                                    <select class="form-control form-select" id="advertisement_type"
                                        name="advertisement_type" required>
                                        <option value="">Select
                                            Advertisement Type</option>
                                        <option value="Home Left Side">Home Left Side</option>
                                        <option value="Home Right Side">Home Right Side</option>
                                        <option value="Breaking News Bottom">Breaking News Bottom</option>
                                        <option value="Single News Page">Single News Page</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="mb-3">
                                    <label class="form-label" id="imageLabel">Image</label>
                                    <input type="url" class="form-control" id="img" name="img"
                                        placeholder="Image URL" required>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="mb-3">
                                    <label class="form-label">Start Date</label>
                                    <input type="date" class="form-control" id="start_date" name="start_date"
                                        placeholder="Enter Start Date">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="mb-3">
                                    <label class="form-label">End Date</label>
                                    <input type="date" class="form-control" id="end_date" name="end_date"
                                        placeholder="Enter End Date">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <button type="submit" class="btn btn-primary">Add Advertisement</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Include jQuery -->
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <!-- Include Popper.js -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <!-- Include Bootstrap JS for Summernote -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <!-- Include Summernote JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>
    @endsection
</body>

</html>
