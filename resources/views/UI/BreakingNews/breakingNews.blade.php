<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Carousel Example</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        /* Existing and new CSS for the carousel */
        .breaking-news-carousel .carousel-item {
            height: 400px;

        }

        .breaking-news-carousel .carousel-item img {
            object-fit: cover;
            height: 100%;
            max-height: 400px;
            width: 100%;
            transition: transform 0.3s ease;
            background-size: cover;
            background-repeat: no-repeat;

        }

        .breaking-news-carousel .carousel-indicators {
            bottom: 0;
        }

        /* New CSS for the hover effect */
        figure.effect-sadie {
            position: relative;
            overflow: hidden;
        }

        figure.effect-sadie img {
            transition: transform 0.3s ease;
            display: block;
            width: 100%;

        }

        figure.effect-sadie figcaption {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: white;
            padding: 1em;
            box-sizing: border-box;
            background: linear-gradient(to bottom, rgba(72, 76, 97, 0) 0%, rgba(72, 76, 97, 0.8) 75%);
        }

        figure.effect-sadie figcaption::before {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to bottom, rgba(72, 76, 97, 0) 0%, rgba(72, 76, 97, 0.8) 75%);
            content: '';
            opacity: 0;
            transform: translate3d(0, 50%, 0);
            transition: opacity 0.35s, transform 0.35s;
        }

        figure.effect-sadie h5 {
            position: relative;
            color: black;
            transition: transform 0.35s, color 0.35s;
            transform: translate3d(0, -50%, 0);
            font-size: 1.5rem;
            text-align: center;
        }

        figure.effect-sadie p {
            position: relative;
            opacity: 0;
            transform: translate3d(0, 10px, 0);
            transition: opacity 0.35s, transform 0.35s;
            font-size: 1rem;
            text-align: center;
        }

        figure.effect-sadie:hover img {
            transform: scale(1.1);
        }

        figure.effect-sadie:hover figcaption::before {
            opacity: 1;
            transform: translate3d(0, 0, 0);

        }

        figure.effect-sadie:hover h5 {
            color: #fff;
            background: none;
            transform: translate3d(0, -50%, 0) translate3d(0, -40px, 0);

        }

        figure.effect-sadie:hover p {
            opacity: 1;
            transform: translate3d(0, 0, 0);
        }

        @media (max-width: 768px) {
            figure.effect-sadie figcaption {
                display: none;
            }

            .carousel-control-prev-icon {
                margin-bottom: 168px;
            }

            .carousel-control-next-icon {
                margin-bottom: 168px;
            }
        }

        .mt-7 {
            margin-top: 130px;

        }

        .breakingNews-content {
            background-color: #ffffff87;
            padding: 10px;
            border-radius: 10px
        }
    </style>
</head>

<body>
    <div id="breakingNewsCarousel" class="carousel slide carousel-fade breaking-news-carousel" data-bs-ride="carousel">
        <!-- Indicators -->
        <div class="carousel-indicators">
            @foreach ($breakingNews as $key => $news)
                <button type="button" data-bs-target="#breakingNewsCarousel" data-bs-slide-to="{{ $key }}"
                    class="{{ $key == 0 ? 'active' : '' }}" aria-current="true"
                    aria-label="Slide {{ $key + 1 }}"></button>
            @endforeach
        </div>

        <!-- Inner -->
        <div class="carousel-inner">
            @foreach ($breakingNews as $key => $news)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                    <figure class="effect-sadie">
                        <img src="{{ $news->img }}" class="d-block w-100" alt="{{ $news->title }}" />
                        <figcaption class="mt-7">
                            <div>
                                <h5 class="breakingNews-content"><b>{{ $news->title }}</b></h5>
                                <p>{!! Str::limit($news->description, 90) !!}</p>
                            </div>
                        </figcaption>
                    </figure>
                </div>
            @endforeach
        </div>

        <!-- Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#breakingNewsCarousel"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#breakingNewsCarousel"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</body>

</html>
