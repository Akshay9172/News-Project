<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str; // Ensure this is present
use App\Models\Blog;
use App\Models\Category;

class BlogController extends Controller
{
    public function addBlog()
    {
        $categories = Category::all();
        return view('Admin.SuperAdmin.Blogs.addBlog', compact('categories'));
    }

// public function storeBlog(Request $request)

    // {
    //     // Validate incoming request
    //     $validatedData  = $request->validate([
    //         'title' => 'required|string|max:255',
    //         'description' => 'required|string',
    //         'img' => 'nullable|url',
    //         'category_id' => 'required|exists:categories,id',
    //     ]);

    //     // Generate a slug from the title
    //     $slug = Str::slug($request->title);
    //     $title = $request->input('title');
    //     $words = explode(' ', $title);
    //     $firstTwoWords = implode('-', array_slice($words, 0, 6));
    //     $slug = strtolower($firstTwoWords);


    //     // Create the blog post with the new fields
    //     Blog::create([
    //         'title' => $request->title,
    //         'description' => $request->description,
    //         'img' => $request->img,
    //         'category_id' => $request->category_id,
    //         'slug' => $slug,
    //         'status' => $request->status ?? 0,
    //     ]);

    //     // Redirect to the show-blog route
    //     return redirect()->route('show.blog')->with('success', 'Blog created successfully.');
    // }

public function showBlog($id = null)
{
    if ($id) {
        // Fetch a single blog by ID and recent blogs
        $blog = Blog::findOrFail($id);
        $recentBlogs = Blog::latest()->take(5)->get();

        return view('UI.Blog.singleBlog', compact('blog', 'recentBlogs'));
    } else {
        // Fetch all blogs ordered by latest first
        $blogs = Blog::orderBy('created_at', 'desc')->get();

        return view('Admin.SuperAdmin.Blogs.showBlog', compact('blogs'));
    }
}
public function displayBlog()
{
    // Fetch blog posts ordered by latest first
    $blogs = Blog::orderBy('created_at', 'desc')->get();

    return view('UI.Blog.DisplayBlog', compact('blogs'));
}

public function index()
{
    // Fetch blogs ordered by latest first and implement pagination
    $blogs = Blog::orderBy('created_at', 'desc')->paginate(10); // Adjust the number per page as needed

    return view('Admin.SuperAdmin.Blogs.showBlog',compact('blogs'));
}
public function deleteBlog($id)
{
    $blog = Blog::findOrFail($id);
    $blog->delete();
    return redirect('/show-blog')->with('success', 'Blog deleted successfully');
}
    // BlogController.php
    public function edit($slug)
    {
        $blog = Blog::findOrFail($slug);
        $categories = Category::all();

        return view('Admin.SuperAdmin.Blogs.editBlog', compact('blog', 'categories'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'img' => 'nullable|url',
            'category_id' => 'required|exists:categories,id',
        ]);
        $blog = Blog::findOrFail($id);
        $blog->update([
            'title' => $request->title,
            'description' => $request->description,
            'img' => $request->img,
            'category_id' => $request->category_id,
        ]);
        return redirect('show-blog')->with('success', 'Blog updated successfully.');
    }
    public function about()
{
    return view('about'); // or whatever your method does
}
public function search(Request $request)
{
    $query = $request->input('query');
    $blogs = Blog::where('title', 'like', "%{$query}%")
                  ->orWhere('description', 'like', "%{$query}%")
                  ->get();

    return view('your-view-file', compact('blogs'));
}
public function storeBlog(Request $request)
{
    try {
        // Validate incoming request
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'img' => 'nullable|url',
            'category_id' => 'required|exists:categories,id',
        ]);

        // Generate a slug from the title
        $slug = Str::slug($request->title);
        $title = $request->input('title');
        $words = explode(' ', $title);
        $firstTwoWords = implode('-', array_slice($words, 0, 6));
        $slug = strtolower($firstTwoWords);

        // Create the blog post with the new fields
        Blog::create([
            'title' => $request->title,
            'description' => $request->description,
            'img' => $request->img,
            'category_id' => $request->category_id,
            'slug' => $slug,
            'status' => $request->status ?? 0,
        ]);

        // Redirect to the show-blog route
        return redirect()->route('show.blog')->with('success', 'Blog created successfully.');
    } catch (\Exception $e) {
        // Handle the exception (e.g., log it, return an error response)
        \Log::error('Error creating blog: ' . $e->getMessage());

        // Redirect back with an error message
        return redirect()->back()->with('error', 'An error occurred while creating the blog.');
    }
}
}
