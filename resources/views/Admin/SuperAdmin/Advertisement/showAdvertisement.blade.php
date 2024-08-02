<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Advertisement List</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .advertisement-img {
            width: 100px;
            height: 100px;
            object-fit: cover;
        }
    </style>
</head>

<body>

    @extends('Layouts.adminLayout')
    @section('heading')
        <div>
            <h3 class="card-title"><b> Advertisement List</b></h3>
        </div>
    @endsection

    @section('content')
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Advertisement</h3>
                    <a href="{{ route('advertisements.create') }}" class="btn btn-primary">Create Advertisement</a>
                </div>
                <div class="container">
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
                </div>
                <form action="{{ route('advertisements.list') }}" method="GET">
                    <div class="row card-body">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="advertisement_type">Advertisement Type</label>
                                <select name="advertisement_type" class="form-select" onchange="this.form.submit()">
                                    <option value="">All Types</option>
                                    <option value="Home Left Side"
                                        {{ request('advertisement_type') == 'Home Left Side' ? 'selected' : '' }}>
                                        Home Left Side
                                    </option>
                                    <option value="Home Right Side"
                                        {{ request('advertisement_type') == 'Home Right Side' ? 'selected' : '' }}>
                                        Home Right Side
                                    </option>
                                    <option value="Breaking News Bottom"
                                        {{ request('advertisement_type') == 'Breaking News Bottom' ? 'selected' : '' }}>
                                        Breaking News Bottom
                                    </option>
                                    <option value="Single News Page"
                                        {{ request('advertisement_type') == 'Single News Page' ? 'selected' : '' }}>
                                        Single News Page
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
                                <th>Image</th>
                                <th>Advertisement Type</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($advertisements as $key => $item)
                                <tr>
                                    <td><span class="text-muted">{{ $key + 1 }}</span></td>
                                    <td><span class="text-reset"><b>{{ Str::words($item->title, 9, '...') }}</b></span></td>
                                    <td>
                                        <div class=""><img class="advertisement-img" src="{{ $item->img }}"></div>
                                    </td>
                                    <td>{{ $item->advertisement_type }}</td>
                                    <td>{{ $item->start_date }}</td>
                                    <td>{{ $item->end_date }}</td>
                                    <td>
                                        <form action="{{ route('advertisements.delete', $item->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Are you sure you want to delete this advertisement?')">Delete</button>
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
</body>

</html>
