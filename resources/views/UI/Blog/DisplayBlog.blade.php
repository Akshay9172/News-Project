<!-- resources/views/display-blog.blade.php -->
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Add your other head elements here -->

    <style>
        *::selection {
            background-color: #5e5e5e;
            color: #ffffff;
        }

        .underline-red-600 {
            text-decoration-color: #dc2626;
            /* Tailwind's red-600 color */
        }

        .underline-text:hover {
            text-decoration: underline;
            text-decoration-color: #dc2626;
            cursor: pointer;
            transition: ease;
        }

        .blog-image {
            scale: 1.01;
            transition: scale ease-in-out .3s;
        }

        .blog-image:hover {
            scale: 1;
            transition: scale ease-in-out .3s;
        }

        .image {
            transition: ease-in-out .2s;
        }

        .image-wrapper:hover .image {
            scale: 1.1;
        }

        .para-text {
            color: #6e6e6e;
            margin-top: 10px;
        }

        .hidden-blogs {
            display: none;
        }
    </style>
</head>

<body>

    @extends('layouts.userLayout')
    @section('content')
        <nav class="w-full h-14vh px-4vw flex items-center justify-between bg-gray-300 border border-gray-300">
            <div class="logo flex flex-col items-start justify-center w-1/2 h-full pl-10 lg:ml-12">
                <h1 class="lg:text-4xl sm:text-lg md:text-5xl font-extrabold leading-none mt-6 ">MIT News</h1>
                <p class="text-xs lg:text-sm md:text-0.8vw leading-none tracking-wider font-bold">ON CAMPUS AND AROUND THE
                    WORLD</p>
            </div>
            <div class="cta w-1/2 h-full flex items-end justify-center gap-2.5">
                <p
                    class="hidden md:hidden lg:block sm:block md:inline lg:text-sm md:text-1vw text-xs underline underline-red-600 hover:bg-red-600 hover:text-white cursor-pointer">
                    SUBSCRIBE
                </p>
                <span
                    class="hidden sm:block md:hidden lg:block first-span font-normal text-sm md:text-lg border border-gray-400 px-2 py-1 md:px-5 md:py-2.5 border-t-2 border-black hover:bg-gray-700 hover:text-white cursor-pointer">
                    <i class="ri-arrow-down-s-line"></i> BROWSE
                </span>
                <span
                    class="sec-span font-normal text-sm md:text-lg border border-gray-400 px-5 py-2 border-t-2 border-black hover:bg-gray-700 hover:text-white cursor-pointer">
                    SEARCH NEWS <i class="ri-search-line ml-12"></i>
                </span>
            </div>
        </nav>
        <div class="container mt-5">
            <h1>All Blogs</h1>
            <div class="row">
                @foreach ($blogs as $blog)
                    <div class="col-md-4 mb-4">
                        <div class="">
                            <div class="card-body">
                                <img src="{{ $blog->img }}" class="card-img-top">


                                <h5 class="card-title">{{ $blog->title }}</h5>
                                <p class="card-text">{{ Str::limit($blog->description, 100) }}</p>
                                <a href="{{ route('blog.display', $blog->id) }}" class="btn btn-primary">Read More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- Add JavaScript libraries if needed -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    @endsection
</body>

</html>
