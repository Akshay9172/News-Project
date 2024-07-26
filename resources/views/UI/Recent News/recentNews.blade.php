<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bootstrap News Display</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        .carousel-item {
            text-align: center;
        }

        .carousel-item img {
            max-height: 300px;
            margin: auto;
        }

        .carousel-item h4 {
            margin-top: 1rem;
        }

        .carousel-item p {
            font-size: 0.9rem;
        }

        .card {
            max-height: 300px;
            /* Adjust the max height of the card as needed */
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }

        .card-img-right {
            object-fit: cover;
            height: 100%;
            width: 100%;
            transition: transform 0.3s ease-in-out;
        }

        .card-img-container {
            height: 100%;
            overflow: hidden;
        }

        .row-equal-height {
            display: flex;
            flex-wrap: wrap;
        }

        .col-equal-height {
            display: flex;
            flex-direction: column;
        }

        .card-equal-height {
            display: flex;
            flex-direction: column;
            flex: 1;
            height: 100%;
            /* Ensure card takes full height */
        }

        .card-body {
            flex: 1 1 auto;
            /* Allow body to grow and fill available space */
        }

        @media (max-width: 767px) {
            .card {
                max-height: none;
            }

            .card-img-right {
                height: auto;
            }
        }

        @keyframes cardHoverAnimation {
            from {
                transform: scale(1);
            }

            to {
                transform: scale(1.05);
            }
        }

        .card:hover {
            animation: cardHoverAnimation 0.3s forwards;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1>Recent News</h1>
            </div>
            <div class="col-md-4">
                <div class="mt-4 text-end">
                    <a href="/latet-all-news" class="btn btn-primary">More News</a>
                </div>
            </div>
        </div>
        <div class="row row-equal-height">
            @php
                $news = $leatestNews->sortByDesc('created_at')->skip(6)->take(6); // Skip the latest 6 and take the next 6
            @endphp
            @foreach ($news as $single_news)
                <div class="col-md-4 col-sm-6 mt-3 col-equal-height">
                    <a href="/news/{{ $single_news->id }}" class="card h-100">
                        <div class="card card-equal-height">
                            <div class="row g-0 h-100">
                                <div class="col-md-6 col-sm-12">
                                    <div class="card-body">
                                        <p>{{ $single_news->category->name }}</p>
                                        <p class="card-text">{!! Str::limit($single_news->description, 70) !!}</p>
                                        <p class="card-text"><small class="text-muted"><i
                                                    class="far fa-calendar-alt"></i>
                                                {{ $single_news->created_at }}</small></p>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 card-body card-img-container">
                                    <img class="card-img-right img-fluid" src="{{ $single_news->img }}" alt="Image">
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>

    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
</body>

</html>
