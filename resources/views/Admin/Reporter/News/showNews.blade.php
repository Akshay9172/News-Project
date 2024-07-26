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
                                    <a href="{{ route('news.edit', $item->id) }}" class="btn btn-info">Edit</a>
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
@endsection
