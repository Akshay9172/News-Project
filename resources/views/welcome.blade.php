@extends('Layouts.userLayout')
@section('content')
    <div class="container">
        @include('UI.BreakingNews.breakingNews')
        <div class="row mt-3">
            <div class="col-md-3">
                <img width="100%" src="https://templates.envytheme.com/sinmun/default/assets/img/2-ads.png">
                </img>
            </div>
            <div class="col-md-9">
                @include('UI.LeatestNews.leatestNews')
            </div>
        </div>
        {{-- @include('news.old_news.oldNews') --}}
    </div>
    <section class="pb-5">
        <div class="container">
            <!-- News Carousel -->
            <div class="row">
                <div class="col-12 text-start">
                    <h2>Latest News</h2>
                </div>
                <div class="col-12 text-end">
                    <a class="btn btn-primary mb-3" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
                        <i class="fa fa-arrow-left"></i>
                    </a>
                    <a class="btn btn-primary mb-3" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
                        <i class="fa fa-arrow-right"></i>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @php
                                $recentNews = $leatestNews->sortByDesc('created_at')->take(6); // Get the latest 6 news items
                                $chunkedNews = $recentNews->chunk(3);
                            @endphp
                            @foreach ($chunkedNews as $key => $chunk)
                                <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                                    <div class="row mt-4">
                                        @foreach ($chunk as $single_news)
                                            <div class="col-md-4 mb-3">
                                                <a href="/news/{{ $single_news->id }}" class="card h-100">
                                                    <img class="card-img-top"
                                                        src="{{ $single_news->img ?? 'default-image.jpg' }}"
                                                        alt="News Image">
                                                    <div class="p-2">
                                                        <h5><b>{{ Str::words($single_news->title, 5, '...') }}</b></h5>
                                                        <p class="card-text">{!! Str::limit($single_news->description, 70) !!}</p>
                                                        <p class="card-text"><small class="text-muted"><i
                                                                    class="far fa-calendar-alt"></i>
                                                                {{ $single_news->created_at->format('Y-m-d') }}</small>
                                                        </p>
                                                    </div>
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
