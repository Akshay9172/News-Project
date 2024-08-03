<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Carousel Example</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

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
