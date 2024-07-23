@extends('Layouts.adminLayout')

@section('heading')
    <div>
        <h3 class="card-title"><b>Add Language</b>
        </h3>
    </div>
@endsection
@section('content')
    <div class="row card-body">
        <form action="{{ route('languages.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Language Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Language" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Language</button>
        </form>
    </div>
@endsection
