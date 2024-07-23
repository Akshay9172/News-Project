<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create News</title>
    <!-- Include Summernote CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css" rel="stylesheet">
    <!-- Include Bootstrap CSS for Summernote -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    @extends('Layouts.adminLayout')
    @section('heading')
        <div>
            <h3 class="card-title"><b>Create News</b></h3>
        </div>
    @endsection
    @section('content')
        <div class="container">
            <div class="row row-cards">
                <form class="card" action="/store-news" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row row-cards">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Title</label>
                                    <input type="text" class="form-control" id="title" name="title"
                                        placeholder="Title" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">News Type</label>
                                    <select class="form-control form-select" id="news_type" name="news_type" required
                                        onchange="updateImageLabel()">
                                        <option value="">Select
                                            News Type</option>
                                        <option value="Breaking News">Breaking News</option>
                                        <option value="Normal News">Normal News</option>
                                        <option value="Video News">Video News</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Category</label>
                                    <select class="form-control form-select" id="category" name="category_id" required>
                                        {{-- @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach --}}
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label" id="imageLabel">Image</label>
                                    <input type="url" class="form-control" id="img" name="img"
                                        placeholder="Image URL" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Language</label>
                                    <select class="form-control form-select" id="language" name="language_id" required>
                                        <option value="">Select Language</option>
                                        @foreach ($languages as $language)
                                            <option value="{{ $language->id }}">{{ $language->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Description</label>
                                    <textarea id="summernote" name="description" required></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <button type="submit" class="btn btn-primary">Add News</button>
                    </div>
                </form>
                <a href="/news-list" class="btn btn-secondary mt-3">View News</a>
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
        <script>
            $(document).ready(function() {
                $('#summernote').summernote({
                    height: 300,
                    toolbar: [
                        ['style', ['style']],
                        ['font', ['bold', 'italic', 'underline', 'clear']],
                        ['fontname', ['fontname']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['table', ['table']],
                        ['insert', ['link', 'picture', 'video']],
                        ['view', ['fullscreen', 'codeview', 'help']]
                    ]
                });
            });

            function updateImageLabel() {
                var newsType = document.getElementById('news_type').value;
                var imageLabel = document.getElementById('imageLabel');
                var imgInput = document.getElementById('img');

                if (newsType === 'Video News') {
                    imageLabel.textContent = 'Video';
                    imgInput.placeholder = 'Video URL';
                } else {
                    imageLabel.textContent = 'Image';
                    imgInput.placeholder = 'Image URL';
                }
            }
        </script>
    @endsection
</body>

</html>
