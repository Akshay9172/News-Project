<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog Detail</title>
    <!-- Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Custom styles */
        .container {
            display: flex;
            gap: 2rem;
            flex-wrap: nowrap;
        }

        .main-blog {
            flex: 1;
            max-width: 60%;
        }

        .recent-blogs {
            flex: 1;
            max-width: 40%;
            overflow-y: auto;
            max-height: 90vh;
        }

        .recent-blogs .blog-card {
            display: flex;
            gap: 1rem;
            margin-bottom: 1rem;
            align-items: center;
        }

        .recent-blogs .blog-card .image-wrapper {
            flex-shrink: 0;
            width: 120px;
            /* Increased size */
        }

        .recent-blogs .blog-card .image-wrapper img {
            width: 100%;
            height: 100px;
            /* Increased height */
            object-fit: cover;
        }

        .recent-blogs .blog-card .content {
            flex: 1;
        }

        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }

            .main-blog,
            .recent-blogs {
                max-width: 100%;
            }

            .recent-blogs .blog-card {
                flex-direction: column;
                align-items: flex-start;
            }
        }
    </style>
</head>

<body>
    @extends('Layouts.userLayout')

    @section('content')
        <nav class="bg-gray-800 p-4 shadow-md">
            <div class="container mx-auto flex justify-between items-center">
                <!-- Logo or Brand -->
                <div class="text-white text-xl font-bold">
                    <a href="{{ route('blog.index') }}" class="hover:text-gray-300">BlogSite</a>
                </div>
                <!-- Navbar Links and Search Bar -->
                <div class="flex space-x-4 items-center">
                    <a href="{{ route('home') }}" class="text-gray-300 hover:text-white">Home</a>
                    <form action="{{ route('blog.search') }}" method="GET" class="relative flex items-center">
                        <input type="text" name="query" placeholder="Search blogs..."
                            class="p-2 pr-10 border rounded w-full" style="padding-right: 2.5rem;">
                        <i class="fas fa-search absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-600"></i>
                    </form>
                </div>
            </div>
        </nav>

        <div class="container mx-auto mt-5 px-4">
            <div class="container">
                <!-- Main Blog Detail -->
                <div class="main-blog bg-white border rounded-lg shadow-md p-6">
                    <h1 class="text-3xl font-bold mb-4">{{ $blog->title }}</h1>

                    <div class="image-wrapper mb-4">
                        <img src="{{ $blog->img }}" alt="{{ $blog->title }}" class="object-cover w-full h-70">
                    </div>
                    <p class="text-gray-900 mb-4 ">{{ $blog->created_at->format('d M Y') }}</p> <!-- Date Added Here -->
                    <p class="text-gray-700 leading-normal ">{{ strip_tags($blog->description) }}</p>
                </div>

                <!-- Recent Blogs -->
                <div class="recent-blogs">
                    <h2 class="text-2xl font-semibold mb-4">Recent Blogs</h2>
                    @foreach ($recentBlogs as $recentBlog)
                        <div class="blog-card bg-white border rounded-lg shadow-md p-4 flex items-center">
                            <div class="image-wrapper">
                                <img src="{{ $recentBlog->img }}" alt="{{ $recentBlog->title }}"
                                    class="object-cover w-full h-32"> <!-- Increased size -->
                            </div>
                            <div class="content ml-4">
                                <h3 class="text-xl font-semibold mb-2">{{ $recentBlog->title }}</h3>
                                <p class="text-gray-600 ">{{ Str::limit(strip_tags($recentBlog->description), 100) }}</p>
                                {{--    <p class="text-gray-600 mb-2">{{ $recentBlog->created_at->format('d M Y') }}</p>  --}}
                                <!-- Date Added Here -->
                                <a href="{{ route('blog.show', $recentBlog->id) }}"
                                    class="text-blue-500 underline mt-2 block">Read More</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endsection
</body>

</html>
