@extends('Layouts.adminLayout')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Edit Advertisement</h1>
        <form action="{{ route('advertisements.update', $advertisement->id) }}" method="POST" enctype="multipart/form-data">
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
            @method('PUT')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $advertisement->title }}" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="4" required>{{ $advertisement->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="image">Upload New Image (optional)</label>
                <input type="file" class="form-control-file" id="image" name="image" accept="image/*">
                <small class="form-text text-muted">Leave blank to keep the current image.</small>
                <img src="{{ asset('storage/' . $advertisement->image_path) }}" alt="Current Image" class="img-fluid mt-2" width="100">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('advertisements.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
