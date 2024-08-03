@extends('Layouts.userLayout')

@section('content')
    <div class="container">
        <div class="row row-equal-height p-3">
            @foreach ($news as $single_news)
                <div class="col-md-4 col-sm-6 mt-3">
                    <a href="/news/{{ $single_news->id }}" class="card h-100">
                        <div class="card h-100">
                            <div class="row g-0 h-100">
                                <div class="col-md-6 col-sm-12">
                                    <div class="card-body">
                                        <p>{{ $single_news->category->name }}</p>
                                        <p class="card-text">{!! Str::limit($single_news->description, 70) !!}</p>
                                        <p class="card-text"><small class="text-muted"><i class="far fa-calendar-alt"></i>
                                                {{ $single_news->created_at }}</small></p>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 card-img-container">
                                    <img class="card-img-right img-fluid" src="{{ $single_news->img }}" alt="Image">
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
