<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Recent News</title>

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1>Recent News</h1>
            </div>
            <div class="col-md-4">
                <div class="mt-4 text-end">
                    <a href="/all-type-news" class="btn btn-primary">More News</a>
                </div>
            </div>
        </div>
        <div class="row row-equal-height p-3">
            @php
                $news = $leatestNews->sortByDesc('created_at')->skip(6)->take(6); // Skip the latest 6 and take the next 6
            @endphp
            @foreach ($news as $single_news)
                <div class="col-md-4 col-sm-6 mt-3">
                    <a href="/news/{{ $single_news->id }}" class="card h-100">
                        <div class="card h-100">
                            <div class="row g-0 h-100">
                                <div class="col-md-6 col-sm-12">
                                    <div class="card-body">
                                        <p>{{ $single_news->category->category_name }}</p>
                                        <p class="card-text">{!! Str::limit($single_news->description, 70) !!}</p>
                                        <p class="card-text"><small class="text-muted"><i
                                                    class="far fa-calendar-alt"></i>
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
</body>

</html>
