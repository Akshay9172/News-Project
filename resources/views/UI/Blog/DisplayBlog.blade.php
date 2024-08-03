<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog Page</title>
    <!-- Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .image-wrapper {
            overflow: hidden;
            height: 200px;
        }
        .image-wrapper img {
            object-fit: cover;
            height: 100%;
            width: 100%;
        }
        .view-more-btn {
            background-color: #3490dc;
            color: #ffffff;
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            display: inline-block;
            font-weight: 600;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .view-more-btn:hover {
            background-color: #2779bd;
            transform: scale(1.05);
        }

        .blog-item {
            transition: transform 0.3s ease, box-shadow 0.3s ease, background-color 0.3s ease;
        }

        .blog-item:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            background-color: #f7fafc;
        }

        .all_blog:hover {
            color: #3490dc;
        }

        /* Hide additional blog items by default */
        .hidden {
            display: none;
        }
    </style>
</head>
<body>
@extends('Layouts.userLayout')

@section('content')
<nav class="bg-gray-800 p-4 shadow-md">
    <div class="container mx-auto flex justify-between items-center">
        <div class="text-white text-xl font-bold">
            <a href="" class="hover:text-gray-300">BlogSite</a>
        </div>
        <div class="flex space-x-4 items-center">
            <a href="{{ route('home') }}" class="text-gray-300 hover:text-white">Home</a>
            <form action="{{ route('search.blog') }}" method="GET" class="relative flex items-center">
                <input type="text" name="query" placeholder="Search blogs..." class="p-2 pr-10 border rounded w-full" style="padding-right: 2.5rem;">
                <i class="fas fa-search absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-600">ho</i>
            </form>
        </div>
    </div>
</nav>

<div class="container mx-auto mt-5 px-4">
    <h1 class="text-3xl font-bold mb-4 all_blog">All Blogs</h1>
    <div id="blogContainer" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($blogs as $index => $blog)
            <div class="bg-white border rounded-lg shadow-md overflow-hidden blog-item {{ $index >= 6 ? 'hidden' : '' }}">
                <div class="image-wrapper">
                    <img src="{{ $blog->img }}" alt="{{ $blog->title }}" class="object-cover w-full h-full">
                </div>
                <div class="p-4">
                    <h5 class="text-xl font-semibold mb-2">{{ $blog->title }}</h5>
                    <p class="text-gray-600 mb-4">{{ Str::limit(strip_tags($blog->description), 100) }}</p>
                    <p class="text-gray-600 mb-4">{{ $blog->created_at->format('d M Y') }}</p>
                    <a href="{{ route('blog.show', $blog->id) }}" class="view-more-btn">View Blog</a>
                </div>
            </div>
        @endforeach
    </div>
    <div class="text-center mt-6">
        <button id="readMoreBtn" class="bg-blue-600 text-white px-6 py-3 rounded-full shadow-lg hover:bg-blue-700 transition duration-300 ease-in-out transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Read More</button>
        <button id="showLessBtn" class="bg-red-500 text-white px-6 py-2.5 rounded-full shadow-lg hover:bg-red-700 transition duration-300 ease-in-out transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50 hidden">Show Less</button>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const readMoreBtn = document.getElementById('readMoreBtn');
        const showLessBtn = document.getElementById('showLessBtn');
        const blogItems = document.querySelectorAll('#blogContainer .blog-item');
        const rowsToShow = 2; // Number of rows to show initially
        const itemsPerRow = 3; // Number of items per row

        // Calculate the total number of items to initially show
        const initialVisibleItems = rowsToShow * itemsPerRow;

        // Show only the initial set of items
        blogItems.forEach((item, index) => {
            if (index >= initialVisibleItems) {
                item.classList.add('hidden');
            }
        });

        readMoreBtn.addEventListener('click', function() {
            // Show all blog items
            blogItems.forEach(item => {
                item.classList.remove('hidden');
            });
            // Hide the "Read More" button and show the "Show Less" button
            readMoreBtn.classList.add('hidden');
            showLessBtn.classList.remove('hidden');
        });

        showLessBtn.addEventListener('click', function() {
            // Hide all blog items except the initial set
            blogItems.forEach((item, index) => {
                if (index >= initialVisibleItems) {
                    item.classList.add('hidden');
                }
            });
            // Hide the "Show Less" button and show the "Read More" button
            showLessBtn.classList.add('hidden');
            readMoreBtn.classList.remove('hidden');
        });
    });
</script>
@endsection
</body>
</html>
