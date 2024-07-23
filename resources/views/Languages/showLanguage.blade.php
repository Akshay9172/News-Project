@extends('Layouts.adminLayout')

@section('heading')
    <div>
        <h3 class="card-title"><b>Languages</b></h3>
    </div>
@endsection

@section('content')
    <div class="container mt-5">
        <h1>Languages</h1>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <a href="{{ route('languages.create') }}" class="btn btn-primary mb-3">Add Language</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>SR.NO</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($languages as $key => $language)
                    <tr>
                        <td class="text-muted sr-no">{{ $key + 1 }}</td>
                        <td>{{ $language->name }}</td>
                        <td>
                            <form action="{{ route('languages.destroy', $language->id) }}" method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this language?');">
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
@endsection
