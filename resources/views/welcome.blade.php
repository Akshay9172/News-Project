<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>News page</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <img width="100%" src="https://templates.envytheme.com/sinmun/default/assets/img/2-ads.png">
                </img>
            </div>
            <div class="col-md-8">
                @include('User.breakingNews')
            </div>

            <div class="col-md-2">
                {{-- @include('news.latest_news.latestNews') --}}
            </div>
        </div>
        {{-- @include('news.old_news.oldNews') --}}
    </div>
</body>

</html>
