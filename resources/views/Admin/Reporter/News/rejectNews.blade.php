@extends('Layouts.adminLayout')
@section('heading')
    <div>
        <h3 class="card-title"><b> News List</b></h3>
    </div>
@endsection
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="card-title">News</h3>
                <a href="{{ route('news.create') }}" class="btn btn-primary">Create News</a>
            </div>
            <form action="{{ route('news.list') }}" method="GET">
                <div class="row card-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="language_id">Language</label>
                            <select name="language_id" class="form-select" onchange="this.form.submit()">
                                <option value="">All Languages</option>
                                @foreach ($languages as $language)
                                    <option value="{{ $language->id }}"
                                        {{ request('language_id') == $language->id ? 'selected' : '' }}>
                                        {{ $language->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="news_type">News Type</label>
                            <select name="news_type" class="form-select" onchange="this.form.submit()">
                                <option value="">All Types</option>
                                <option value="Breaking News"
                                    {{ request('news_type') == 'Breaking News' ? 'selected' : '' }}>
                                    Breaking
                                    News</option>
                                <option value="Normal News" {{ request('news_type') == 'Normal News' ? 'selected' : '' }}>
                                    Normal
                                    News
                                </option>
                                <option value="Video News" {{ request('news_type') == 'Video News' ? 'selected' : '' }}>
                                    Video
                                    News
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
            </form>
            <div class="table-responsive">
                <table class="table card-table table-vcenter text-nowrap datatable">
                    <thead>
                        <tr>
                            <th>SR.NO</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>News Type</th>
                            <th>Status</th>
                            <th>Published On</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($news as $key => $item)
                            <tr>
                                <td><span class="text-muted">{{ $key + 1 }}</span></td>
                                <td><span class="text-reset"><b>{{ Str::words($item->title, 9, '...') }}</b></span></td>
                                <td>{!! Str::limit($item->description, 50) !!}</td>
                                <td>{{ $item->news_type }}</td>
                                <td>{{ $item->status }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>
                                    <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                        data-bs-target="#viewNewsModal" data-id="{{ $item->id }}">View</button>
                                    <form action="{{ route('news.delete', $item->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Are you sure you want to delete this news?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="viewNewsModal" tabindex="-1" aria-labelledby="viewNewsModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewNewsModalLabel">News Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- News details will be loaded here dynamically using JavaScript -->
                </div>
                <div class="modal-footer">
                    <form action="{{ route('news.publish') }}" method="POST" style="display:inline;">
                        @csrf
                        <input type="hidden" name="news_id" id="publish_news_id">
                        <button type="submit" class="btn btn-success">Publish</button>
                    </form>
                    <form action="{{ route('news.reject') }}" method="POST" style="display:inline;">
                        @csrf
                        <input type="hidden" name="news_id" id="reject_news_id">
                        <button type="submit" class="btn btn-danger">Reject</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // JavaScript to handle the modal
        var viewNewsModal = document.getElementById('viewNewsModal');
        viewNewsModal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget;
            var newsId = button.getAttribute('data-id');

            // Make an AJAX request to fetch news details
            fetch(`/news/${newsId}`)
                .then(response => response.json())
                .then(data => {
                    var modalBody = viewNewsModal.querySelector('.modal-body');
                    modalBody.innerHTML = `
                        <h1>${data.title}</h1>
                        <img  src="${data.img}" alt="Image">
                        <p> ${data.description}</p>
                        <p><strong>News Type:</strong> ${data.news_type}</p>
                        <p><strong>Status:</strong> ${data.status}</p>
                        <p><strong>Published On:</strong> ${data.created_at}</p>
                    `;
                    document.getElementById('publish_news_id').value = newsId;
                    document.getElementById('reject_news_id').value = newsId;
                })
                .catch(error => console.error('Error:', error));
        });
    </script>
@endsection
