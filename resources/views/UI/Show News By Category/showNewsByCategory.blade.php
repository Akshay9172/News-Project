<!-- resources/views/UI/News/category_news.blade.php -->

@extends('Layouts.userLayout')

@section('content')
    <div class="container mt-4">
        <h1> <b>{{ $category->category_name }}</b></h1>
        @if ($newsByCategory->isEmpty())
            <p>No news available for this category.</p>
        @else
            <div class="row">
                <div class="col-md-2 p-2">
                    @foreach ($ads as $ad)
                        @if ($ad->advertisement_type == 'Home Left Side')
                            <div class="shine-effect adverrisment-img-size">
                                <img src="{{ $ad->img }}" alt="Advertisement Image">
                            </div>
                        @endif
                    @endforeach
                </div>
                <div class="col-md-10">
                    <div class="row row-equal-height p-3">
                        @foreach ($newsByCategory as $news)
                            <div class="col-md-4 col-sm-6 p-2">
                                <a href="/news/{{ $news->id }}" class="card h-100">
                                    <div class="card h-100">
                                        <div class="row g-0 h-100">
                                            <div class="col-md-6 col-sm-12">
                                                <div class="card-body">
                                                    <p>{{ $news->category->name }}</p>
                                                    <p class="card-text">{!! Str::limit($news->description, 70) !!}</p>
                                                    <p class="card-text"><small class="text-muted"><i
                                                                class="far fa-calendar-alt"></i>
                                                            {{ $news->created_at }}</small></p>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12 card-img-container">
                                                <img class="card-img-right img-fluid" src="{{ $news->img }}"
                                                    alt="Image">
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
