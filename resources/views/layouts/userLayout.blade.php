 <!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="/resources/css/app.css">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="icon" href="%PUBLIC_URL%/favicon.ico" />
    <!-- In your main layout or specific view file -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet">

    <!-- Scripts -->
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}

    <link rel="manifest" href="%PUBLIC_URL%/manifest.json" />
    <link rel="apple-touch-icon" href="%PUBLIC_URL%/logo192.png" />
    <link rel="icon" href="%PUBLIC_URL%/favicon.ico" />
    <meta name="theme-color" content="#000000" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Web site created using create-react-app" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

</head>

<body>
    <div class="root">
        <nav class="navbar navbar-expand-sm bg-light navbar-primary">
            <div class="container-fluid">
                <a class="navbar-brand ms-5" href="#">
                    <img src="https://templates.envytheme.com/sinmun/default/assets/img/logo.png" alt="Logo" />
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-center" id="collapsibleNavbar">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="/"><b>HOME</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="#"><b>LIFESTYLE</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="#"><b>TECHNOLOGY</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="#"><b>SPORTS</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="/news-video"><b>VIDEO</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="#"><b>TRAVEL</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="/login"><b>LOGIN</b></a>
                        </li>
                        {{-- <li>
                            <form action="/" method="GET">
                                <select name="language_id" onchange="this.form.submit()">
                                    <option value="">All Languages</option>
                                    @foreach ($languages as $language)
                                        <option value="{{ $language->id }}"
                                            {{ $language_id == $language->id ? 'selected' : '' }}>
                                            {{ $language->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </form>
                        </li> --}}

                    </ul>
                </div>
                <form>
                    <h2>
                        <i class="ri-user-2-fill"></i>
                        <i class="ri-search-line"></i>
                    </h2>
                </form>
            </div>
        </nav>
        <div class="container">

            @yield('content')
        </div>
        <footer class="bg-dark text-light mt-5">
            <div class="container py-4">
                <div class="row">
                    <div class="col-md-4">
                        <h3>About The Magazine</h3>
                        <p class="text-secondary">You can reach us via phone, email and website. Or send us some message
                            through our Contact Page.</p>
                        <p class="text-secondary">
                            <i class="ri-map-pin-fill text-danger"></i> 27 Division St, New York, NY 10002, USA
                        </p>
                        <p class="text-secondary">
                            <i class="ri-phone-fill text-danger"></i> +(587) 234-4521
                        </p>
                        <p class="text-secondary">
                            <i class="ri-mail-fill text-danger"></i> info@sinmun.com
                        </p>
                        <p>We're social, connect with us:</p>
                        <ul class="list-inline">
                            <li class="list-inline-item"><i class="ri-facebook-fill text-light"></i></li>
                            <li class="list-inline-item"><i class="ri-twitter-fill text-light"></i></li>
                            <li class="list-inline-item"><i class="ri-linkedin-fill text-light"></i></li>
                            <li class="list-inline-item"><i class="ri-instagram-line text-light"></i></li>
                            <li class="list-inline-item"><i class="ri-rss-fill text-light"></i></li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <h3>Latest News</h3>
                        <div class="mb-3">
                            <div class="d-flex">
                                <img class="me-3"
                                    src="https://templates.envytheme.com/sinmun/default/assets/img/small-2.jpg"
                                    alt="News Image" style="height: 80px;">
                                <div>
                                    <p class="text-secondary mb-1">
                                        <i class="ri-calendar-2-line text-danger"></i> March 12, 2022
                                        <i class="ri-message-2-line text-danger ms-3"></i> 12
                                    </p>
                                    <h6 class="heading-news">Gloost better They Are With A Featured</h6>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="d-flex">
                                <img class="me-3"
                                    src="https://templates.envytheme.com/sinmun/default/assets/img/small-4.jpg"
                                    alt="News Image" style="height: 80px;">
                                <div>
                                    <p class="text-secondary mb-1">
                                        <i class="ri-calendar-2-line text-danger"></i> March 12, 2022
                                        <i class="ri-message-2-line text-danger ms-3"></i> 12
                                    </p>
                                    <h6 class="heading-news">Gloost better They Are With A Featured</h6>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="d-flex">
                                <img class="me-3"
                                    src="https://templates.envytheme.com/sinmun/default/assets/img/small-3.jpg"
                                    alt="News Image" style="height: 80px;">
                                <div>
                                    <p class="text-secondary mb-1">
                                        <i class="ri-calendar-2-line text-danger"></i> March 12, 2022
                                        <i class="ri-message-2-line text-danger ms-3"></i> 12
                                    </p>
                                    <h6 class="heading-news">Gloost better They Are With A Featured</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <h3>Twitter Feed</h3>
                        <div class="mb-3">
                            <h5 class="text-danger">
                                <i class="ri-twitter-fill text-primary"></i> About 2 days ago
                            </h5>
                            <p>Conference Event WordPress Theme -> 2 New Home Added https://tt.co/Rn00zM5q7gY70</p>
                        </div>
                        <div class="mb-3">
                            <h5 class="text-danger">
                                <i class="ri-twitter-fill text-primary"></i> About 2 days ago
                            </h5>
                            <p>Conference Event WordPress Theme -> 2 New Home Added https://tt.co/Rn00zM5q7gY70</p>
                        </div>
                        <div class="mb-3">
                            <h5 class="text-danger">
                                <i class="ri-twitter-fill text-primary"></i> About 2 days ago
                            </h5>
                            <p>Conference Event WordPress Theme -> 2 New Home Added https://tt.co/Rn00zM5q7gY70</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-secondary text-center py-2">
                <p class="mb-0">© Sinmun is Proudly Owned by EnvyTheme</p>
                <nav class="navbar navbar-expand-sm justify-content-center">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link text-light" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="#">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="#">Forums</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="#">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="#">Advertisment</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </footer>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
