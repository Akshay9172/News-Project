<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bootstrap Carousel Example</title>

    <!-- Custom CSS -->

</head>

<body>
    <section class="pb-5">
        <div class="">
            <!-- News Carousel -->
            <div class="row ">
                <div class="col-12 text-start">
                    <h2>Latest News</h2>
                </div>
                <div class="col-12 text-end">
                    <a class="btn btn-primary mb-3" href="#carouselExampleIndicators" role="button"
                        data-bs-slide="prev">
                        <i class="fa fa-arrow-left"></i>
                    </a>
                    <a class="btn btn-primary mb-3" href="#carouselExampleIndicators" role="button"
                        data-bs-slide="next">
                        <i class="fa fa-arrow-right"></i>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner latest-news-carousel-inner">
                            @php
                                $chunkedNews = $recentNews->chunk(3);
                            @endphp
                            @foreach ($chunkedNews as $key => $chunk)
                                <div class="carousel-item latest-news-carousel-item {{ $key === 0 ? 'active' : '' }}">
                                    <div class="row mt-4">
                                        @foreach ($chunk as $single_news)
                                            <div class="col-md-4 mb-3">
                                                <a href="/news/{{ $single_news->id }}"
                                                    class="latest-news-card latest-news-card-height">
                                                    <div class="col-12 latest-news-card-img-container">
                                                        <img src="{{ $single_news->img ?? 'default-image.jpg' }}"
                                                            alt="{{ $single_news->title }}">
                                                    </div>
                                                    <div class="col-12 latest-news-card-body">
                                                        <h5 class="latest-news-card-title">
                                                            {{ Str::words($single_news->title, 10, '...') }}
                                                        </h5>
                                                        <p class="latest-news-card-text">{!! Str::limit($single_news->description, 70) !!}</p>
                                                        <p class="latest-news-card-text">
                                                            <small class="text-muted">
                                                                <i class="far fa-calendar-alt"></i>
                                                                {{ $single_news->created_at->format('Y-m-d') }}
                                                            </small>
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

</body>

</html>
