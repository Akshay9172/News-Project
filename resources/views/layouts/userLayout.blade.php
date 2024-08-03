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
    <link rel="stylesheet" href="/dist/css/homepage.css">
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
    <!-- Font Awesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <style>
        .categories-button {
            position: relative;
            cursor: pointer;
        }

        .categories-button:hover .categories-dropdown {
            display: block;
        }

        .categories-dropdown {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            background: #f8f9fa;
            /* Adjust background color if needed */
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            z-index: 1000;
            white-space: nowrap;
        }

        .categories-dropdown ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .categories-dropdown ul li {
            padding: 5px 10px;
        }

        .categories-dropdown ul li:hover {
            background: #e2e6ea;
            color: red;
            /* Adjust hover color if needed */
        }
    </style>
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
                        <li class="nav-item categories-button">
                            <a class="nav-link text-dark" href="#"><b>SPOTRS</b></a>
                            <div class="categories-dropdown">
                                <ul>
                                    @foreach ($categories as $news)
                                        <li><a
                                                href="/news/category/{{ $news->id }}"><b>{{ $news->category_name }}</b></a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="/login"><b>LOGIN</b></a>
                        </li>
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
        <div class="mt-4">
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
                                    <h6 class="heading-news">New Law Helps Companies Law Better Innovate</h6>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="d-flex">
                                <img class="me-3"
                                    src="https://templates.envytheme.com/sinmun/default/assets/img/small-3.jpg"
                                    alt="News Image" style="height: 80px;">
                                <div>
                                    <p class="text-secondary mb-1">
                                        <i class="ri-calendar-2-line text-danger"></i> March 12, 2022
                                        <i class="ri-message-2-line text-danger ms-3"></i> 12
                                    </p>
                                    <h6 class="heading-news">The gig Economy is Being Trashed Again</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <h3>Popular News</h3>
                        <div class="mb-3">
                            <div class="d-flex">
                                <img class="me-3"
                                    src="https://templates.envytheme.com/sinmun/default/assets/img/small-5.jpg"
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
                                    src="https://templates.envytheme.com/sinmun/default/assets/img/small-6.jpg"
                                    alt="News Image" style="height: 80px;">
                                <div>
                                    <p class="text-secondary mb-1">
                                        <i class="ri-calendar-2-line text-danger"></i> March 12, 2022
                                        <i class="ri-message-2-line text-danger ms-3"></i> 12
                                    </p>
                                    <h6 class="heading-news">New Law Helps Companies Law Better Innovate</h6>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="d-flex">
                                <img class="me-3"
                                    src="https://templates.envytheme.com/sinmun/default/assets/img/small-7.jpg"
                                    alt="News Image" style="height: 80px;">
                                <div>
                                    <p class="text-secondary mb-1">
                                        <i class="ri-calendar-2-line text-danger"></i> March 12, 2022
                                        <i class="ri-message-2-line text-danger ms-3"></i> 12
                                    </p>
                                    <h6 class="heading-news">The gig Economy is Being Trashed Again</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center mt-4">
                    <p>&copy; 2023 Your Website. All rights reserved.</p>
                </div>
            </div>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</body>

</html>
