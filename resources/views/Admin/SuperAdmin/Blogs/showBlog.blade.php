<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog List</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
@extends('Layouts.adminLayout')

@section('heading')
    <div class="ml-4">
        <h3 class="card-title"><b>Blog List</b></h3>
    </div>
@endsection
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="card-title">Blogs</h3>
                <a href="/add-blog" class="btn btn-primary">Create Blog</a>
            </div>
            <form action="/show-blog" method="GET">
                <div class="row card-body">
                    <!-- Add filters or search options here if needed -->
                </div>
            </form>
            <div class="table-responsive">
                <table class="table card-table table-vcenter text-nowrap datatable">
                    <thead>
                        <tr>
                            <th>SR.NO</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Published On</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($blogs as $key => $item)
                            <tr>
                                <td><span class="text-muted">{{ $key + 1 }}</span></td>
                                <td><span class="text-reset"><b>{{ Str::words($item->title, 9, '...') }}</b></span></td>
                                <td>{!! Str::limit($item->description, 50) !!}</td>
                                <td><img src="{{ $item->img }}" alt="{{ $item->title }}" style="max-width: 100px;"></td>
                                <td>{{ $item->created_at->format('d M Y') }}</td>
                                <td>
                                    <a href="{{ route('blog.edit', $item->id) }}" class="btn btn-info">Edit</a>
                                    <a href="/delete-blog/{{ $item->id }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this blog?')">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- View Blog Modal -->
    {{-- <div class="modal fade" id="viewBlogModal" tabindex="-1" role="dialog" aria-labelledby="viewBlogModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewBlogModalLabel">Blog Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="image-wrapper" style="height: 50%; width: 100%; overflow: hidden;">
                        <img id="blogImg" style="height: 100%; width: 100%; object-fit: cover; object-position: center;">
                    </div>
                    <h1 id="blogTitle" class="heading-text text-2xl"
                        style="text-decoration: underline; font-size: 1rem; line-height: 1.5; margin-top: 0.625rem;">
                    </h1>
                    <p id="blogDescription" class="para-text"
                        style="font-size: 0.75rem; font-weight: 400; line-height: 1.8;"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div> --}}
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('#viewBlogModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var title = button.data('title');
            var description = button.data('description');
            var img = button.data('img');

            var modal = $(this);
            modal.find('.modal-title').text(title);
            modal.find('#blogDescription').html(description);
            modal.find('#blogImg').attr('src', img);
            modal.find('#blogTitle').text(title);
        });
    });
</script>
@endsection

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
