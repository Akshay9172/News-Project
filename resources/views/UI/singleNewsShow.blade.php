<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>News Detail</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="./social-media-icons.css">
    <script src="https://kit.fontawesome.com/66aa7c98b3.js" crossorigin="anonymous"></script>
    <style>
        .news-image {
            max-width: 100%;
            height: auto;
            margin-bottom: 1rem;
            width: 100%;
        }

        .row-equal-height {
            max-height: 900px;
            /* Adjust the height as needed */
            overflow-y: auto;
        }

        .col-equal-height {
            height: 100%;
        }

        .card-equal-height {
            height: 100%;
        }

        .icon {
            width: 24px;
            height: 24px;
            cursor: pointer;
            display: inline-block;
            transition: transform 0.3s, fill 0.3s;
        }

        .icon-control {
            margin-right: 12px
        }

        .icon:hover {
            transform: scale(1.2);
        }

        .icon-heart {
            fill: #000;
            /* Default color */
        }

        .icon-heart:hover {
            fill: red;
        }

        .icon-heart.active {
            fill: red;
        }

        .icon-comment {
            fill: #000;
            /* Default color */
        }


        .icon-comment.active {
            fill: black;
        }

        .dropdown-menu {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            margin-top: 0.125rem;
            z-index: 1000;
        }

        .dropdown:hover .dropdown-menu {
            display: block;
            /* Show the dropdown menu on hover */
        }


        .social-menu ul {
            position: absolute;
            top: 50%;
            left: 50%;
            padding: 0;
            margin: 0;
            transform: translate(-50%, -50%);
            display: flex;
        }

        .social-menu ul li {
            list-style: none;
            margin: 0 15px;
        }

        .social-menu ul li .fab {
            font-size: 30px;
            line-height: 60px;
            transition: .3s;
            color: #000;
        }

        .social-menu ul li .fab:hover {
            color: #fff;
        }

        .social-menu ul li a {
            position: relative;
            display: block;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background-color: #fff;
            text-align: center;
            transition: .6s;
            box-shadow: 0 5px 4px rgba(0, 0, 0, .5);
        }

        .social-menu ul li a:hover {
            transform: translate(0, -10%);
        }

        .social-menu ul li:nth-child(1) a:hover {
            background-color: rgba(0, 0, 0, 0.829);
        }

        .social-menu ul li:nth-child(2) a:hover {
            background-color: #E4405F;
        }

        .social-menu ul li:nth-child(3) a:hover {
            background-color: #0077b5;
        }

        .social-menu ul li:nth-child(4) a:hover {
            background-color: #000;
        }

        .canvas-container {
            display: none;
        }
    </style>
</head>

<body>
    @extends('Layouts.userLayout')
    @section('content')
        <div class="container">
            <div class="row">
                <div class="col-md-8" id="capture-div">
                    <div class="mb-4">
                        <h1><b>{{ $news->title }}</b></h1>
                    </div>
                    <img src="{{ $news->img }}" alt="News Image" class="news-image">
                    <div class="icon-control">
                        <div class="row ">
                            <div class="col-7"></div>
                            <div class="col-1">
                                <svg class="icon icon-heart" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <path
                                        d="M225.8 468.2l-2.5-2.3L48.1 303.2C17.4 274.7 0 234.7 0 192.8l0-3.3c0-70.4 50-130.8 119.2-144C158.6 37.9 198.9 47 231 69.6c9 6.4 17.4 13.8 25 22.3c4.2-4.8 8.7-9.2 13.5-13.3c3.7-3.2 7.5-6.2 11.5-9c0 0 0 0 0 0C313.1 47 353.4 37.9 392.8 45.4C462 58.6 512 119.1 512 189.5l0 3.3c0 41.9-17.4 81.9-48.1 110.4L288.7 465.9l-2.5 2.3c-8.2 7.6-19 11.9-30.2 11.9s-22-4.2-30.2-11.9zM239.1 145c-.4-.3-.7-.7-1-1.1l-17.8-20-.1-.1s0 0 0 0c-23.1-25.9-58-37.7-92-31.2C81.6 101.5 48 142.1 48 189.5l0 3.3c0 28.5 11.9 55.8 32.8 75.2L256 430.7 431.2 268c20.9-19.4 32.8-46.7 32.8-75.2l0-3.3c0-47.3-33.6-88-80.1-96.9c-34-6.5-69 5.4-92 31.2c0 0 0 0-.1 .1s0 0-.1 .1l-17.8 20c-.3 .4-.7 .7-1 1.1c-4.5 4.5-10.6 7-16.9 7s-12.4-2.5-16.9-7z" />
                                </svg>
                            </div>
                            <div class="col-1">
                                <svg class="icon icon-comment" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <path
                                        d="M123.6 391.3c12.9-9.4 29.6-11.8 44.6-6.4c26.5 9.6 56.2 15.1 87.8 15.1c124.7 0 208-80.5 208-160s-83.3-160-208-160S48 160.5 48 240c0 32 12.4 62.8 35.7 89.2c8.6 9.7 12.8 22.5 11.8 35.5c-1.4 18.1-5.7 34.7-11.3 49.4c17-7.9 31.1-16.7 39.4-22.7zM21.2 431.9c1.8-2.7 3.5-5.4 5.1-8.1c10-16.6 19.5-38.4 21.4-62.9C17.7 326.8 0 285.1 0 240C0 125.1 114.6 32 256 32s256 93.1 256 208s-114.6 208-256 208c-37.1 0-72.3-6.4-104.1-17.9c-11.9 8.7-31.3 20.6-54.3 30.6c-15.1 6.6-32.3 12.6-50.1 16.1c-.8 .2-1.6 .3-2.4 .5c-4.4 .8-8.7 1.5-13.2 1.9c-.2 0-.5 .1-.7 .1c-5.1 .5-10.2 .8-15.3 .8c-6.5 0-12.3-3.9-14.8-9.9c-2.5-6-1.1-12.8 3.4-17.4c4.1-4.2 7.8-8.7 11.3-13.5c1.7-2.3 3.3-4.6 4.8-6.9l.3-.5z" />
                                </svg>
                            </div>

                            <div class="col-1">
                                <span class="icon share-button">
                                    <svg class="icon" id="share-icon" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 576 512">
                                        <path
                                            d="M352 224l-46.5 0c-45 0-81.5 36.5-81.5 81.5c0 22.3 10.3 34.3 19.2 40.5c6.8 4.7 12.8 12 12.8 20.3c0 9.8-8 17.8-17.8 17.8l-2.5 0c-2.4 0-4.8-.4-7.1-1.4C210.8 374.8 128 333.4 128 240c0-79.5 64.5-144 144-144l80 0 0-61.3C352 15.5 367.5 0 386.7 0c8.6 0 16.8 3.2 23.2 8.9L548.1 133.3c7.6 6.8 11.9 16.5 11.9 26.7s-4.3 19.9-11.9 26.7l-139 125.1c-5.9 5.3-13.5 8.2-21.4 8.2l-3.7 0c-17.7 0-32-14.3-32-32l0-64zM80 96c-8.8 0-16 7.2-16 16l0 320c0 8.8 7.2 16 16 16l320 0c8.8 0 16-7.2 16-16l0-48c0-17.7 14.3-32 32-32s32 14.3 32 32l0 48c0 44.2-35.8 80-80 80L80 512c-44.2 0-80-35.8-80-80L0 112C0 67.8 35.8 32 80 32l48 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L80 96z" />
                                    </svg>
                                </span>
                            </div>
                            <div class="col-1">
                                <span href="#" class="icon" download>
                                    <svg id="download-icon" class="icon" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 512 512">
                                        <path
                                            d="M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 242.7-73.4-73.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l128-128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L288 274.7 288 32zM64 352c-35.3 0-64 28.7-64 64l0 32c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-32c0-35.3-28.7-64-64-64l-101.5 0-45.3 45.3c-25 25-65.5 25-90.5 0L165.5 352 64 352zm368 56a24 24 0 1 1 0 48 24 24 0 1 1 0-48z" />
                                    </svg>
                                </span>
                            </div>
                            <div class="col-1">
                                <div class="dropdown">
                                    <a href="#" class="d-flex align-items-center">
                                        <span aria-expanded="false">
                                            <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                width="24" height="24">
                                                <path fill="#fc0303"
                                                    d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336l24 0 0-64-24 0c-13.3 0-24-10.7-24-24s10.7-24 24-24l48 0c13.3 0 24 10.7 24 24l0 88 8 0c13.3 0 24 10.7 24 24s-10.7 24-24 24l-80 0c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z" />
                                            </svg>
                                        </span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <a class="dropdown-item text-danger" href="#"><b>Report
                                                Info</b></a>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                    <p><strong>Category:</strong> {{ $news->category->category_name }}</p>
                    <p><strong>Date:</strong> {{ $news->created_at }}</p>
                    <p>{!! $news->description !!}</p>
                </div>
                <div class="col-md-4">
                    <div class="card card-body p-5">
                        <div class="social-menu">
                            <ul>
                                <li><a href="https://github.com/sanketbodke" target="_blank"><i
                                            class="fab fa-github"></i></a></li>
                                <li><a href="https://www.instagram.com/imsanketbodke/" target="_blank"><i
                                            class="fab fa-instagram"></i></a></li>
                                <li><a href="https://www.linkedin.com/in/sanket-bodake-995b5b205/" target="_blank"><i
                                            class="fab fa-linkedin-in"></i></a></li>
                                <li><a href="https://codepen.io/sanketbodke" target="_blank"><i
                                            class="fab fa-facebook"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="row row-equal-height">
                        @foreach ($recentNews as $single_news)
                            <div class="col-12 m-1 col-equal-height">
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
                                                <img class="card-img-right img-fluid" src="{{ $single_news->img }}"
                                                    alt="Image">
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>

        <!-- Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/html2canvas@1.4.1/dist/html2canvas.min.js"></script>



        <script>
            document.querySelectorAll('.icon-heart').forEach(icon => {
                icon.addEventListener('click', function() {
                    this.classList.toggle('active');
                });
            });
        </script>
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const downloadButton = document.getElementById('download-icon');
                const divToCapture = document.getElementById('capture-div');

                downloadButton.addEventListener('click', function() {
                    html2canvas(divToCapture).then(canvas => {
                        const dataURL = canvas.toDataURL('image/png');
                        const link = document.createElement('a');
                        link.href = dataURL;
                        link.download = 'div-content.png'; // Customize the file name
                        link.click();
                    });
                });

                const shareButton = document.getElementById('share-icon');
                const newsTitle = '{{ $news->title }}';
                const newsURL = window.location.href; // Current page URL

                shareButton.addEventListener('click', () => {
                    if (navigator.share) {
                        navigator.share({
                            title: newsTitle,
                            url: newsURL
                        }).then(() => {
                            console.log('Thanks for sharing!');
                        }).catch((error) => {
                            console.error('Error sharing:', error);
                        });
                    } else {
                        // Fallback for browsers that do not support Web Share API
                        if (navigator.clipboard) {
                            navigator.clipboard.writeText(newsURL).then(() => {
                                alert('URL copied to clipboard. You can now share it manually.');
                            }).catch((error) => {
                                console.error('Error copying to clipboard:', error);
                            });
                        } else {
                            // Display a manual share link
                            const shareURL =
                                `https://twitter.com/intent/tweet?text=${encodeURIComponent(newsTitle)}&url=${encodeURIComponent(newsURL)}`;
                            window.open(shareURL, '_blank');
                        }
                    }
                });
            });
        </script>
    @endsection
</body>

</html>
