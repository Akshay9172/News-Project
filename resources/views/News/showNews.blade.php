@extends('layouts.AdminLayouts')

@section('content')
    <div class="col-12">
        <form action="{{ route('news.index') }}" method="GET">
            <select name="language_id" class="form-select" onchange="this.form.submit()">
                <option value="">All News</option>
                @foreach ($languages as $language)
                    <option value="{{ $language->id }}" {{ request('language_id') == $language->id ? 'selected' : '' }}>
                        {{ $language->name }}
                    </option>
                @endforeach
            </select>
        </form>
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="card-title">News</h3>
                <a href="{{ route('news.create') }}" class="btn btn-primary">Create News</a>
            </div>

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
                        {{-- @foreach ($news as $key => $item)
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
                        @endforeach --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
