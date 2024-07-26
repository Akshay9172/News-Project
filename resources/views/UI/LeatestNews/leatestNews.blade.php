<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bootstrap Carousel Example</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        .latest-news-carousel-item {
            display: flex;
            align-items: center;
        }

        .latest-news-card-img-top {
            width: 100%;
            height: 180px;
            /* Fixed height for images */
            object-fit: cover;
            object-position: center;
        }

        .latest-news-card {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            text-decoration: none;
            color: inherit;
            height: 100%;
        }

        .latest-news-card-body {
            flex: 1;
        }

        .latest-news-card-title {
            margin-top: 1rem;
            font-size: 1.1rem;
            font-weight: bold;
        }

        .latest-news-card-text {
            font-size: 0.9rem;
        }

        /* Responsive adjustments */
        @media (max-width: 767px) {
            .latest-news-carousel-inner .latest-news-carousel-item {
                flex-direction: column;
            }

            .latest-news-carousel-inner .col-md-4 {
                max-width: 100%;
                flex: 0 0 100%;
            }
        }

        .latest-news-carousel-indicators-dot button {
            background-color: #000;
        }

        .latest-news-card-height {
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .latest-news-card-img-container {
            overflow: hidden;
        }

        .latest-news-card-img-container {
            overflow: hidden;
            position: relative;
            /* Add this to position the shine effect relative to the container */
        }

        .latest-news-card-img-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
            display: block;
            /* Ensures that the image does not add extra space */
        }

        .latest-news-card-img-container::after {
            content: "";
            position: absolute;
            top: -50%;
            left: -60%;
            width: 20%;
            height: 200%;
            opacity: 0;
            transform: rotate(30deg);
            background: rgba(255, 255, 255, 0.13);
            background: linear-gradient(to right,
                    rgba(255, 255, 255, 0.13) 0%,
                    rgba(255, 255, 255, 0.13) 77%,
                    rgba(255, 255, 255, 0.5) 92%,
                    rgba(255, 255, 255, 0.0) 100%);
            transition: left 1.7s ease, opacity 0.15s ease;
        }

        .latest-news-card-img-container:hover::after {
            opacity: 1;
            left: 130%;
        }

        .latest-news-card-img-container:active::after {
            opacity: 0;
        }
    </style>
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

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
</body>

</html>
