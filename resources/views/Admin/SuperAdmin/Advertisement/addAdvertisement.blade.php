@extends('Layouts.adminLayout')
  @section('heading')
        <div>
            <h2 class="mb-4">Add Advertisement</h2>
        </div>
    @endsection
    @section('content')
    <div class="container">
        <div class="row row-cards">
        <form class="card" action="{{ route('advertisements.store') }}" method="POST" enctype="multipart/form-data">
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
            <div class="card-body">
                <div class="row row-cards">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <label for="image">Upload Image</label> </br>
                <input type="file" class="form-control-file" id="image" name="image" accept="image/*" required>
            </div>
        </div>
    </div>
            <div class="text-end">
            <button type="submit" class="btn btn-primary">Submit</button>
            </div> </br>
        </div>
        </form>
   </div>
@endsection
