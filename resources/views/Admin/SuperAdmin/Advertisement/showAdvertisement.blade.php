@extends('Layouts.adminLayout')

@section('content')
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
            </br>
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h2 class="card-title">
                    <a href="{{ route('advertisements.create') }}" class="btn btn-primary mb-3">Add Advertisement</a>
                </h2>
            </div>

        <div class="table-responsive">
            <table class="table card-table table-vcenter text-nowrap datatable">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($advertisements as $advertisement)
                    <tr>
                        <td>{{ $advertisement->title }}</td>
                        <td>{{ $advertisement->description }}</td>
                        <td><img src="{{ asset('storage/' . $advertisement->image_path) }}" alt="Image" width="100"> </td>
                        <td>
                            <a href="{{ route('advertisements.edit', $advertisement->id) }}" class="btn btn-success">Edit</a>
                            <form action="{{ route('advertisements.destroy', $advertisement->id) }}" method="POST" class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
@endsection
