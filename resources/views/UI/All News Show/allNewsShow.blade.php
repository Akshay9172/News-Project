<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        /* Custom styles for the select dropdown */
        .custom-select {
            position: absolute;
            /* Absolute position to allow it to overlay */
            top: 100%;
            /* Position it below the label */
            right: 50;
            /* Align it to the right side */
            display: none;
            /* Initially hide the select dropdown */
            font-size: 1.1rem;
            border-radius: 0.25rem;
            border: 1px solid #ced4da;
            background-color: #f1f1f1;
            /* Gray background color */
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
            width: 150px;
            /* Reduced width */
            z-index: 10;
            /* Ensure it appears above other content */
            max-height: 400px;
            /* Increased max-height for the dropdown */
            overflow-y: auto;
            /* Allow scrolling if the content exceeds max-height */
            padding: 0;
            /* Remove default padding */
        }

        .custom-select.show {
            display: block;
            /* Show the select dropdown when the 'show' class is added */
        }

        .custom-select option {
            padding: 0.375rem 0.75rem;
            cursor: pointer;
            background-color: #f1f1f1;
            /* Ensure consistent background color */
            border: none;
            /* Remove default border */
        }

        .custom-select option:hover {
            background-color: #e0e0e0;
            /* Light background on hover */
        }

        .form-group {
            position: relative;
            /* Make it relative to position the dropdown */
            display: inline-block;
            /* Adjust the display to inline-block */
        }

        .form-group label {
            font-weight: bold;
            font-size: 1.50rem;
            /* Adjust the font size as needed */
            margin-right: 0.5rem;
            /* Add margin to the right of the label */
            display: inline-block;
            /* Keep label inline */
            cursor: pointer;
            /* Show a pointer cursor to indicate it's clickable */
        }
    </style>
</head>

<body>

    @extends('Layouts.userLayout')

    @section('content')
        <div class="container mx-auto mt-5 px-4">
            <!-- Filter Form -->
            <form method="GET" action="{{ route('news.list') }}" class="mb-4">
                <div class="row justify-content-end"> <!-- Added justify-content-end to align the filter to the right -->
                    <div class="col-md-6">
                        <div class="form-group d-flex justify-content-end align-items-end">
                            <label for="news_type " onclick="toggleDropdown(event)">News Type</label>
                            <select id="news_type" name="news_type" class="custom-select" onchange="this.form.submit()">
                                <option value="">All Types</option>
                                <option value="Breaking News"
                                    {{ request('news_type') == 'Breaking News' ? 'selected' : '' }}>
                                    Breaking News
                                </option>
                                <option value="Normal News" {{ request('news_type') == 'Normal News' ? 'selected' : '' }}>
                                    Normal News
                                </option>
                                <option value="Video News" {{ request('news_type') == 'Video News' ? 'selected' : '' }}>
                                    Video News
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
            </form>

            <div class="row row-equal-height p-3">
                @forelse ($news as $single_news)
                    <div class="col-md-4 col-sm-6 mt-4">
                        <div class="card border-light shadow-sm mb-4" style="height: 550px;">
                            <!-- Increased card height and margin-bottom for space between cards -->
                            <img src="{{ $single_news->img }}" class="card-img-top" alt="Image"
                                style="object-fit: cover; height: 200px;"> <!-- Kept image height same -->
                            <div class="">
                                <p class="card-text mb-0 mt-2"><small class="text-muted"><i class="far fa-calendar-alt"></i>
                                        {{ $single_news->created_at->format('M d, Y') }}</small></p>
                            </div>
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ $single_news->category->name }}</h5>
                                <p class="card-text flex-grow-1 overflow-hidden " style="height: 120px;">
                                    {!! Str::limit(strip_tags($single_news->description), 80) !!}</p>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-center w-100">No news found for the selected filter.</p>
                @endforelse
            </div>
        </div>
    @endsection

    <script>
        function toggleDropdown(event) {
            event.stopPropagation(); // Prevent click event from propagating
            var select = document.getElementById('news_type');
            var isVisible = select.classList.contains('show');

            // Hide all dropdowns first
            document.querySelectorAll('.custom-select').forEach(function(dropdown) {
                dropdown.classList.remove('show');
            });

            // Toggle the selected dropdown
            if (!isVisible) {
                select.classList.add('show');
            }
        }

        // Close dropdown when clicking outside
        document.addEventListener('click', function(event) {
            var select = document.getElementById('news_type');
            var label = document.querySelector('.form-group label');
            if (!select.contains(event.target) && !label.contains(event.target)) {
                select.classList.remove('show');
            }
        });
    </script>

</body>

</html>
